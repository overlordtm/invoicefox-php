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
class Partner implements ArrayModel
{
    /*
     * 		{
			"id": 7,
			"name": "Ime Podjetja 3 d.o.o.",
			"street": "Ulica In stevilka",
			"postal": "1000",
			"city": "Ljubljana",
			"vatid": "94265771",
			"phone": "",
			"website": "",
			"email": "",
			"notes": "",
			"vatbound": 1,
			"custaddr": "",
			"payment_period": 15,
			"street2": "",
			"country": "",
			"parent": 0,
			"bankacc": "",
			"bic_bei": "",
			"internal_id": "",
			"reg_num": "",
			"flags": 0
		}
     */

    /**
     * @var int
     */
    private $id = NULL;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $street = "";

    /**
     * @var string
     */
    private $street2 = "";

    /**
     * @var string
     */
    private $postal = "";

    /**
     * @var string
     */
    private $city = "";

    /**
     * @var string
     */
    private $country = "";

    /**
     * @var string
     */
    private $vatid = "";

    /**
     * @var string
     */
    private $phone = "";

    /**
     * @var string
     */
    private $website = "";

    /**
     * @var string
     */
    private $email = "";

    /**
     * @var string
     */
    private $notes = "";

    /**
     * @var bool
     */
    private $vatbound = false;

    /**
     * @var string
     */
    private $custaddr = "";

    /**
     * @var int
     */
    private $payment_period = 0;

    /**
     * @var int
     */
    private $parent = 0;

    /**
     * @var string
     */
    private $bankacc = "";

    /**
     * @var string
     */
    private $bic_bei = "";

    /**
     * @var string
     */
    private $internal_id = "";

    /**
     * @var string
     */
    private $reg_num = "";

    /**
     * @var int
     */
    private $flags = 0;

    public function toArray(): array
    {
        return get_object_vars($this);
    }

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