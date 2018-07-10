<?php
declare(strict_types=1);

namespace RTFM\InvoiceFoxAPI;

use GuzzleHttp;

class InvoiceFoxAPI
{


    /**
     * @var GuzzleHttp\Client
     */
    private $client;


    /**
     * @var string
     */
    private $baseURL;


    /**
     * InvoiceFoxAPI constructor.
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    public static function newInstance()
    {
        $client = new GuzzleHttp\Client(
            [
                // Base URI is used with relative requests
                'base_uri' => 'https://www.cebelca.biz/',
                // You can set any number of default request options.
                'timeout' => 15.0,
                'auth' => ['00pntreakscjh253cgf1xs9a1l5btszeddemuri7', 'x'],
            ]
        );

        return new self($client);
    }

    public function listPartners()
    {
        $resp = $this->execute('partner', 'select-all');

        if($resp->getStatusCode() == 200) {
            return json_decode($resp->getBody()->getContents());
        }

        throw new APIException("Invalid return status");
    }

    public function createInvoice()
    {

    }

    public function createProformaInvoice()
    {

    }


    public function execute(string $resource, string $method, $data = []): GuzzleHttp\Psr7\Response
    {

        $url = "API?_r=$resource&_m=$method";

        $options = [
            'form_params' => $data
        ];

        return $this->client->request('POST', $url, $options);
    }

}