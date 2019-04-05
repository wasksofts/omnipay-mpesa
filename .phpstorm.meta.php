<?php

namespace PHPSTORM_META {

    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    /** @noinspection PhpUnusedLocalVariableInspection */
    $STATIC_METHOD_TYPES = [
      \Omnipay\Omnipay::create('') => [
        'Mpesa' instanceof \Omnipay\Mpesa\MpesaGateway,
      ],
      \Omnipay\Common\GatewayFactory::create('') => [
        'Mpesa' instanceof \Omnipay\Mpesa\MpesaGateway,
      ],
    ];
}
