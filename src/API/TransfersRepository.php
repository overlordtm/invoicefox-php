<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\Transfer;

class TransfersRepository extends Resource
{

    protected $resourceName = 'transfer';

    protected $resourceModel = Transfer::class;

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
     * @return Transfer
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
     * @param Transfer $obj
     * @return Transfer
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function create(Transfer $obj)
    {
        return parent::_create($obj);
    }

    /**
     * @param Transfer $obj
     * @return Transfer
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function update(Transfer $obj)
    {
        return parent::_update($obj);
    }

}