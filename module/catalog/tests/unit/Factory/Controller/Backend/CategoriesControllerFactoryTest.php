<?php

namespace WellCart\Catalog\Test\Unit\Factory\Controller\Backend;


use WellCart\Catalog\Factory\Controller\Backend\CategoriesControllerFactory;

class CategoriesControllerFactoryTest extends \WellCart\Test\TestCase
{

    /**
     * @var CategoriesControllerFactory
     */
    protected $object;

    /**
     * @todo   Implement test__invoke().
     */
    public function test__invoke()
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
        $this->object = new CategoriesControllerFactory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}