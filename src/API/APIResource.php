<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 21.7.2018
 * Time: 23:51
 */

namespace RTFM\InvoiceFoxAPI\API;

use GuzzleHttp;
use RTFM\InvoiceFoxAPI\Exception;
use RTFM\InvoiceFoxAPI\Exception\APIException;
use RTFM\InvoiceFoxAPI\Model\ArrayModel;
use RTFM\InvoiceFoxAPI\Model\BaseModel;

class APIResource
{

    /** @var string */
    protected $resourceName;

    /** @var */
    protected $resourceModel;

    /** @var array */
    protected $methods = array(
        'list' => 'select-all',
        'get' => 'select-one',
        'delete' => 'delete',
        'create' => 'insert-select',
        'update' => 'update-select',
    );

    /** @var GuzzleHttp\Client */
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    private static function id_extractor($data): int
    {
        if (count(get_object_vars($data)) == 1 && property_exists($data, "id")) {
            return intval($data->id);
        } else {
            throw new Exception\APIException("Unknown response format");
        }
    }

    /**
     * @return array
     * @throws APIException
     * @throws Exception\NotFoundException
     */
    public function list()
    {
        $resp = $this->autoRequest('list');
        return $this->handleResponse(array($this->resourceModel, 'from'), $resp, false, true);
    }

    private function autoRequest($op, $data = [])
    {
        return $this->doRequest($this->resourceName, $this->getResourceMethod($op), $data);
    }

    private function doRequest(string $resource, string $method, $data = [], string $method2 = NULL): GuzzleHttp\Psr7\Response
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

    private function getResourceMethod(string $op)
    {
        if (!array_key_exists($op, $this->methods)) {
            throw new Exception\NotImplementedException("Operation $op is not implemented");
        }

        return $this->methods[$op];
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

    /**
     * @param int $id
     * @return BaseModel
     * @throws APIException
     * @throws Exception\NotFoundException
     */
    public function get(int $id)
    {
        $resp = $this->autoRequest('get', ['id' => $id]);
        return $this->handleResponse(array($this->resourceModel, 'from'), $resp, true, false);
    }

    /**
     * @param int $id
     * @return bool
     * @throws APIException
     */
    public function delete(int $id)
    {

        $resp = $this->autoRequest('delete', ['id' => $id]);

        $statusCode = $resp->getStatusCode();

        switch ($statusCode) {
            case 200:
            case 500:
                return true;
            default:
                $body = $resp->getBody()->getContents();
                throw new APIException("Invalid return status: $statusCode ($body)");
        }
    }

    /**
     * @param BaseModel $obj
     * @return BaseModel
     * @throws APIException
     * @throws Exception\NotFoundException
     */
    public function create(ArrayModel $obj)
    {
        $resp = $this->autoRequest('create', $obj->toArray());
        return $this->handleResponse(array($this->resourceModel, 'from'), $resp, true, false);
    }

    /**
     * @param BaseModel $obj
     * @return BaseModel
     * @throws APIException
     * @throws Exception\NotFoundException
     */
    public function update(ArrayModel $obj)
    {
        $resp = $this->autoRequest('update', $obj->toArray());
        return $this->handleResponse(array($this->resourceModel, 'from'), $resp, true, false);
    }

}