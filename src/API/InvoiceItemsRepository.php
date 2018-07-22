<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 21:50
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\InvoiceItem;

class InvoiceItemsRepository extends DependentResource
{

    protected $resourceName = 'invoice-sent-b';

    protected $resourceModel = InvoiceItem::class;

    protected static $partentIdField = "id_invoice_sent";

    /**
     * @return array
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     */
    public function list()
    {
        return parent::_list();
    }

    /**
     * @param int $id
     * @return InvoiceItem
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
    public function create(InvoiceItem $obj)
    {
        return parent::_create($obj);
    }

    /**
     * @param Invoice $obj
     * @return Invoice
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function update(InvoiceItem $obj)
    {
        return parent::_update($obj);
    }

}