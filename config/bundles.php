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
    Pimcore\Bundle\OpenSearchClientBundle\PimcoreOpenSearchClientBundle::class => ['all' => true],
    Pimcore\Bundle\GenericDataIndexBundle\PimcoreGenericDataIndexBundle::class => ['all' => true],
    Pimcore\Bundle\GenericExecutionEngineBundle\PimcoreGenericExecutionEngineBundle::class => ['all' => true],
    Pimcore\Bundle\StaticResolverBundle\PimcoreStaticResolverBundle::class => ['all' => true],
    Pimcore\Bundle\StudioBackendBundle\PimcoreStudioBackendBundle::class => ['all' => true],
    Pimcore\Bundle\StudioUiBundle\PimcoreStudioUiBundle::class => ['all' => true],
    Pimcore\Bundle\ApplicationLoggerBundle\PimcoreApplicationLoggerBundle::class => ['all' => true],
    \CoreShop\Bundle\CoreBundle\CoreShopCoreBundle::class => ['all' => true],
    \CoreShop\Payum\SaferpayBundle\SaferpayBundle::class => ['all' => true],
    \CoreShop\Bundle\FrontendBundle\CoreShopFrontendBundle::class => ['all' => true],
];
