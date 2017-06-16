<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Table\ReviewRequestsTable;

/**
 * Integrateideas\Reviews\Model\Table\ReviewRequestsTable Test Case
 */
class ReviewRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Table\ReviewRequestsTable
     */
    public $ReviewRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.integrateideas/reviews.review_requests',
        'plugin.integrateideas/reviews.users',
        'plugin.integrateideas/reviews.customers',
        'plugin.integrateideas/reviews.businesses',
        'plugin.integrateideas/reviews.business_reviews',
        'plugin.integrateideas/reviews.review_types',
        'plugin.integrateideas/reviews.review_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReviewRequests') ? [] : ['className' => ReviewRequestsTable::class];
        $this->ReviewRequests = TableRegistry::get('ReviewRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReviewRequests);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
