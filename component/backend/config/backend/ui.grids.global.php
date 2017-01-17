<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

use WellCart\Backend\PageView;

$grids = [
    PageView\Backend\AccountsGrid::NAME => [],
    PageView\Backend\NotificationsGrid::NAME => [],
];
return [
    'ui' => [
        'component' => [
            'gird' => $grids,
        ],
    ],
];