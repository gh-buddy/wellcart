<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace WellCart\Setup;

return [
    /**
     * =========================================================
     * Service manager configuration
     * =========================================================
     */
    'service_manager'      => [
        'invokables'         => [
            'WellCart\Setup\ItemView\HtmlHead' => 'WellCart\Setup\ItemView\HtmlHead',
            'WellCart\Setup\ItemView\Header'   => 'WellCart\Setup\ItemView\Header',
        ],
        'factories'          => [],
        'abstract_factories' => [],
        'aliases'            => [
            'wellcart_setup_service' => 'WellCart\Setup\Service\Setup',
        ],
        'services'           => [],
        'initializers'       => [],
        'shared'             => [
            'WellCart\Setup\ItemView\HtmlHead' => false,
            'WellCart\Setup\ItemView\Header'   => false,
        ],
    ],

    'wellcart'             => [
        'website' => [
            'name' => 'WellCart',
        ],
    ],
    'php_settings'         => [
        'log_errors'             => true,
        'display_errors'         => true,
        'display_startup_errors' => true,
        'short_open_tag'         => true,
        'memory_limit'           => '512M',
        'max_execution_time'     => 0,
        'error_log'              => sys_get_temp_dir()
            . '/wellcart-setup-php-error.log',
    ],
    'acmailer_options'     => [
        'communications' => [
            'enabled' => false,
        ],
    ],
    'user_account_options' => [
        'registration' => [
            'send_welcome_email' => false,
            'confirm_email'      => false,
        ],
    ],
    /**
     * Session configuration
     */
    'session'              => [
        'config'     => [
            'options' => [
                'name'           => 'wellcart_setup_sid',
                'gc_probability' => 1,
            ],
        ],
        'storage'    => 'Zend\Session\Storage\SessionArrayStorage',
        'validators' => [
            [
                'Zend\Session\Validator\RemoteAddr',
                'Zend\Session\Validator\HttpUserAgent',
            ],
        ],
    ],
    'soflomo_log'          => [
        'writers' => [
            'WellCart\Log\Writer\Stream' => [
                'enabled' => false,
            ],
        ],
    ],

    /**
     * =========================================================
     * Router configuration
     * =========================================================
     */
    'router'               => [
        'routes' => [
            'wellcart:setup:install' => [
                'type'             => 'WellCart\Router\Http\Literal',
                'javascript_route' => true,
                'priority'         => -500,
                'options'          => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'WellCart\Setup\Controller\Wizard',
                        'action'     => 'process',
                    ],
                ],
            ],
        ],
    ],
    'controllers'          => [
        'invokables' => [
            'WellCart\Setup\Controller\Wizard'       => 'WellCart\Setup\Controller\WizardController',
            'WellCart\Setup\Controller\ConsoleSetup' => 'WellCart\Setup\Controller\ConsoleSetupController',
        ],
    ],
    /**
     * =========================================================
     * Static assets configuration
     * =========================================================
     */
    'asset_manager'        => [
        'resolver_configs' => [
            'paths' => [
                __DIR__ => __DIR__ . '/../public/',
            ],
        ],
    ],

    /**
     * =========================================================
     * Translator configuration
     * =========================================================
     */
    'translator'           => [
        'translation_file_patterns' => [
            __FILE__ => [
                'text_domain' => 'default',
                'type'        => 'gettext',
                'base_dir'    => __DIR__ . '/../language',
                'pattern'     => '%s.mo',
            ],
        ],
    ],

    /**
     * =========================================================
     * View manager configuration
     * =========================================================
     */
    'view_manager'         => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'layout'                   => 'layout/setup-wizard',
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
        'template_map'             => include 'template_map.php',
    ],
    'ze_theme'             => [
        'default_theme' => 'wellcart-setup-ui',
        'routes'        => [],
    ],
    'wizard'               => [
        /**
         * Default layout template of the wizard
         */
        'default_layout_template' => 'wellcart-setup/step',
        'wizards'                 => [
            'wellcart:setup' => [
                'redirect_url' => '/',
                'steps'        => [
                    'WellCart\Setup\Wizard\Step\License'         => [
                        'title'         => 'License Agreement',
                        'view_template' => 'wellcart-setup/step/license',
                    ],
                    'WellCart\Setup\Wizard\Step\Requirements'    => [
                        'title'         => 'System Requirements',
                        'view_template' => 'wellcart-setup/step/requirements',
                    ],
                    'WellCart\Setup\Wizard\Step\DbConfiguration' => [
                        'title'         => 'Configuration',
                        'view_template' => 'wellcart-setup/step/db-configuration',
                    ],
                    'WellCart\Setup\Wizard\Step\AdminUser'       => [
                        'title'         => 'Admin User',
                        'view_template' => 'wellcart-setup/step/admin-user',
                    ],
                    'WellCart\Setup\Wizard\Step\Complete'        => [
                        'title'         => 'Complete',
                        'view_template' => 'wellcart-setup/step/complete',
                    ],
                ],
            ],
        ],
    ],
    'wizard_steps'         => [
        'invokables' => [
            'WellCart\Setup\Wizard\Step\LicenseStepForm' => 'WellCart\Setup\Wizard\Step\LicenseStepForm',
        ],
    ],
    'console'              => [
        /**
         * =========================================================
         * Router configuration
         * =========================================================
         */
        'router' => [
            'routes' => [
                'wellcart::setup'               => [
                    'options' => [
                        'route'    => 'wellcart:setup [--db-driver=<db-driver>] [--db-host=<db-host>] [--db-port=<db-port>] --db-name=<db-name> --db-username=<db-username> [--db-password=<db-password>] --admin-email=<admin-email> --admin-password=<admin-password> --admin-first-name=<admin-first-name> --admin-last-name=<admin-last-name> --base-path=<base-path> [--website-name=<website-name>]',
                        'defaults' => [
                            'controller'  => 'WellCart\Setup\Controller\ConsoleSetup',
                            'action'      => 'handle',
                            'db-driver'   => 'pdo_mysql',
                            'db-port'     => 3306,
                            'db-host'     => 'localhost',
                            'db-name'     => 'wellcart',
                            'db-username' => 'root',
                        ]
                    ]
                ],
                'wellcart:setup:upgrade'        => [
                    'options' => [
                        'route'    => 'wellcart:setup:upgrade',
                        'defaults' => [
                            'controller' => 'WellCart\Setup\Controller\ConsoleSetup',
                            'action'     => 'upgrade',
                        ]
                    ]
                ],
                'wellcart:setup:publish-assets' => [
                    'options' => [
                        'route'    => 'wellcart:setup:publish-assets',
                        'defaults' => [
                            'controller' => 'WellCart\Setup\Controller\ConsoleSetup',
                            'action'     => 'publish-assets',
                        ]
                    ]
                ],
            ]
        ]
    ],
];
