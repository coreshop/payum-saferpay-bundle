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

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;

return static function (\Symplify\EasyCodingStandard\Config\ECSConfig $ecsConfig): void {
    $ecsConfig->import('vendor/coreshop/test-setup/ecs.php');

    $ecsConfig->parallel();
    $ecsConfig->paths(['src']);

    // coreshop/test-setup still ships the pre-5.0 dual-license (GPLv3 / CCL) header.
    // CoreShop is CCL-only since 5.0, so the header is overridden here with the
    // text used by coreshop/core-shop.
    $header = <<<EOT
CoreShop

This source file is available under the terms of the
CoreShop Commercial License (CCL)
Full copyright and license information is available in
LICENSE.md which is distributed with this source code.

@copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.com)
@license    CoreShop Commercial License (CCL)

EOT;

    $ecsConfig->ruleWithConfiguration(HeaderCommentFixer::class, ['header' => $header]);
};
