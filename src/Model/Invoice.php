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

    /*
     *
     		{
			"id": 9,
			"title": "",
			"date_sent": "2018-07-05",
			"date_to_pay": "2018-07-05",
			"date_served": "2018-07-05",
			"id_partner": 14,
			"vat_level": 0.0,
			"date_payed": 0,
			"disabled": 0,
			"pub_notes": "some notes",
			"id_preinvoice": 0,
			"tags": "",
			"reverse_vat": 0,
			"pub_notes2": "",
			"payment": "",
			"payment_act": 0,
			"date_served0": "",
			"doctype": 0,
			"id_setup": 0,
			"id_currency": 0,
			"conv_rate": 0.0,
			"reference_document": "",
			"reference_date": "",
			"docnum": 0,
			"fiscal": null,
			"id_sales_location": null,
			"id_operator": null,
			"version": 1,
			"to_fiscalize": null,
			"fiscalized": null,
			"id_invoice_sent_cn": null,
			"id_project": null
		},
     */


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
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setTitle($title): void
    {
        $this->title = $title;
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
     */
    public function setDateSent($date_sent): void
    {
        $this->date_sent = $date_sent;
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
     */
    public function setDateToPay($date_to_pay): void
    {
        $this->date_to_pay = $date_to_pay;
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
     */
    public function setDateServed($date_served): void
    {
        $this->date_served = $date_served;
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
     */
    public function setIdPartner($id_partner): void
    {
        $this->id_partner = $id_partner;
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
     */
    public function setVatLevel($vat_level): void
    {
        $this->vat_level = $vat_level;
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
     */
    public function setDatePayed($date_payed): void
    {
        $this->date_payed = $date_payed;
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
     */
    public function setDisabled($disabled): void
    {
        $this->disabled = $disabled;
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
     */
    public function setPubNotes($pub_notes): void
    {
        $this->pub_notes = $pub_notes;
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
    public function setIdPreinvoice($id_preinvoice): void
    {
        $this->id_preinvoice = $id_preinvoice;
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
    public function getReverseVat()
    {
        return $this->reverse_vat;
    }

    /**
     * @param mixed $reverse_vat
     */
    public function setReverseVat($reverse_vat): void
    {
        $this->reverse_vat = $reverse_vat;
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
     */
    public function setPubNotes2($pub_notes2): void
    {
        $this->pub_notes2 = $pub_notes2;
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
     */
    public function setPayment($payment): void
    {
        $this->payment = $payment;
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
     */
    public function setPaymentAct($payment_act): void
    {
        $this->payment_act = $payment_act;
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
     */
    public function setDateServed0($date_served0): void
    {
        $this->date_served0 = $date_served0;
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
     */
    public function setDoctype($doctype): void
    {
        $this->doctype = $doctype;
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
     */
    public function setIdSetup($id_setup): void
    {
        $this->id_setup = $id_setup;
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
     */
    public function setIdCurrency($id_currency): void
    {
        $this->id_currency = $id_currency;
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
     */
    public function setConvRate($conv_rate): void
    {
        $this->conv_rate = $conv_rate;
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
     */
    public function setReferenceDocument($reference_document): void
    {
        $this->reference_document = $reference_document;
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
     */
    public function setReferenceDate($reference_date): void
    {
        $this->reference_date = $reference_date;
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
     */
    public function setDocnum($docnum): void
    {
        $this->docnum = $docnum;
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
     */
    public function setFiscal($fiscal): void
    {
        $this->fiscal = $fiscal;
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
     */
    public function setIdSalesLocation($id_sales_location): void
    {
        $this->id_sales_location = $id_sales_location;
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
     */
    public function setIdOperator($id_operator): void
    {
        $this->id_operator = $id_operator;
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
     */
    public function setVersion($version): void
    {
        $this->version = $version;
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
     */
    public function setToFiscalize($to_fiscalize): void
    {
        $this->to_fiscalize = $to_fiscalize;
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
     */
    public function setFiscalized($fiscalized): void
    {
        $this->fiscalized = $fiscalized;
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
     */
    public function setIdInvoiceSentCn($id_invoice_sent_cn): void
    {
        $this->id_invoice_sent_cn = $id_invoice_sent_cn;
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
     */
    public function setIdProject($id_project): void
    {
        $this->id_project = $id_project;
    }


}