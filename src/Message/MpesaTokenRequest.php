<?php
/**
 * Mpesa Token Request
 */

namespace Omnipay\Mpesa\Message;

class MpesaTokenRequest extends AbstractRequest
{
    public function getData()
    {
        return array('grant_type' => 'client_credentials');
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint() . 'oauth/v1/generate?';
    }

    public function sendData($data)
    {
        $body = $data ? http_build_query($data, '', '&') : null;
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            array(
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode("{$this->getConsumerKey()}:{$this->getConsumerSecret()}"),
            ),
            $body
        );
        // Empty response body should be parsed also as and empty array
        $body = (string) $httpResponse->getBody()->getContents();
        $jsonToArrayResponse = !empty($body) ? json_decode($body, true) : array();
        return $this->response = new Response($this, $jsonToArrayResponse, $httpResponse->getStatusCode());
    }
}
