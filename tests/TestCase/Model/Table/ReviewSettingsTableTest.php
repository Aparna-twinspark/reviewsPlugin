<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Table\ReviewSettingsTable;

/**
 * Integrateideas\Reviews\Model\Table\ReviewSettingsTable Test Case
 */
class ReviewSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Table\ReviewSettingsTable
     */
    public $ReviewSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.integrateideas/reviews.review_settings',
        'plugin.integrateideas/reviews.review_types',
        'plugin.integrateideas/reviews.vendor_reviews',
        'plugin.integrateideas/reviews.users',
        'plugin.integrateideas/reviews.vendors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReviewSettings') ? [] : ['className' => ReviewSettingsTable::class];
        $this->ReviewSettings = TableRegistry::get('ReviewSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReviewSettings);

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
