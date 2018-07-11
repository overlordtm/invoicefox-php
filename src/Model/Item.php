<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 10.7.2018
 * Time: 21:19
 */

namespace RTFM\InvoiceFoxAPI\Model;


/**
 * Class Item
 * @package RTFM\InvoiceFoxAPI\Model
 */
class Item implements ArrayModel
{

    /*
     * 		{
			"id": 5,
			"code": "koda22677",
			"descr": "",
			"price": 42.0,
			"unit": "",
			"tax": 22.0,
			"ean": null,
			"ean_code": "",
			"lead_time": 0,
			"min_order": 0.0,
			"notes": "",
			"extern_code": "",
			"dont_inventory": 0,
			"sales_item": 0,
			"tags": "",
			"max_disct": "",
			"madein": "",
			"weight": ""
		},
     *
     */


    private $id;
    private $code;
    private $descr;
    private $price;
    private $unit;
    private $tax;
    private $ean;
    private $ean_code;
    private $lead_time;
    private $min_order;
    private $notes;
    private $extern_code;
    private $dont_inventory;
    private $sales_item;
    private $tags;
    private $max_disct;
    private $madein;
    private $weight;


    public static function from($data)
    {
        $obj = new self();

        foreach ($data as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->{$key} = $value;
            }
        }

        return $obj;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @param mixed $descr
     */
    public function setDescr($descr): void
    {
        $this->descr = $descr;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getEanCode()
    {
        return $this->ean_code;
    }

    /**
     * @param mixed $ean_code
     */
    public function setEanCode($ean_code): void
    {
        $this->ean_code = $ean_code;
    }

    /**
     * @return mixed
     */
    public function getLeadTime()
    {
        return $this->lead_time;
    }

    /**
     * @param mixed $lead_time
     */
    public function setLeadTime($lead_time): void
    {
        $this->lead_time = $lead_time;
    }

    /**
     * @return mixed
     */
    public function getMinOrder()
    {
        return $this->min_order;
    }

    /**
     * @param mixed $min_order
     */
    public function setMinOrder($min_order): void
    {
        $this->min_order = $min_order;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getExternCode()
    {
        return $this->extern_code;
    }

    /**
     * @param mixed $extern_code
     */
    public function setExternCode($extern_code): void
    {
        $this->extern_code = $extern_code;
    }

    /**
     * @return mixed
     */
    public function getDontInventory()
    {
        return $this->dont_inventory;
    }

    /**
     * @param mixed $dont_inventory
     */
    public function setDontInventory($dont_inventory): void
    {
        $this->dont_inventory = $dont_inventory;
    }

    /**
     * @return mixed
     */
    public function getSalesItem()
    {
        return $this->sales_item;
    }

    /**
     * @param mixed $sales_item
     */
    public function setSalesItem($sales_item): void
    {
        $this->sales_item = $sales_item;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getMaxDisct()
    {
        return $this->max_disct;
    }

    /**
     * @param mixed $max_disct
     */
    public function setMaxDisct($max_disct): void
    {
        $this->max_disct = $max_disct;
    }

    /**
     * @return mixed
     */
    public function getMadein()
    {
        return $this->madein;
    }

    /**
     * @param mixed $madein
     */
    public function setMadein($madein): void
    {
        $this->madein = $madein;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }


}