<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 10.7.2018
 * Time: 20:09
 */

namespace RTFM\InvoiceFoxAPI\Model;


class BaseModel implements ArrayModel
{

    /** @var string  */
    public static $idField = 'id';

    /** @var array|null */
    public static $createFields = NULL;

    /** @var array */
    public static $requiredFields = array();

    /** @var string */
    public static $dateFormat = 'd.m.Y';

    /** @return int|null */
    public function getId()
    {
        if (property_exists($this, $this->idField)) {
            return $this->{static::idField};
        } else {
            return NULL;
        }
    }

    public function toArray(): array
    {
        if(is_null(static::$createFields)) {
            return get_object_vars($this);
        } else {
            $ret = array();

            foreach(static::$createFields as $field) {
                $ret[$field] = $this->$field;
            }

            return $ret;
        }
    }

    public static function from($data)
    {
        $obj = new static();

        foreach ($data as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->{$key} = $value;
            }
        }

        return $obj;
    }

}