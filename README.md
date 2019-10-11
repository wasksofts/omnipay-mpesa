# omnipay-mpesa

The Lipa na MPesa (LNM) API is an API designed to utilize the new feature introduced by Safaricom known as STK Push. 
This feature allows the transaction initiation to be moved from the paying customer's side to the payee Organization's side. 
This eliminates the challenge of having to remember business paybill numbers and account numbers and allows customers to simply 
confirm the transaction by entering their MPesa PIN on their mobile phone. 
This is done via the STK push/Pop-up which appears on a customer's phone that prompts them to enter their PIN. 
For the business, this API enables them to preset all the correct info in the payment request and 
reduce chances of wrong payments being performed to their systems. 
It is a C2B transaction, but with the initiator being the organization instead of the customer. 
Since the organization has the option of presetting all required variables in the request before sending the request,
this API has no Validation-Confirmation process like the previous C2B API.

## TL;DR
Just want to see some code? 

      use Omnipay\Omnipay;
      use Omnipay\Mpesa;

      $gateway = Omnipay::create('Mpesa');
      $gateway->setShortCode('174379');
      $gateway->setConsumerKey('');
      $gateway->setConsumerSecret('');
      $gateway->setPassKey('');
      $gateway->setTestMode('sandbox'); 

          $purchase = $gateway->purchase(array(
             'amount' => '100',
             'phone_number' => '254708374149',
             'account' => 'apitest',
             'description' => 'This is a purchase',
             'callbackUrl' => 'https://example.com/callback_url.php',
           ));
           
           
           if ($response->isSuccessful()) {
                 echo "Input your pin to purchase!";

           }else{
               // Payment failed
               return $response->getMessage();
          } 

          $data = $response->getData();
          echo '<pre>';print_r($data);echo '</pre>';

##  Your callback url should have this:
    /**
     * Use this to process the STK push request callback
     */
        $callbackJSONData=file_get_contents('php://input');
        $callbackData=json_decode($callbackJSONData);

        $result=[
            "resultDesc"=>$callbackData->Body->stkCallback->ResultDesc,
            "resultCode"=>$callbackData->Body->stkCallback->ResultCode,
            "merchantRequestID"=>$callbackData->Body->stkCallback->MerchantRequestID,
            "checkoutRequestID"=>$callbackData->Body->stkCallback->CheckoutRequestID,
            "amount"=>$callbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value,
            "mpesaReceiptNumber"=>$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value,
            "transactionDate"=>$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value,
            "phoneNumber"=>$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value
        ];

        return json_encode($result);
    //you can save json_data on database
    
[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements omnipay-lipa-na-mpesa support for Omnipay.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Instal the gateway using require. Require the `league/omnipay` base package and this gateway.

``` bash
$ composer require league/omnipay wasksofts/omnipay-mpesa -
```

## Usage

The following gateways are provided by this package:

 * omnipay-mpesa

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/:vendor/omnipay-mpesa/issues),
or better yet, fork the library and submit a pull request.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mukamanusteven@gmail.com instead of using the issue tracker.

## Credits

- [wasksofts](https://github.com/wasksofts)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

 ## Donate
 
   [![](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BCPJC49Z4ZBLG)
