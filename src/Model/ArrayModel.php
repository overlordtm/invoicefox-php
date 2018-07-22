<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 10.7.2018
 * Time: 20:09
 */

namespace RTFM\InvoiceFoxAPI\Model;


interface ArrayModel
{

    /**
     * @return int|null
     */
    public function getId();

    public function toArray(): array;

}