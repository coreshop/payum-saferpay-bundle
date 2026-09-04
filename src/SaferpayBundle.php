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

use CoreShop\Bundle\EnterpriseSubscriptionBundle\CoreShopEnterpriseSubscriptionBundle;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Pimcore\HttpKernel\Bundle\DependentBundleInterface;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;

final class SaferpayBundle extends AbstractPimcoreBundle implements DependentBundleInterface, PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
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

    public static function registerDependentBundles(BundleCollection $collection): void
    {
        $collection->addBundle(new CoreShopEnterpriseSubscriptionBundle());
    }

    /**
     * The gateway configuration panel script is registered through
     * core_shop_payment.pimcore_admin.js (see Resources/config/pimcore/config.yml), which
     * loads it together with the other gateway panels of the classic admin.
     */
    public function getJsPaths(): array
    {
        return [];
    }
}
