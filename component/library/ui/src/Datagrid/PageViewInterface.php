<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */
declare(strict_types = 1);
namespace WellCart\Ui\Datagrid;

interface PageViewInterface extends
    \WellCart\Ui\Container\PageViewInterface
{
    public function getUiConfigKey();
    public function setUiConfigKey(string $uiConfigKey);
}