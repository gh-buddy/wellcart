<?php

namespace WellCart\Catalog\Test\Unit\Repository;

use WellCart\Catalog\Repository\AttributeValueI18nQuery;

class AttributeValueI18nQueryTest extends \WellCart\Test\TestCase
{

    /**
     * @var AttributeValueI18nQuery
     */
    protected $object;

    /**
     * @todo   Implement testFilterByLanguage().
     */
    public function testFilterByLanguage()
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
        $this->object = new AttributeValueI18nQuery;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}
