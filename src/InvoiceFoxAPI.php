<?php
declare(strict_types=1);

namespace RTFM\InvoiceFoxAPI;

use GuzzleHttp;
use RTFM\InvoiceFoxAPI\API\InvoicesRepository;
use RTFM\InvoiceFoxAPI\API\PartnersRepository;
use RTFM\InvoiceFoxAPI\API\TransfersRepository;
use RTFM\InvoiceFoxAPI\Exception;
use RTFM\InvoiceFoxAPI\Exception\APIException;
use RTFM\InvoiceFoxAPI\Model;

class InvoiceFoxAPI
{


    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * @var InvoicesRepository;
     */
    private $invoicesRepository;

    /**
     * @var TransfersRepository
     */
    private $transfersRepository;

    /**
     * @var PartnersRepository
     */
    private $partnersRepository;

    /**
     * InvoiceFoxAPI constructor.
     */
    public function __construct($client)
    {
        $this->client = $client;

        $this->invoicesRepository = new InvoicesRepository($client);
        $this->transfersRepository = new TransfersRepository($client);
        $this->partnersRepository = new PartnersRepository($client);
    }

    public static function newInstance($apiKey = NULL)
    {

        if (empty($apiKey)) {
            $apiKey = getenv('INVOICEFOX_API_KEY');
        }

        if (empty($apiKey)) {
            throw new APIException('No API key provided. Provide one in code or export INVOICEFOX_API_KEY environment variable');
        }

        $client = new GuzzleHttp\Client(
            [
                // Base URI is used with relative requests
                'base_uri' => 'https://www.cebelca.biz/',
                // You can set any number of default request options.
                'timeout' => 15.0,
                'auth' => [$apiKey, 'x'],
            ]
        );

        return new self($client);
    }

    public function invoices() {
        return $this->invoices;
    }

    public function transfers() {
        return $this->transfersRepository;
    }

    public function partners() {
        return $this->partnersRepository;
    }

    /**
     * @param $callback
     * @param $resp
     * @return array|mixed|int
     * @throws Exception\APIException
     * @throws Exception\NotFoundException
     */
    private function handleResponse($callback, $resp, $single = true, $allowEmpty = false)
    {
        /* @var $resp GuzzleHttp\Psr7\Response */

        if ($resp->getStatusCode() == 200) {

            $data = json_decode($resp->getBody()->getContents());

            if (!is_array($data[0])) {
                throw new Exception\APIException("Unknown response format");
            }

            if (sizeof($data[0]) == 0) {
                if ($allowEmpty) {
                    return array();
                } else {
                    throw new Exception\NotFoundException();
                }
            }

            if ($single) {
                return call_user_func($callback, $data[0][0]);
            } else {
                return array_map($callback, $data[0]);
            }
        }

        throw new Exception\APIException("Invalid return status");
    }

    private static function id_extractor($data): int
    {
        if (count(get_object_vars($data)) == 1 && property_exists($data, "id")) {
            return intval($data->id);
        } else {
            throw new Exception\APIException("Unknown response format");
        }
    }


