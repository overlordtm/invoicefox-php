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
class Invoice extends BaseModel
{
    public static $requiredFields = array(
        "id_partner",
        "date_sent",
        "date_served",
        "date_to_pay",
    );

    public static $createFields = array(
        "id",
        "payment_act",
        "id_preinvoice",
        "doctype",
        "title",
        "version",
        "id_partner",
        "date_sent",
        "date_served",
        "date_served2",
        "date_to_pay",
        "payment",
        "pub_notes",
        "pub_notes2"
    );

    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var string */
    protected $date_sent;

    /** @var string */
    protected $date_to_pay;

    /** @var string */
    protected $date_served = "";

    /** @var int */
    protected $id_partner;

    /** @var double */
    protected $vat_level;

    /** @var string */
    protected $date_payed;

    /** @var bool */
    protected $disabled;

    /** @var string */
    protected $pub_notes;

    /** @var int */
    protected $id_preinvoice;

    /** @var string */
    protected $tags;

    /** @var bool */
    protected $reverse_vat;

    /** @var string */
    protected $pub_notes2;

    /** @var string */
    protected $payment;

    /** @var int */
    protected $payment_act;

    /** @var string */
    protected $date_served0;

    /** @var int */
    protected $doctype;

    /** @var int */
    protected $id_setup;

    /** @var int */
    protected $id_currency;

    /** @var double */
    protected $conv_rate;

    /** @var string */
    protected $reference_document;

    /** @var string */
    protected $reference_date;

    /** @var int */
    protected $docnum;

    /** @var mixed */
    protected $fiscal;

    /** @var mixed */
    protected $id_sales_location;

    /** @var mixed */
    protected $id_operator;

    /** @var int */
    protected $version;

    /** @var bool */
    protected $to_fiscalize;

    /** @var bool */
    protected $fiscalized;

    /** @var int */
    protected $id_invoice_sent_cn;

    /** @var int */
    protected $id_project;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Invoice
     */
    public function setId(int $id): Invoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Invoice
     */
    public function setTitle(string $title): Invoice
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateSent(): string
    {
        return $this->date_sent;
    }

