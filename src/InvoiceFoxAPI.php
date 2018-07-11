<?php
declare(strict_types=1);

namespace RTFM\InvoiceFoxAPI;

use GuzzleHttp;
use RTFM\InvoiceFoxAPI\Exception;
use RTFM\InvoiceFoxAPI\Model;

class InvoiceFoxAPI
{


    /**
     * @var GuzzleHttp\Client
     */
    private $client;


    /**
     * InvoiceFoxAPI constructor.
     */
    public function __construct($client)
    {
        $this->client = $client;
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

    /**
     * @param $callback
     * @param $resp
     * @return array|mixed|int
     * @throws Exception\APIException
     * @throws Exception\NotFoundException
     */
    private function handleResponse($callback, $resp)
    {
        /* @var $resp GuzzleHttp\Psr7\Response */

        if ($resp->getStatusCode() == 200) {
            $data = json_decode($resp->getBody()->getContents());

//            echo "Handler response" . var_export($data[0]);

            if (is_array($data[0]) && sizeof($data[0]) == 0) {
                throw new Exception\NotFoundException();
            }

            if (is_array($data[0]) && sizeof($data[0]) > 1) {
                return array_map($callback, $data[0]);
            }

            if (is_array($data[0]) && sizeof($data[0]) == 1) {

                // might be full object or just id
                if (count(get_object_vars($data[0][0])) == 1 && property_exists($data[0][0], "id")) {
                    return $data[0][0]->id;
                } else {
                    return call_user_func($callback, $data[0][0]);
                }
            }
        }

        throw new Exception\APIException("Invalid return status");
    }

    /**
     * List all partners
     *
     * @return array
     * @throws Exception\APIException
     * @throws Exception\NotFoundException
     */
    public function partnerList(): array
    {
        $resp = $this->execute('partner', 'select-all');

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp);
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

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp);
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

        return $this->handleResponse(array(Model\Partner::class, 'from'), $resp);
    }

    /**
     * @param Model\Partner $partner
     * @return Model\Partner
     * @throws Exception\APIException
     */
    public function partnerUpdate(Model\Partner $partner): Model\Partner
    {
        if(!is_int($partner->getId())) {
            throw new Exception\APIException("ID is not set on the Partner");
        }

        $resp = $this->execute('partner', 'update', $partner->toArray(), 'select-one');

        if ($resp->getStatusCode() == 200) {
            return json_decode($resp->getBody()->getContents());
        }

        throw new APIException("Invalid return status");
    }

    public function partnerDelete(int $id): bool
    {
        $resp = $this->execute('partner', 'delete', ['id' => $id]);

        if ($resp->getStatusCode() == 200) {
            return true;
        }

        if ($resp->getStatusCode() == 500) {
            return true;
        }

        return false;
    }

    public function itemList(): array
    {
        $resp = $this->execute('item', 'select-all');

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp);
    }

    public function itemGet(int $id): Model\Item
    {
        $resp = $this->execute('item', 'select-one', ["id" => $id]);

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp);
    }

    public function itemCreate(Model\Item $item): int
    {
        $resp = $this->execute('item', 'insert-into', $item->toArray());

        return $this->handleResponse(array(Model\Item::class, 'from'), $resp);
    }

    public function itemUpdate(Model\Item $item): Model\Item
    {
        if(!is_int($item->getId())) {
            throw new Exception\APIException("ID is not set on the Item");
        }

        $resp = $this->execute('item', 'update', $item->toArray(), 'select-one');

        if ($resp->getStatusCode() == 200) {
            return json_decode($resp->getBody()->getContents());
        }

        throw new APIException("Invalid return status");
    }

    public function itemDelete(int $id): bool
    {
        $resp = $this->execute('item', 'delete', ['id' => $id]);

        if ($resp->getStatusCode() == 200) {
            return true;
        }

        // TODO: why 5xx??
        if ($resp->getStatusCode() == 500) {
            return true;
        }

        throw new APIException("Invalid return status");
    }

    public function invoiceCreate()
    {

    }

    public function createProformaInvoice()
    {

    }


    public function execute(string $resource, string $method, $data = [], string $method2 = NULL): GuzzleHttp\Psr7\Response
    {

        $url = "API?_r=$resource&_m=$method";

        if(!empty($method2)) {
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