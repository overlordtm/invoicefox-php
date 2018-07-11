<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 11.7.2018
 * Time: 11:23
 */

namespace RTFM\InvoiceFoxAPI\Model;


class Transfer implements ArrayModel
{

    const DOCTYPE_IN = 0;
    const DOCTYPE_OUT = 1;
    const DOCTYPE_MOVE = 2;
    const DOCTYPE_ORDER = 3;
    const DOCTYPE_OTHER = 4;

    // subtypes for DOCTYPE_IN
    const SUBTYPE_ACCEPTANCE_FORM = 1;
    const SUBTYPE_INITIAL_STATE = 2;
    const SUBTYPE_RETURN = 3;
    const SUBTYPE_INVENTORY_SURPLUS = 3;

    private $id;
    private $docnum;
    private $date_created;
    private $disabled;

    private $pub_notes;
    private $pub_notes2;
    private $tags;

    private $id_contact_from;
    private $id_contact_to;
    private $doctype;
    private $id_invoice_sent;
    private $docsubtype;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Transfer
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Transfer
     */
    public function setDocnum($docnum)
    {
        $this->docnum = $docnum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     * @return Transfer
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
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
     * @return Transfer
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
     * @return Transfer
     */
    public function setPubNotes($pub_notes)
    {
        $this->pub_notes = $pub_notes;
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
     * @return Transfer
     */
    public function setPubNotes2($pub_notes2)
    {
        $this->pub_notes2 = $pub_notes2;
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
     * @return Transfer
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdContactFrom()
    {
        return $this->id_contact_from;
    }

    /**
     * @param mixed $id_contact_from
     * @return Transfer
     */
    public function setIdContactFrom($id_contact_from)
    {
        $this->id_contact_from = $id_contact_from;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdContactTo()
    {
        return $this->id_contact_to;
    }

    /**
     * @param mixed $id_contact_to
     * @return Transfer
     */
    public function setIdContactTo($id_contact_to)
    {
        $this->id_contact_to = $id_contact_to;
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
     * @return Transfer
     */
    public function setDoctype($doctype)
    {
        $this->doctype = $doctype;
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
     * @return Transfer
     */
    public function setIdInvoiceSent($id_invoice_sent)
    {
        $this->id_invoice_sent = $id_invoice_sent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocsubtype()
    {
        return $this->docsubtype;
    }

    /**
     * @param mixed $docsubtype
     * @return Transfer
     */
    public function setDocsubtype($docsubtype)
    {
        $this->docsubtype = $docsubtype;
        return $this;
    }


}