    /**
     * @param string $date_sent
     * @return Invoice
     */
    public function setDateSent(string $date_sent): Invoice
    {
        $this->date_sent = $date_sent;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateToPay(): string
    {
        return $this->date_to_pay;
    }

    /**
     * @param string $date_to_pay
     * @return Invoice
     */
    public function setDateToPay(string $date_to_pay): Invoice
    {
        $this->date_to_pay = $date_to_pay;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateServed(): string
    {
        return $this->date_served;
    }

    /**
     * @param string $date_served
     * @return Invoice
     */
    public function setDateServed(string $date_served): Invoice
    {
        $this->date_served = $date_served;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdPartner(): int
    {
        return $this->id_partner;
    }

    /**
     * @param int $id_partner
     * @return Invoice
     */
    public function setIdPartner(int $id_partner): Invoice
    {
        $this->id_partner = $id_partner;
        return $this;
    }

    /**
     * @return float
     */
    public function getVatLevel(): float
    {
        return $this->vat_level;
    }

    /**
     * @param float $vat_level
     * @return Invoice
     */
    public function setVatLevel(float $vat_level): Invoice
    {
        $this->vat_level = $vat_level;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatePayed(): string
    {
        return $this->date_payed;
    }

    /**
     * @param string $date_payed
     * @return Invoice
     */
    public function setDatePayed(string $date_payed): Invoice
    {
        $this->date_payed = $date_payed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     * @return Invoice
     */
    public function setDisabled(bool $disabled): Invoice
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getPubNotes(): string
    {
        return $this->pub_notes;
    }

    /**
     * @param string $pub_notes
     * @return Invoice
     */
    public function setPubNotes(string $pub_notes): Invoice
    {
        $this->pub_notes = $pub_notes;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdPreinvoice(): int
    {
        return $this->id_preinvoice;
    }

    /**
     * @param int $id_preinvoice
     * @return Invoice
     */
    public function setIdPreinvoice(int $id_preinvoice): Invoice
    {
        $this->id_preinvoice = $id_preinvoice;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return Invoice
     */
    public function setTags(string $tags): Invoice
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReverseVat(): bool
    {
        return $this->reverse_vat;
    }

    /**
     * @param bool $reverse_vat
     * @return Invoice
     */
    public function setReverseVat(bool $reverse_vat): Invoice
    {
        $this->reverse_vat = $reverse_vat;
        return $this;
    }

    /**
     * @return string
     */
    public function getPubNotes2(): string
    {
        return $this->pub_notes2;
    }

    /**
     * @param string $pub_notes2
     * @return Invoice
     */
    public function setPubNotes2(string $pub_notes2): Invoice
    {
        $this->pub_notes2 = $pub_notes2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayment(): string
    {
        return $this->payment;
    }

    /**
     * @param string $payment
     * @return Invoice
     */
    public function setPayment(string $payment): Invoice
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentAct(): int
    {
        return $this->payment_act;
    }

    /**
     * @param int $payment_act
     * @return Invoice
     */
    public function setPaymentAct(int $payment_act): Invoice
    {
        $this->payment_act = $payment_act;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateServed0(): string
    {
        return $this->date_served0;
    }

    /**
     * @param string $date_served0
     * @return Invoice
     */
    public function setDateServed0(string $date_served0): Invoice
    {
        $this->date_served0 = $date_served0;
        return $this;
    }

    /**
     * @return int
     */
    public function getDoctype(): int
    {
        return $this->doctype;
    }

    /**
     * @param int $doctype
     * @return Invoice
     */
    public function setDoctype(int $doctype): Invoice
    {
        $this->doctype = $doctype;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdSetup(): int
    {
        return $this->id_setup;
    }

    /**
     * @param int $id_setup
     * @return Invoice
     */
    public function setIdSetup(int $id_setup): Invoice
    {
        $this->id_setup = $id_setup;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdCurrency(): int
    {
        return $this->id_currency;
    }

    /**
     * @param int $id_currency
     * @return Invoice
     */
    public function setIdCurrency(int $id_currency): Invoice
    {
        $this->id_currency = $id_currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getConvRate(): float
    {
        return $this->conv_rate;
    }

    /**
     * @param float $conv_rate
     * @return Invoice
     */
    public function setConvRate(float $conv_rate): Invoice
    {
        $this->conv_rate = $conv_rate;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceDocument(): string
    {
        return $this->reference_document;
    }

    /**
     * @param string $reference_document
     * @return Invoice
     */
    public function setReferenceDocument(string $reference_document): Invoice
    {
        $this->reference_document = $reference_document;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceDate(): string
    {
        return $this->reference_date;
    }

    /**
     * @param string $reference_date
     * @return Invoice
     */
    public function setReferenceDate(string $reference_date): Invoice
    {
        $this->reference_date = $reference_date;
        return $this;
    }

    /**
     * @return int
     */
    public function getDocnum(): int
    {
        return $this->docnum;
    }

    /**
     * @param int $docnum
     * @return Invoice
     */
    public function setDocnum(int $docnum): Invoice
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
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Invoice
     */
    public function setVersion(int $version): Invoice
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return bool
     */
    public function isToFiscalize(): bool
    {
        return $this->to_fiscalize;
    }

    /**
     * @param bool $to_fiscalize
     * @return Invoice
     */
    public function setToFiscalize(bool $to_fiscalize): Invoice
    {
        $this->to_fiscalize = $to_fiscalize;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFiscalized(): bool
    {
        return $this->fiscalized;
    }

    /**
     * @param bool $fiscalized
     * @return Invoice
     */
    public function setFiscalized(bool $fiscalized): Invoice
    {
        $this->fiscalized = $fiscalized;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdInvoiceSentCn(): int
    {
        return $this->id_invoice_sent_cn;
    }

    /**
     * @param int $id_invoice_sent_cn
     * @return Invoice
     */
    public function setIdInvoiceSentCn(int $id_invoice_sent_cn): Invoice
    {
        $this->id_invoice_sent_cn = $id_invoice_sent_cn;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdProject(): int
    {
        return $this->id_project;
    }

    /**
     * @param int $id_project
     * @return Invoice
     */
    public function setIdProject(int $id_project): Invoice
    {
        $this->id_project = $id_project;
        return $this;
    }


}