<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Table\ReviewTypesTable;

/**
 * Integrateideas\Reviews\Model\Table\ReviewTypesTable Test Case
 */
class ReviewTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Table\ReviewTypesTable
     */
    public $ReviewTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.integrateideas/reviews.review_types',
        'plugin.integrateideas/reviews.review_settings',
        'plugin.integrateideas/reviews.vendor_reviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReviewTypes') ? [] : ['className' => ReviewTypesTable::class];
        $this->ReviewTypes = TableRegistry::get('ReviewTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReviewTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
