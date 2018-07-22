<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 17:53
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Exception\APIException;
use RTFM\InvoiceFoxAPI\Model\ArrayModel;

class DependentResource extends Resource
{

    /**
     * @var int
     */
    protected $parentId;

    /**
     * @var string
     */
    protected static $partentIdField;

    /** @var array */
    protected $methods = array(
        'list' => 'select-of-more',
        'get' => 'select-one',
        'delete' => 'delete',
        'create' => 'insert-select',
        'update' => 'update-select',
    );

    /**
     * DependentResource constructor.
     * @param int $parentId
     */
    public function __construct($client, int $parentId)
    {
        if(!is_int($parentId)) {
            throw new APIException("parentId must be int!");
        }

        parent::__construct($client);
        $this->parentId = $parentId;
    }

    public function _list()
    {
        return parent::_list();
    }

    public function _get(int $id)
    {
        return parent::_get($id);
    }

    public function _delete(int $id)
    {
        return parent::_delete($id);
    }

    public function _create(ArrayModel $obj)
    {
        $obj->{$this->setterName(static::$partentIdField)}($this->parentId);
        return parent::_create($obj);
    }

    public function _update(ArrayModel $obj)
    {
        $obj->{$this->setterName(static::$partentIdField)}($this->parentId);
        return parent::_update($obj);
    }

    protected function postData($obj = NULL)
    {
        $original = parent::postData($obj);

        return array_merge($original, [static::$partentIdField => $this->parentId]);
    }

    protected function setterName($propertName, $capitalizeFirstCharacter = true)
    {

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $propertName)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return "set$str";
    }


}