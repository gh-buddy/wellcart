<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2016 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace WellCart\Theme\BackendUi;

use PHPUnit_Framework_TestCase as TestCase;
use WellCart\ModuleManager\ModuleConfiguration;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    private $object;

    public function setUp()
    {
        $this->object = new Module();
    }

    public function testGetVersion()
    {
        $this->assertEquals(Module::VERSION, $this->object->getVersion());
    }

    public function testGetConfig()
    {
        $this->assertInstanceOf(ModuleConfiguration::class, $this->object->getConfig());
    }


    public function testGetAbsolutePath()
    {
        $this->assertTrue(is_dir($this->object->getAbsolutePath()));
    }

    public function testGetBlockConfig()
    {
        $this->assertInternalType('array', $this->object->getBlockConfig());
    }
}
