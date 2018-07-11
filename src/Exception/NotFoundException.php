<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 11.7.2018
 * Time: 9:39
 */

namespace RTFM\InvoiceFoxAPI\Exception;


use RTFM\InvoiceFoxAPI\Exception\APIException;
use Throwable;

class NotFoundException extends APIException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = "Object not found";
        }

        parent::__construct($message, $code, $previous);
    }

}