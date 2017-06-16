<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Table\BusinessReviewsTable;

/**
 * Integrateideas\Reviews\Model\Table\BusinessReviewsTable Test Case
 */
class BusinessReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Table\BusinessReviewsTable
     */
    public $BusinessReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.integrateideas/reviews.business_reviews',
        'plugin.integrateideas/reviews.businesses',
        'plugin.integrateideas/reviews.review_types',
        'plugin.integrateideas/reviews.review_settings',
        'plugin.integrateideas/reviews.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusinessReviews') ? [] : ['className' => BusinessReviewsTable::class];
        $this->BusinessReviews = TableRegistry::get('BusinessReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessReviews);

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
