<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

namespace WellCart\Catalog;

use WellCart\ModuleManager\Feature\DataFixturesProviderInterface;
use WellCart\ModuleManager\Feature\MigrationsProviderInterface;
use WellCart\ModuleManager\Feature\ModulePathProviderInterface;
use WellCart\ModuleManager\Feature\VersionProviderInterface;
use WellCart\Mvc\Application;
use WellCart\Utility\Arr;
use Zend\ModuleManager\Feature;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements
    Feature\ConfigProviderInterface,
    Feature\ServiceProviderInterface,
    Feature\FormElementProviderInterface,
    DataFixturesProviderInterface,
    MigrationsProviderInterface,
    ApigilityProviderInterface,
    VersionProviderInterface,
    ModulePathProviderInterface
{

    /**
     * Module version
     *
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * Retrieve module version
     *
     * @return string
     */
    final public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array
     */
    public function getConfig()
    {
        $config = include __DIR__ . '/../config/module.config.php';
        if (application_context(Application::CONTEXT_API)) {
            $config = Arr::merge(
                $config,
                include __DIR__ . '/../config/api.config.php'
            );
        }
        return $config;
    }

    /**
     * Retrieve array of migration classes
     *
     * @return \WellCart\SchemaMigration\AbstractMigration[]
     */
    public function getMigrations(): array
    {
        return [
            '20160707000000' => new Setup\Schema\Install(
                '20160707000000'
            ),
        ];
    }

    /**
     * Retrieve array of data fixture classes
     *
     * @return \Doctrine\Common\DataFixtures\OrderedFixtureInterface[]
     */
    public function getDataFixtures(): array
    {
        return [
            '20160707000000' => new Setup\Data\Install(
                '20160707000000'
            ),
        ];
    }

    /**
     * Form elements
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getFormElementConfig()
    {
        return [
            'factories' => [
                'catalogFeatureCombinationMultiCheckbox'       =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $options = $services->get(
                            'WellCart\Catalog\Spec\FeatureRepository'
                        )
                            ->toGroupedOptionsList();
                        return new \WellCart\Catalog\Form\Element\FeatureCombinationMultiCheckbox(
                            null,
                            [
                                'value_options'             => $options,
                                'disable_inarray_validator' => true,
                            ]
                        );
                    },

                'catalogCategorySelector'                      =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $categories = $services->get(
                            'WellCart\Catalog\Spec\CategoryRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\Select(
                            null,
                            [
                                'value_options'             => $categories,
                                'disable_inarray_validator' => true,
                            ]
                        );
                    },
                'catalogProductTemplateSelector'               =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $groups = $services->get(
                            'WellCart\Catalog\Spec\ProductTemplateRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\Select(
                            null,
                            ['value_options' => $groups]
                        );
                    },
                'catalogBrandSelector'                         =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $brands = $services->get(
                            'WellCart\Catalog\Spec\BrandRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\Select(
                            null,
                            [
                                'empty_option'              => '',
                                'value_options'             => $brands,
                                'disable_inarray_validator' => true,
                            ]
                        );
                    },
                'catalogAttributesMultiCheckboxSelector'       =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $values = $services->get(
                            'WellCart\Catalog\Spec\AttributeRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\MultiCheckbox(
                            null,
                            ['value_options' => $values]
                        );
                    },
                'catalogFeaturesMultiCheckboxSelector'         =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $values = $services->get(
                            'WellCart\Catalog\Spec\FeatureRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\MultiCheckbox(
                            null,
                            ['value_options' => $values]
                        );
                    },
                'catalogProductTemplatesMultiCheckboxSelector' =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $values = $services->get(
                            'WellCart\Catalog\Spec\ProductTemplateRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\MultiCheckbox(
                            null,
                            ['value_options' => $values]
                        );
                    },
                'catalogProductTemplatesSelector'              =>
                    function (\Zend\Form\FormElementManager\FormElementManagerV2Polyfill $sm
                    ) {
                        $services = $sm->getServiceLocator();
                        $values = $services->get(
                            'WellCart\Catalog\Spec\ProductTemplateRepository'
                        )
                            ->toOptionsList();
                        return new \WellCart\Form\Element\Select(
                            null,
                            ['value_options' => $values]
                        );
                    },
            ],
        ];
    }

    /**
     * Services
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/../config/services.php';
    }

    /**
     * Expected to return absolute path to module directory
     *
     * @return string
     */
    public function getAbsolutePath()
    {
        return str_replace('\\', DS, dirname(__DIR__)) . DS;
    }
}
