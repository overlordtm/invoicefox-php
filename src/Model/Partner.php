<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 10.7.2018
 * Time: 20:09
 */

namespace RTFM\InvoiceFoxAPI\Model;

/**
 * Class Partner
 *
 * @package RTFM\InvoiceFoxAPI\Model
 */
class Partner extends BaseModel
{

    public static $requiredFields = array(
        "name",
    );

    public static $createFields = array(
        "id",
        "name",
        "street",
        "city",
        "postal",
        "custaddr",
        "vatbound",
        "vatid",
        "payment_period",
        "bankacc",
        "bic_bei",
        "reg_num",
        "internal_id",
        "phone",
        "email",
        "website",
        "notes",
    );

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $street = "";

    /** @var string */
    protected $street2 = "";

    /** @var string */
    protected $postal = "";

    /** @var string */
    protected $city = "";

    /** @var string */
    protected $country = "";

    /** @var string */
    protected $vatid = "";

    /** @var string */
    protected $phone = "";

    /** @var string */
    protected $website = "";

    /** @var string */
    protected $email = "";

    /** @var string */
    protected $notes = "";

    /** @var bool */
    protected $vatbound = false;

    /** @var string */
    protected $custaddr = "";

    /** @var int */
    protected $payment_period = 0;

    /** @var int */
    protected $parent = 0;

    /** @var string */
    protected $bankacc = "";

    /** @var string */
    protected $bic_bei = "";

    /** @var string */
    protected $internal_id = "";

    /** @var string */
    protected $reg_num = "";

    /** @var int */
    protected $flags = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Partner
     */
    public function setId(int $id): Partner
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Partner
     */
    public function setName(string $name): Partner
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Partner
     */
    public function setStreet(string $street): Partner
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->street2;
    }

    /**
     * @param string $street2
     * @return Partner
     */
    public function setStreet2(string $street2): Partner
    {
        $this->street2 = $street2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostal(): string
    {
        return $this->postal;
    }

    /**
     * @param string $postal
     * @return Partner
     */
    public function setPostal(string $postal): Partner
    {
        $this->postal = $postal;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Partner
     */
    public function setCity(string $city): Partner
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Partner
     */
    public function setCountry(string $country): Partner
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatid(): string
    {
        return $this->vatid;
    }

    /**
     * @param string $vatid
     * @return Partner
     */
    public function setVatid(string $vatid): Partner
    {
        $this->vatid = $vatid;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Partner
     */
    public function setPhone(string $phone): Partner
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Partner
     */
    public function setWebsite(string $website): Partner
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Partner
     */
    public function setEmail(string $email): Partner
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Partner
     */
    public function setNotes(string $notes): Partner
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVatbound(): bool
    {
        return $this->vatbound;
    }

    /**
     * @param bool $vatbound
     * @return Partner
     */
    public function setVatbound(bool $vatbound): Partner
    {
        $this->vatbound = $vatbound;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustaddr(): string
    {
        return $this->custaddr;
    }

    /**
     * @param string $custaddr
     * @return Partner
     */
    public function setCustaddr(string $custaddr): Partner
    {
        $this->custaddr = $custaddr;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentPeriod(): int
    {
        return $this->payment_period;
    }

    /**
     * @param int $payment_period
     * @return Partner
     */
    public function setPaymentPeriod(int $payment_period): Partner
    {
        $this->payment_period = $payment_period;
        return $this;
    }

    /**
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     * @return Partner
     */
    public function setParent(int $parent): Partner
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankacc(): string
    {
        return $this->bankacc;
    }

    /**
     * @param string $bankacc
     * @return Partner
     */
    public function setBankacc(string $bankacc): Partner
    {
        $this->bankacc = $bankacc;
        return $this;
    }

    /**
     * @return string
     */
    public function getBicBei(): string
    {
        return $this->bic_bei;
    }

    /**
     * @param string $bic_bei
     * @return Partner
     */
    public function setBicBei(string $bic_bei): Partner
    {
        $this->bic_bei = $bic_bei;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalId(): string
    {
        return $this->internal_id;
    }

    /**
     * @param string $internal_id
     * @return Partner
     */
    public function setInternalId(string $internal_id): Partner
    {
        $this->internal_id = $internal_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegNum(): string
    {
        return $this->reg_num;
    }

    /**
     * @param string $reg_num
     * @return Partner
     */
    public function setRegNum(string $reg_num): Partner
    {
        $this->reg_num = $reg_num;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlags(): int
    {
        return $this->flags;
    }

    /**
     * @param int $flags
     * @return Partner
     */
    public function setFlags(int $flags): Partner
    {
        $this->flags = $flags;
        return $this;
    }

}