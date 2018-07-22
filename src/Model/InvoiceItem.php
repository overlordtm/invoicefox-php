<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 11.7.2018
 * Time: 13:37
 */

namespace RTFM\InvoiceFoxAPI\Model;


class InvoiceItem implements ArrayModel
{

        private static $create_fields = array("title", "discount", "id_invoice_sent", "id_preinvoice", "mu", "price", "prepay_percent", "qty", "vat"); //int
    protected $id; //int
    protected $id_invoice_sent; //String
    protected $title; //double
    protected $qty; //String
    protected $mu; //double
    protected $price; //double
    protected $vat; //double
    protected $discount; //int
    protected $id_account; //int
    protected $sortorder; //object
    protected $percent; //object
    protected $id_preinvoice; //object
    protected $p_title; //double
    protected $value; //double
protected $vat_value;

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

    public static function fromItem(Item $item)
    {
        /* @var $obj InvoiceItem */
        $obj = new self();

        $title = $item->getCode() . ": " . $item->getDescr();

        $obj->setMu($item->getUnit());
        $obj->setPrice($item->getPrice());
        $obj->setTitle($title);
        $obj->setVat($item->getTax());

        return $obj;
    }

    public function toArray(): array
    {
        $ret = array();

        foreach (self::$create_fields as $field) {
            $ret[$field] = $this->$field;
        }

        return $ret;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdInvoiceSent()
    {
        return $this->id_invoice_sent;
    }

    /**
     * @param mixed $id_invoice_sent
     */
    public function setIdInvoiceSent($id_invoice_sent)
    {
        $this->id_invoice_sent = $id_invoice_sent;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getMu()
    {
        return $this->mu;
    }

    /**
     * @param mixed $mu
     */
    public function setMu($mu)
    {
        $this->mu = $mu;
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
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param mixed $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getIdAccount()
    {
        return $this->id_account;
    }

    /**
     * @param mixed $id_account
     */
    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
    }

    /**
     * @return mixed
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * @param mixed $sortorder
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;
    }

    /**
     * @return mixed
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param mixed $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
    }

    /**
     * @return mixed
     */
    public function getIdPreinvoice()
    {
        return $this->id_preinvoice;
    }

    /**
     * @param mixed $id_preinvoice
     */
    public function setIdPreinvoice($id_preinvoice)
    {
        $this->id_preinvoice = $id_preinvoice;
    }

    /**
     * @return mixed
     */
    public function getPTitle()
    {
        return $this->p_title;
    }

    /**
     * @param mixed $p_title
     */
    public function setPTitle($p_title)
    {
        $this->p_title = $p_title;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getVatValue()
    {
        return $this->vat_value;
    }

    /**
     * @param mixed $vat_value
     */
    public function setVatValue($vat_value)
    {
        $this->vat_value = $vat_value;
    }
}