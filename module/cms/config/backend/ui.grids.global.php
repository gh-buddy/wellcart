<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

use WellCart\CMS\PageView;

$grids = [
    PageView\Backend\PagesGrid::NAME => [],
];
return [
    'ui' => [
        'component' => [
            'gird' => $grids,
        ],
    ],
];
