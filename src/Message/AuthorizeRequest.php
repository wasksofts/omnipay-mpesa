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
        $this->validate('amount', 'card');
        $this->getCard()->validate();
        $data = $this->getBaseData();
        return $data;
    }
}
