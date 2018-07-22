<?php


namespace RTFM\InvoiceFoxAPI\Model;


/**
 * Class Item
 * @package RTFM\InvoiceFoxAPI\Model
 */
class Item extends BaseModel
{

    public static $requiredFields = array(
        "code",
        "price",
        "tax",
    );

    public static $createFields = array(
        "id",
        "code",
        "descr",
        "price",
        "unit",
        "tax",
        "ean_code",
        "dont_inventory",
        "sales_item",
        "tags",
        "extern_code",
        "lead_time",
        "min_order",
        "max_disct",
        "madein",
        "weight",
        "notes",
    );

    protected $id;
    protected $code;
    protected $descr;
    protected $price;
    protected $unit;
    protected $tax;
    protected $ean;
    protected $ean_code;
    protected $lead_time;
    protected $min_order;
    protected $notes;
    protected $extern_code;
    protected $dont_inventory;
    protected $sales_item;
    protected $tags;
    protected $max_disct;
    protected $madein;
    protected $weight;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Item
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Item
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
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
     * @return Item
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;
        return $this;
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
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
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
     * @return Item
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
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
     * @return Item
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
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
     * @return Item
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
        return $this;
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
     * @return Item
     */
    public function setEanCode($ean_code)
    {
        $this->ean_code = $ean_code;
        return $this;
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
     * @return Item
     */
    public function setLeadTime($lead_time)
    {
        $this->lead_time = $lead_time;
        return $this;
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
     * @return Item
     */
    public function setMinOrder($min_order)
    {
        $this->min_order = $min_order;
        return $this;
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
     * @return Item
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
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
     * @return Item
     */
    public function setExternCode($extern_code)
    {
        $this->extern_code = $extern_code;
        return $this;
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
     * @return Item
     */
    public function setDontInventory($dont_inventory)
    {
        $this->dont_inventory = $dont_inventory;
        return $this;
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
     * @return Item
     */
    public function setSalesItem($sales_item)
    {
        $this->sales_item = $sales_item;
        return $this;
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
     * @return Item
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
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
     * @return Item
     */
    public function setMaxDisct($max_disct)
    {
        $this->max_disct = $max_disct;
        return $this;
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
     * @return Item
     */
    public function setMadein($madein)
    {
        $this->madein = $madein;
        return $this;
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
     * @return Item
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }


}