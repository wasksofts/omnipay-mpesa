<?php
/**
 * Mpesa Response
 */

namespace Omnipay\Mpesa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class MpesaResponse extends AbstractResponse
{
    protected $statusCode;

    public function __construct(RequestInterface $request, $data, $statusCode = 200)
    {
        parent::__construct($request, $data);
        $this->statusCode = $statusCode;
    }

    public function isSuccessful()
    {
        return empty($this->data['Error Code']) && $this->getCode() < 400;
    }

    public function getCode()
    {
        return $this->statusCode;
    }

}