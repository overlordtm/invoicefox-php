<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\Item;

class ItemsRepository extends Resource
{

    protected $resourceName = 'item';

    protected $resourceModel = Item::class;

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
     * @param Item $obj
     * @return Item
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function create(Item $obj)
    {
        return parent::_create($obj);
    }

    /**
     * @param Item $obj
     * @return Item
     * @throws \RTFM\InvoiceFoxAPI\Exception\APIException
     * @throws \RTFM\InvoiceFoxAPI\Exception\NotFoundException
     */
    public function update(Item $obj)
    {
        return parent::_update($obj);
    }


}