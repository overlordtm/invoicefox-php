<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\ArrayModel;
use RTFM\InvoiceFoxAPI\Model\BaseModel;
use RTFM\InvoiceFoxAPI\Model\Partner;

class PartnersRepository extends Resource
{

    protected $resourceName = 'partner';

    protected $resourceModel = Partner::class;

    /**
     * @return array
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function list()
    {
        return parent::_list();
    }

    /**
     * @param int $id
     * @return Partner
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function get(int $id)
    {
        return parent::_get($id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     */
    public function delete(int $id)
    {
        return parent::_delete($id);
    }

    /**
     * @param Partner $obj
     * @return Partner
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function create(Partner $obj)
    {
        return parent::_create($obj);
    }

    /**
     * @param Partner $obj
     * @return Partner
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function update(Partner $obj)
    {
        return parent::_update($obj);
    }


}