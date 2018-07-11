<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 10.7.2018
 * Time: 21:16
 */

namespace RTFM\InvoiceFoxAPI\Model;

/**
 * Class Item
 * @package RTFM\InvoiceFoxAPI\Model
 */
class Invoice implements ArrayModel
{

    private $id;
    private $title;
    private $date_sent;
    private $date_to_pay;
    private $date_served;
    private $id_partner;
    private $vat_level;
    private $date_payed;
    private $disabled;
    private $pub_notes;
    private $id_preinvoice;
    private $tags;
    private $reverse_vat;
    private $pub_notes2;
    private $payment;
    private $payment_act;
    private $date_served0;
    private $doctype;
    private $id_setup;
    private $id_currency;
    private $conv_rate;
    private $reference_document;
    private $reference_date;
    private $docnum;
    private $fiscal;
    private $id_sales_location;
    private $id_operator;
    private $version;
    private $to_fiscalize;
    private $fiscalized;
    private $id_invoice_sent_cn;
    private $id_project;

    public static function from(object $data)
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
     * @return Invoice
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Invoice
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateSent()
    {
        return $this->date_sent;
    }

    /**
     * @param mixed $date_sent
     * @return Invoice
     */
    public function setDateSent($date_sent)
    {
        $this->date_sent = $date_sent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateToPay()
    {
        return $this->date_to_pay;
    }

    /**
     * @param mixed $date_to_pay
     * @return Invoice
     */
    public function setDateToPay($date_to_pay)
    {
        $this->date_to_pay = $date_to_pay;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateServed()
    {
        return $this->date_served;
    }

    /**
     * @param mixed $date_served
     * @return Invoice
     */
    public function setDateServed($date_served)
    {
        $this->date_served = $date_served;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPartner()
    {
        return $this->id_partner;
    }

    /**
     * @param mixed $id_partner
     * @return Invoice
     */
    public function setIdPartner($id_partner)
    {
        $this->id_partner = $id_partner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVatLevel()
    {
        return $this->vat_level;
    }

    /**
     * @param mixed $vat_level
     * @return Invoice
     */
    public function setVatLevel($vat_level)
    {
        $this->vat_level = $vat_level;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatePayed()
    {
        return $this->date_payed;
    }

    /**
     * @param mixed $date_payed
     * @return Invoice
     */
    public function setDatePayed($date_payed)
    {
        $this->date_payed = $date_payed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param mixed $disabled
     * @return Invoice
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPubNotes()
    {
        return $this->pub_notes;
    }

    /**
     * @param mixed $pub_notes
     * @return Invoice
     */
    public function setPubNotes($pub_notes)
    {
        $this->pub_notes = $pub_notes;
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
     * @return Invoice
     */
    public function setIdPreinvoice($id_preinvoice)
    {
        $this->id_preinvoice = $id_preinvoice;
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
     * @return Invoice
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReverseVat()
    {
        return $this->reverse_vat;
    }

    /**
     * @param mixed $reverse_vat
     * @return Invoice
     */
    public function setReverseVat($reverse_vat)
    {
        $this->reverse_vat = $reverse_vat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPubNotes2()
    {
        return $this->pub_notes2;
    }

    /**
     * @param mixed $pub_notes2
     * @return Invoice
     */
    public function setPubNotes2($pub_notes2)
    {
        $this->pub_notes2 = $pub_notes2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     * @return Invoice
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentAct()
    {
        return $this->payment_act;
    }

    /**
     * @param mixed $payment_act
     * @return Invoice
     */
    public function setPaymentAct($payment_act)
    {
        $this->payment_act = $payment_act;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateServed0()
    {
        return $this->date_served0;
    }

    /**
     * @param mixed $date_served0
     * @return Invoice
     */
    public function setDateServed0($date_served0)
    {
        $this->date_served0 = $date_served0;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDoctype()
    {
        return $this->doctype;
    }

    /**
     * @param mixed $doctype
     * @return Invoice
     */
    public function setDoctype($doctype)
    {
        $this->doctype = $doctype;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSetup()
    {
        return $this->id_setup;
    }

    /**
     * @param mixed $id_setup
     * @return Invoice
     */
    public function setIdSetup($id_setup)
    {
        $this->id_setup = $id_setup;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCurrency()
    {
        return $this->id_currency;
    }

    /**
     * @param mixed $id_currency
     * @return Invoice
     */
    public function setIdCurrency($id_currency)
    {
        $this->id_currency = $id_currency;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConvRate()
    {
        return $this->conv_rate;
    }

    /**
     * @param mixed $conv_rate
     * @return Invoice
     */
    public function setConvRate($conv_rate)
    {
        $this->conv_rate = $conv_rate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceDocument()
    {
        return $this->reference_document;
    }

    /**
     * @param mixed $reference_document
     * @return Invoice
     */
    public function setReferenceDocument($reference_document)
    {
        $this->reference_document = $reference_document;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceDate()
    {
        return $this->reference_date;
    }

    /**
     * @param mixed $reference_date
     * @return Invoice
     */
    public function setReferenceDate($reference_date)
    {
        $this->reference_date = $reference_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocnum()
    {
        return $this->docnum;
    }

    /**
     * @param mixed $docnum
     * @return Invoice
     */
    public function setDocnum($docnum)
    {
        $this->docnum = $docnum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiscal()
    {
        return $this->fiscal;
    }

    /**
     * @param mixed $fiscal
     * @return Invoice
     */
    public function setFiscal($fiscal)
    {
        $this->fiscal = $fiscal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSalesLocation()
    {
        return $this->id_sales_location;
    }

    /**
     * @param mixed $id_sales_location
     * @return Invoice
     */
    public function setIdSalesLocation($id_sales_location)
    {
        $this->id_sales_location = $id_sales_location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdOperator()
    {
        return $this->id_operator;
    }

    /**
     * @param mixed $id_operator
     * @return Invoice
     */
    public function setIdOperator($id_operator)
    {
        $this->id_operator = $id_operator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return Invoice
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToFiscalize()
    {
        return $this->to_fiscalize;
    }

    /**
     * @param mixed $to_fiscalize
     * @return Invoice
     */
    public function setToFiscalize($to_fiscalize)
    {
        $this->to_fiscalize = $to_fiscalize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiscalized()
    {
        return $this->fiscalized;
    }

    /**
     * @param mixed $fiscalized
     * @return Invoice
     */
    public function setFiscalized($fiscalized)
    {
        $this->fiscalized = $fiscalized;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdInvoiceSentCn()
    {
        return $this->id_invoice_sent_cn;
    }

    /**
     * @param mixed $id_invoice_sent_cn
     * @return Invoice
     */
    public function setIdInvoiceSentCn($id_invoice_sent_cn)
    {
        $this->id_invoice_sent_cn = $id_invoice_sent_cn;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProject()
    {
        return $this->id_project;
    }

    /**
     * @param mixed $id_project
     * @return Invoice
     */
    public function setIdProject($id_project)
    {
        $this->id_project = $id_project;
        return $this;
    }


}