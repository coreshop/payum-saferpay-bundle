<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under the terms of the
 * CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.com)
 * @license    CoreShop Commercial License (CCL)
 *
 */

namespace CoreShop\Payum\SaferpayBundle\Event;

use CoreShop\Component\Payment\Model\PaymentInterface;
use CoreShop\Component\PayumPayment\Model\GatewayConfig;
use CoreShop\Component\PayumPayment\Model\PaymentProviderInterface;
use Payum\Core\Payum;
use Payum\Core\Request\Refund;

/**
 * Executes a Saferpay refund when a payment transitions through the "refund" transition of
 * the coreshop_payment state machine (wired in Resources/config/pimcore/config.yml).
 */
final class RefundEvent
{
    public function __construct(
        private readonly Payum $payum,
    ) {
    }

    public function refund(PaymentInterface $payment): void
    {
        $paymentProvider = $payment->getPaymentProvider();

        if (!$paymentProvider instanceof PaymentProviderInterface) {
            return;
        }

        $gatewayConfig = $paymentProvider->getGatewayConfig();

        if (!$gatewayConfig instanceof GatewayConfig) {
            return;
        }

        $this->payum->getGateway($gatewayConfig->getGatewayName())->execute(new Refund($payment));
    }
}
