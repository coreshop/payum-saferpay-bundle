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

namespace CoreShop\Payum\SaferpayBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Optional Saferpay PaymentPage parameters, see
 * https://saferpay.github.io/jsonapi/index.html#Payment_v1_PaymentPage_Initialize
 */
final class SaferpayOptionalParametersType extends AbstractType
{
    public const FIELDS = [
        'payment_methods' => 'coreshop_saferpay_optional_payment_methods',
        'wallets' => 'coreshop_saferpay_optional_wallets',
        'notification_merchant_email' => 'coreshop_saferpay_optional_notification_merchant_email',
        'notification_payer_email' => 'coreshop_saferpay_optional_notification_payer_email',
        'styling_css_url' => 'coreshop_saferpay_optional_styling_css_url',
        'styling_content_security_enabled' => 'coreshop_saferpay_optional_styling_content_security_enabled',
        'styling_theme' => 'coreshop_saferpay_optional_styling_theme',
        'config_set' => 'coreshop_saferpay_optional_config_set',
        'payer_note' => 'coreshop_saferpay_optional_payer_note',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        foreach (self::FIELDS as $name => $label) {
            $builder->add($name, TextType::class, [
                'label' => $label,
                'required' => false,
                'empty_data' => '',
            ]);
        }
    }
}
