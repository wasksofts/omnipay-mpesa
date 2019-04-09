<?php

namespace Omnipay\Mpesa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Response
 */
class Response extends AbstractResponse
{
    
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function isSuccessful()
    {
        return isset($this->data['ResponseCode']) && in_array($this->data['ResponseCode'], array('0', '000000'));
  
    }

    public function getTransactionReference()
    {
        foreach (array('CheckoutRequestID',
            'ResultDesc',
            'MerchantRequestID',
            'ResponseDescription') as $key) {
            if (isset($this->data[$key])) {
                return $this->data[$key];
            }
        }
    }
    
    public function getMessage()
    {
        if (isset($this->data['errorCode'])) {
            return $this->data['errorCode'];
        }

        if (isset($this->data['errorMessage'])) {
            return $this->data['errorMessage'];
        }
        
        return null;
    }


}
