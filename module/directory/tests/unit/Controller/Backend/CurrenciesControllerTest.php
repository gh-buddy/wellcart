<?php

namespace WellCart\Directory\Test\Unit\Controller\Backend;

use WellCart\Directory\Controller\Backend\CurrenciesController;
use WellCart\Directory\Repository\Currencies;

class CurrenciesControllerTest extends \WellCart\Test\TestCase
{

    /**
     * @var CurrenciesController
     */
    protected $object;

    /**
     * @todo   Implement testListAction().
     */
    public function testListAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testCreateAction().
     */
    public function testCreateAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testHandleForm().
     */
    public function testHandleForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testUpdateAction().
     */
    public function testUpdateAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testDeleteAction().
     */
    public function testDeleteAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testGroupActionHandlerAction().
     */
    public function testGroupActionHandlerAction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testAttemptToPersistEntity().
     */
    public function testAttemptToPersistEntity()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testAttemptToDeleteEntity().
     */
    public function testAttemptToDeleteEntity()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo   Implement testAttemptToPerformGroupAction().
     */
    public function testAttemptToPerformGroupAction()
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
        $this->object = new CurrenciesController($this->get(Currencies::class));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
