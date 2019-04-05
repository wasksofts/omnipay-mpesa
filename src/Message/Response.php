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
        return isset($this->data['success']);
    }

    public function getTransactionReference()
    {
        if (isset($this->data['reference'])) {
            return $this->data['reference'];
        }
    }

}
