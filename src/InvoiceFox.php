<?php
declare(strict_types=1);

namespace RTFM\InvoiceFoxAPI;

use GuzzleHttp;
use RTFM\InvoiceFoxAPI\API\InvoicesRepository;
use RTFM\InvoiceFoxAPI\API\ItemsRepository;
use RTFM\InvoiceFoxAPI\API\PartnersRepository;
use RTFM\InvoiceFoxAPI\API\TransfersRepository;
use RTFM\InvoiceFoxAPI\Exception\APIException;

class InvoiceFox
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
     * @var ItemsRepository
     */
    private $itemsRepository;

    /**
     * InvoiceFoxAPI constructor.
     */
    public function __construct($client)
    {
        $this->client = $client;

        $this->invoicesRepository = new InvoicesRepository($client);
        $this->transfersRepository = new TransfersRepository($client);
        $this->partnersRepository = new PartnersRepository($client);
        $this->itemsRepository = new ItemsRepository($client);
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
     * @return InvoicesRepository
     */
    public function invoices()
    {
        return $this->invoicesRepository;
    }

    /**
     * @return TransfersRepository
     */
    public function transfers()
    {
        return $this->transfersRepository;
    }

    /**
     * @return PartnersRepository
     */
    public function partners()
    {
        return $this->partnersRepository;
    }

    public function items()
    {
        return $this->itemsRepository;
    }
}