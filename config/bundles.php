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

return [
    Pimcore\Bundle\GenericExecutionEngineBundle\PimcoreGenericExecutionEngineBundle::class => ['dev' => true],
    Pimcore\Bundle\AdminBundle\PimcoreAdminBundle::class => ['all' => true],
    Pimcore\Bundle\OpenSearchClientBundle\PimcoreOpenSearchClientBundle::class => ['dev' => true],
    Pimcore\Bundle\GenericDataIndexBundle\PimcoreGenericDataIndexBundle::class => ['dev' => true],
    Pimcore\Bundle\StaticResolverBundle\PimcoreStaticResolverBundle::class => ['dev' => true],
    Pimcore\Bundle\StudioBackendBundle\PimcoreStudioBackendBundle::class => ['dev' => true],
    Pimcore\Bundle\StudioUiBundle\PimcoreStudioUiBundle::class => ['dev' => true],
    \CoreShop\Bundle\CoreBundle\CoreShopCoreBundle::class => ['all' => true],
    \CoreShop\Payum\SaferpayBundle\SaferpayBundle::class => ['all' => true],
    \CoreShop\Bundle\FrontendBundle\CoreShopFrontendBundle::class => ['all' => true],
];
