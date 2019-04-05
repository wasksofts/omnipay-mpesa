<?php
namespace Omnipay\Mpesa\Message;
/**
 * Authorize Request
 *
 * @method Response send()
 */
class AuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount');
        //$data = $this->getBaseData();
        //return $data;
    }
}