    public function partnerList(): array
    {
        $resp = $this->execute('partner', 'select-all');

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp, false, true);
    }

    /**
     * Get partner by id
     *
     * @param int $id
     * @return Model\Partner
     * @throws Exception\APIException
     * @throws Exception\NotFoundException
     */
    public function partnerGet(int $id): Model\Partner
    {
        $resp = $this->execute('partner', 'select-one', ["id" => $id]);

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp, true);
    }

    /**
     * Create (assure) new partner. If all parameters matches with existing partner, existing partner is retuned,
     * otherwise new partner is created.
     *
     * @param Model\Partner $data
     * @return int
     * @throws APIException
     */
    public function partnerCreate(Model\Partner $data): int
    {
        $resp = $this->execute('partner', 'assure', $data->toArray());

        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true);
    }

    /**
     * @param Model\Partner $partner
     * @return Model\Partner
     * @throws Exception\APIException
     */
    public function partnerUpdate(Model\Partner $partner): Model\Partner
    {
        if (!is_int($partner->getId())) {
            throw new Exception\APIException("ID is not set on the Partner");
        }

        $resp = $this->execute('partner', 'update', $partner->toArray(), 'select-one');

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp, true);
    }

    public function partnerDelete(int $id): bool
    {
        return $this->resourceDelete('partner', $id);
    }

    public function itemList(): array
    {
        $resp = $this->execute('item', 'select-all');

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp, false, true);
    }

    public function itemGet(int $id): Model\Item
    {
        $resp = $this->execute('item', 'select-one', ["id" => $id]);

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp);
    }

    public function itemFind(string $search): array
    {
        $resp = $this->execute('item', 'search', ["value" => $search]);

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp, false, true);
    }

    public function itemGetByCode(string $code): Model\Item
    {
        $items = $this->itemFind($code);

        foreach ($items as $item) {
            /* @var $item \RTFM\InvoiceFoxAPI\Model\Item */
            if ($item->getCode() == $code) {
                return $item;
            }
        }

        throw new Exception\NotFoundException();
    }

    public function itemCreate(Model\Item $item): int
    {
        $resp = $this->execute('item', 'insert-into', $item->toArray());
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true, false);
    }

    public function itemUpdate(Model\Item $item): Model\Item
    {
        if (!is_int($item->getId())) {
            throw new Exception\APIException("ID is not set on the Item");
        }

        $resp = $this->execute('item', 'update-select', $item->toArray());
        return $this->handleResponse(array(Model\Item::class, 'from'), $resp, true, false);
    }

    public function itemDelete(int $id): bool
    {
        return $this->resourceDelete('item', $id);
    }

    public function transferList(): array
    {
        $resp = $this->execute('transfer', 'select-all');
        return $this->handleResponse(array(Model\Transfer::class, 'from'), $resp, false, true);
    }

    public function transferCreate(Model\Transfer $transfer): int
    {
        $resp = $this->execute('transfer', 'insert-into', $transfer->toArray());
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true, false);
    }

    public function transferDelete($id): bool
    {
        return $this->resourceDelete('transfer', $id);
    }

    public function transferUpdate(Model\Transfer $transfer): Model\Transfer
    {
        if (!is_int($transfer->getId())) {
            throw new Exception\APIException("ID is not set on the Transfer");
        }

        $resp = $this->execute('transfer', 'update-select', $transfer->toArray());
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true, false);
    }

    public function transferAddItem(int $transfer_id, Model\TransferItem $item): array
    {
        $item->setIdTransfer($transfer_id);

        $resp = $this->execute('transfer-b', 'insert-into', $item->toArray(), 'select-of');
        return $this->handleResponse(array(Model\TransferItem::class, 'from'), $resp, false, false);
    }

    public function invoiceList()
    {
        $resp = $this->execute('invoice-sent', 'select-all');
        return $this->handleResponse(array(Model\Invoice::class, 'from'), $resp, false, true);
    }

    public function invoiceGet($id)
    {
        $resp = $this->execute('invoice-sent', 'select-one', ['id' => $id]);
        return $this->handleResponse(array(Model\Invoice::class, 'from'), $resp, true, false);
    }

    public function invoiceGetByTitle(string $title)
    {
        $resp = $this->execute('invoice-sent', 'select-by-title', ['title' => $title]);
        return $this->handleResponse(array(Model\Invoice::class, 'from'), $resp, false, true);
    }

    public function invoiceCreate(Model\Invoice $invoice)
    {
        $resp = $this->execute('invoice-sent', 'insert-into', $invoice->toArray());
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true, false);
    }

    public function invoiceUpdate(Model\Invoice $invoice)
    {
        $resp = $this->execute('invoice-sent', 'update-select', $invoice->toArray());
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, true, false);
    }

    public function invoiceListItems($id)
    {
        $resp = $this->execute('invoice-sent-b', 'select-of-more', ['id_invoice_sent' => $id]);
        return $this->handleResponse(array(self::class, 'id_extractor'), $resp, false, true);
    }

    public function invoiceAddItem($id, Model\InvoiceItem $invoiceItem)
    {
        $invoiceItem->setIdInvoiceSent($id);

        $resp = $this->execute('invoice-sent-b', 'insert-into', $invoiceItem->toArray(), 'select-of');
        return $this->handleResponse(array(Model\InvoiceItem::class, 'from'), $resp, false, false);
    }

    public function invoiceDeleteItem($id)
    {
        return $this->resourceDelete('invoice-sent-b', $id);
    }

    public function invoiceUpdateItem($id, Model\InvoiceItem $invoiceItem)
    {
        throw new \Exception("Not implemented");
    }

    public function invoiceDelete($id)
    {
        return $this->resourceDelete('invoice-sent', $id);
    }

    private function resourceDelete(string $resource, int $id, $method = 'delete')
    {

        $resp = $this->execute($resource, 'delete', ['id' => $id]);

        if ($resp->getStatusCode() == 200) {
            return true;
        }

        // TODO: why 5xx??
        if ($resp->getStatusCode() == 500) {
            return true;
        }

        throw new APIException("Invalid return status");
    }

    public function execute(string $resource, string $method, $data = [], string $method2 = NULL): GuzzleHttp\Psr7\Response
    {

        $url = "API?_r=$resource&_m=$method";

        if (!empty($method2)) {
            $url = $url . "&_m2=" . $method2;
        }

        $options = [
            'form_params' => $data
        ];

        // disable 5xx exceptions on delete, as 5xx is always thrown
        if ($method == 'delete') {
            $options['http_errors'] = false;
        }

        try {
            return $this->client->request('POST', $url, $options);
        } catch (GuzzleHttp\Exception\ServerException $exception) {
            return NULL;
        }

    }

}