<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 11.7.2018
 * Time: 11:39
 */

namespace RTFM\InvoiceFoxAPI\Model;


class TransferItem implements ArrayModel
{
    /**
     * @var int
     */
    public $id; //int

    /**
     * @var int
     */
    public $id_transfer; //int

    /**
     * @var int
     */
    public $id_item; //int

    /**
     * @var string
     */
    public $descr; //String

    /**
     * @var int
     */
    public $qty;

    /**
     * @var string
     */
    public $mu; //String

    /**
     * @var double
     */
    public $price; //double

    /**
     * @var double
     */
    public $discount; //double

    /**
     * @var double
     */
    public $vat; //double

    /**
     * @var bool
     */
    public $is_product;

    /**
     * @var int
     */
    public $id_transfer_b; //int

    /**
     * @var bool
     */
    public $dont_inventory; //int

    /**
     * @var double
     */
    public $price2; //double

    /**
     * @var double
     */
    public $discount2; //double

    /**
     * @var double
     */
    public $value; //double

    /**
     * @var double
     */
    public $value2; //double

    /**
     * @var string
     */
    public $code; //String

    /**
     * @var string
     */
    public $barcode; //String

    /**
     * @var double
     */
    public $margin_val; //double

    /**
     * @var double
     */
    public $margin_perc; //object


    private static $create_fields = array("descr", "discount", "id_item", "id_transfer", "mu", "price", "price2", "qty", "vat");

    public function toArray(): array
    {
        $ret = array();

        foreach(self::$create_fields as $field) {
            $ret[$field] = $this->$field;
        }

        return $ret;
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

    public static function fromItem(Item $item)
    {
        $obj = new self();

        $obj->setIdItem($item->getId());
        $obj->setMu($item->getUnit());
        $obj->setCode($item->getCode());
        $obj->setDescr($item->getDescr());
        $obj->setPrice2($item->getPrice());
        $obj->setVat($item->getTax());

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
     * @return TransferItem
     */
    public function setId(int $id): TransferItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdTransfer(): int
    {
        return $this->id_transfer;
    }

    /**
     * @param int $id_transfer
     * @return TransferItem
     */
    public function setIdTransfer(int $id_transfer): TransferItem
    {
        $this->id_transfer = $id_transfer;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdItem(): int
    {
        return $this->id_item;
    }

    /**
     * @param int $id_item
     * @return TransferItem
     */
    public function setIdItem(int $id_item): TransferItem
    {
        $this->id_item = $id_item;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescr(): string
    {
        return $this->descr;
    }

    /**
     * @param string $descr
     * @return TransferItem
     */
    public function setDescr(string $descr): TransferItem
    {
        $this->descr = $descr;
        return $this;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     * @return TransferItem
     */
    public function setQty(int $qty): TransferItem
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * @return string
     */
    public function getMu(): string
    {
        return $this->mu;
    }

    /**
     * @param string $mu
     * @return TransferItem
     */
    public function setMu(string $mu): TransferItem
    {
        $this->mu = $mu;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return TransferItem
     */
    public function setPrice(float $price): TransferItem
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return TransferItem
     */
    public function setDiscount(float $discount): TransferItem
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     * @return TransferItem
     */
    public function setVat(float $vat): TransferItem
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProduct(): bool
    {
        return $this->is_product;
    }

    /**
     * @param bool $is_product
     * @return TransferItem
     */
    public function setIsProduct(bool $is_product): TransferItem
    {
        $this->is_product = $is_product;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdTransferB(): int
    {
        return $this->id_transfer_b;
    }

    /**
     * @param int $id_transfer_b
     * @return TransferItem
     */
    public function setIdTransferB(int $id_transfer_b): TransferItem
    {
        $this->id_transfer_b = $id_transfer_b;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDontInventory(): bool
    {
        return $this->dont_inventory;
    }

    /**
     * @param bool $dont_inventory
     * @return TransferItem
     */
    public function setDontInventory(bool $dont_inventory): TransferItem
    {
        $this->dont_inventory = $dont_inventory;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice2(): float
    {
        return $this->price2;
    }

    /**
     * @param float $price2
     * @return TransferItem
     */
    public function setPrice2(float $price2): TransferItem
    {
        $this->price2 = $price2;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount2(): float
    {
        return $this->discount2;
    }

    /**
     * @param float $discount2
     * @return TransferItem
     */
    public function setDiscount2(float $discount2): TransferItem
    {
        $this->discount2 = $discount2;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return TransferItem
     */
    public function setValue(float $value): TransferItem
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue2(): float
    {
        return $this->value2;
    }

    /**
     * @param float $value2
     * @return TransferItem
     */
    public function setValue2(float $value2): TransferItem
    {
        $this->value2 = $value2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return TransferItem
     */
    public function setCode(string $code): TransferItem
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     * @return TransferItem
     */
    public function setBarcode(string $barcode): TransferItem
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarginVal(): float
    {
        return $this->margin_val;
    }

    /**
     * @param float $margin_val
     * @return TransferItem
     */
    public function setMarginVal(float $margin_val): TransferItem
    {
        $this->margin_val = $margin_val;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarginPerc(): float
    {
        return $this->margin_perc;
    }

    /**
     * @param float $margin_perc
     * @return TransferItem
     */
    public function setMarginPerc(float $margin_perc): TransferItem
    {
        $this->margin_perc = $margin_perc;
        return $this;
    }


}
