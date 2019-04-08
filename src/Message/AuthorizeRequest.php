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
        $this->validate(
            'amount',
            'description',
            'callbackUrl',
            'account',
            'phone_number'
        );

        $items = $this->getItems();
        $timestamp = date('YmdHis');
       
        $data['BusinessShortCode'] = $this->getShortCode();
        $data['Password'] = $this->generatePassword($timestamp);
        $data['Timestamp'] =  $timestamp;
        $data['TransactionType'] = 'CustomerPayBillOnline';
        $data['CallBackURL'] = $this->getCallBackUrl();
        $data['Amount'] = $this->getAmount();
        $data['PartyA'] = $this->getPhoneNumber();
        $data['PartyB'] = $this->getShortCode();
        $data['PhoneNumber'] =  $this->getPhoneNumber();
        $data['AccountReference'] =  $this->getAccount();
        $data['TransactionDesc'] =  $this->getDescription();

        return $data;
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getAccount()
    {
        return $this->getParameter('account');
    }

    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    public function getPhoneNumber()
    {
        return $this->getParameter('phone_number');
    }

    public function setPhoneNumber($value)
    {
        return $this->setParameter('phone_number', $value);
    }

    public function getCallBackUrl()
    {
        return $this->getParameter('callbackUrl');
    }

    public function setCallBackUrl($value)
    {
        return $this->setParameter('callbackUrl', $value);
    }
    
    public function generatePassword($timesatamp)
    { 
        return  base64_encode($this->getShortCode().$this->getPassKey().$timesatamp);
    }  

     /**
     * Get transaction endpoint.
     *
     * Authorization of payments is done using the /payment resource.
     *
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint() . 'mpesa/stkpush/v1/processrequest';
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data, $statusCode);
    }

}
