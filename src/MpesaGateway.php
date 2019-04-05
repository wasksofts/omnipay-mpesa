<?php

namespace Omnipay\Mpesa;

use Omnipay\Common\AbstractGateway;

/**
 * Mpesa Gateway
 */
class MpesaGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Mpesa';
    }

    public function getDefaultParameters()
    {
        return array(
            'key' => '',
            'testMode' => false,
        );
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @return Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Mpesa\Message\AuthorizeRequest', $parameters);
    }
}
