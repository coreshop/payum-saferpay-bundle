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

namespace CoreShop\Payum\SaferpayBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

final class SaferpayBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    public function getNiceName(): string
    {
        return 'CoreShop - Payum Saferpay';
    }

    public function getDescription(): string
    {
        return 'Saferpay payment gateway for CoreShop';
    }

    protected function getComposerPackageName(): string
    {
        return 'coreshop/payum-saferpay-bundle';
    }
}
