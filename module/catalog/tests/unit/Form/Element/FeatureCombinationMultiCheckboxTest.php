<?php
namespace WellCart\Catalog\Test\Unit\Form\Element;

use WellCart\Catalog\Form\Element\FeatureCombinationMultiCheckbox;

class FeatureCombinationMultiCheckboxTest extends \WellCart\Test\TestCase
{
    /**
     * @var FeatureCombinationMultiCheckbox
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
      parent::setUp();
        $this->object = new FeatureCombinationMultiCheckbox;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @todo   Implement testSetValue().
     */
    public function testSetValue()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
