<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace WellCart\Setup\Feature;

interface DataFixturesProviderInterface
{
    /**
     * Retrieve array of data fixture classes
     *
     * @return \Doctrine\Common\DataFixtures\OrderedFixtureInterface[]
     */
    public function getSetupDataFixtures(): array;

}