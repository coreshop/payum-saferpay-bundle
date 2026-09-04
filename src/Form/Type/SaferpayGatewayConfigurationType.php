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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;

final class SaferpayGatewayConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('environment', ChoiceType::class, [
                'label' => 'coreshop_saferpay_environment',
                'choices' => [
                    'coreshop_saferpay_environment_test' => 'test',
                    'coreshop_saferpay_environment_production' => 'production',
                ],
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('sandbox', CheckboxType::class, [
                'label' => 'coreshop_saferpay_sandbox',
                'required' => false,
            ])
            ->add('username', TextType::class, [
                'label' => 'coreshop_saferpay_username',
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'coreshop_saferpay_password',
                'always_empty' => false,
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('customerId', TextType::class, [
                'label' => 'coreshop_saferpay_customer_id',
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('terminalId', TextType::class, [
                'label' => 'coreshop_saferpay_terminal_id',
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('interface', ChoiceType::class, [
                'label' => 'coreshop_saferpay_interface',
                'choices' => [
                    'coreshop_saferpay_interface_payment_page' => 'PAYMENT_PAGE',
                    'coreshop_saferpay_interface_transaction' => 'TRANSACTION',
                ],
                'constraints' => [
                    new NotBlank(groups: ['coreshop']),
                ],
            ])
            ->add('optionalParameters', SaferpayOptionalParametersType::class, [
                'label' => 'coreshop_saferpay_optional_parameters',
                'required' => false,
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, static function (FormEvent $event): void {
                $data = is_array($event->getData()) ? $event->getData() : [];
                $data['lockPath'] = sys_get_temp_dir();
                $event->setData($data);
            })
            ->addEventListener(FormEvents::PRE_SUBMIT, static function (FormEvent $event): void {
                $data = is_array($event->getData()) ? $event->getData() : [];
                // Saferpay's sandbox flag follows the chosen environment.
                $data['sandbox'] = ($data['environment'] ?? 'test') !== 'production';
                $event->setData($data);
            })
        ;
    }
}
