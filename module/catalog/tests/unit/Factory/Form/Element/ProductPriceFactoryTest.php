<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */
declare(strict_types=1);

namespace WellCart\Catalog\Test\Unit\Factory\Form\Element;


use WellCart\Catalog\Factory\Form\Element\ProductPriceFactory;

class ProductPriceFactoryTest extends \WellCart\Test\TestCase
{

    /**
     * @var ProductPriceFactory
     */
    protected $object;

    /**
     * @todo   Implement testInvoke().
     */
    public function testInvoke()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->object = new ProductPriceFactory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
