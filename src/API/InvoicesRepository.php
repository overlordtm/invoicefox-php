<?php

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\ArrayModel;
use RTFM\InvoiceFoxAPI\Model\BaseModel;
use RTFM\InvoiceFoxAPI\Model\Invoice;

class InvoicesRepository extends Resource
{

    protected $resourceName = 'invoice-sent';

    protected $resourceModel = Invoice::class;

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
     * @return Invoice
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
     * @param Invoice $obj
     * @return Invoice
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function create(Invoice $obj)
    {
        return parent::_create($obj);
    }

    /**
     * @param Invoice $obj
     * @return Invoice
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function update(Invoice $obj)
    {
        return parent::_update($obj);
    }


}