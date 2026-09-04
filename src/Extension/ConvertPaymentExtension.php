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

namespace CoreShop\Payum\SaferpayBundle\Extension;

use CoreShop\Component\Core\Model\PaymentInterface;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Extension\Context;
use Payum\Core\Extension\ExtensionInterface;
use Payum\Core\Request\Convert;

/**
 * Passes the order language to Saferpay as Payer.LanguageCode after the payment has been
 * converted into the gateway request.
 */
final class ConvertPaymentExtension implements ExtensionInterface
{
    public function onPreExecute(Context $context): void
    {
    }

    public function onExecute(Context $context): void
    {
    }

    public function onPostExecute(Context $context): void
    {
        $action = $context->getAction();

        if (false === stripos($action::class, 'ConvertPaymentAction')) {
            return;
        }

        $request = $context->getRequest();

        if (!$request instanceof Convert) {
            return;
        }

        $payment = $request->getSource();

        if (!$payment instanceof PaymentInterface) {
            return;
        }

        $order = $payment->getOrder();
        $gatewayLanguage = 'en';

        if (null !== $order && !empty($order->getLocaleCode())) {
            $gatewayLanguage = explode('_', $order->getLocaleCode())[0];
        }

        $result = ArrayObject::ensureArrayObject($request->getResult());

        $payerData = is_array($result['Payer'] ?? null) ? $result['Payer'] : [];
        $payerData['LanguageCode'] = $gatewayLanguage;
        $result['Payer'] = $payerData;

        $request->setResult((array) $result);
    }
}
