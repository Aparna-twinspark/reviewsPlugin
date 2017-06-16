<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Table\VendorReviewsTable;

/**
 * Integrateideas\Reviews\Model\Table\VendorReviewsTable Test Case
 */
class VendorReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Table\VendorReviewsTable
     */
    public $VendorReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.integrateideas/reviews.vendor_reviews',
        'plugin.integrateideas/reviews.review_types',
        'plugin.integrateideas/reviews.review_settings',
        'plugin.integrateideas/reviews.vendors',
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
        $config = TableRegistry::exists('VendorReviews') ? [] : ['className' => VendorReviewsTable::class];
        $this->VendorReviews = TableRegistry::get('VendorReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VendorReviews);

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
