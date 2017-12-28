<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

namespace WellCart\Ui\Wizard\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use WellCart\Ui\Wizard\WizardFactory;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class WizardFactoryFactory implements FactoryInterface
{
  /**
   * @inheritDoc
   */
  public function __invoke(ContainerInterface $container, $requestedName,
    array $options = null
  ) {
    $config = $container->get('WellCart\Ui\Wizard\Config');

    $wizardFactory = new \WellCart\Ui\Wizard\WizardFactory($container, $config);

    $stepFactory = $container->get('WellCart\Ui\Wizard\Step\StepFactory');
    $wizardFactory->setStepFactory($stepFactory);

    return $wizardFactory;
  }
}
