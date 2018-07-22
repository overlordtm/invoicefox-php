<?php

namespace RTFM\InvoiceFoxAPI\Model;


class InvoiceItem extends BaseModel
{

    public static $requiredFields = array(
        "title",
		"qty",
		"price",
		"vat",
		"id_invoice_sent"
    );

    public static $createFields = array(
        "title",
        "price",
        "qty",
        "mu",
        "discount",
        "vat",
        "id_invoice_sent",
        "id_preinvoice",
        "prepay_percent",
    );

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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return InvoiceItem
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return InvoiceItem
     */
    public function setIdInvoiceSent($id_invoice_sent)
    {
        $this->id_invoice_sent = $id_invoice_sent;
        return $this;
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
     * @return InvoiceItem
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
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
     * @return InvoiceItem
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
        return $this;
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
     * @return InvoiceItem
     */
    public function setMu($mu)
    {
        $this->mu = $mu;
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
     * @return InvoiceItem
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
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
     * @return InvoiceItem
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
        return $this;
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
     * @return InvoiceItem
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
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
     * @return InvoiceItem
     */
    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
        return $this;
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
     * @return InvoiceItem
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;
        return $this;
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
     * @return InvoiceItem
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
        return $this;
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
     * @return InvoiceItem
     */
    public function setIdPreinvoice($id_preinvoice)
    {
        $this->id_preinvoice = $id_preinvoice;
        return $this;
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
     * @return InvoiceItem
     */
    public function setPTitle($p_title)
    {
        $this->p_title = $p_title;
        return $this;
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
     * @return InvoiceItem
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
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
     * @return InvoiceItem
     */
    public function setVatValue($vat_value)
    {
        $this->vat_value = $vat_value;
        return $this;
    }

}