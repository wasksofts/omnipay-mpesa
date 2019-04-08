<?php
/**
 * Mpesa Purchase Request
 */

namespace Omnipay\Mpesa\Message;

class MpesaPurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {
        $data = parent::getData();   
        return $data;
    }
}