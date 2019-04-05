# omnipay-lipa-na-mpesa
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


[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements omnipay-lipa-na-mpesa support for Omnipay.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Instal the gateway using require. Require the `league/omnipay` base package and this gateway.

``` bash
$ composer require league/omnipay wasksofts/omnipay-lipa-na-mpesa
```

## Usage

The following gateways are provided by this package:

 * omnipay-lipa-na-mpesa

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/:vendor/omnipay-lipa-na-mpesa/issues),
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

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [:author_name](https://github.com/wasksofts)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
