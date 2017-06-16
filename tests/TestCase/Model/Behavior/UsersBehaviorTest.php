<?php
namespace Integrateideas\Reviews\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Integrateideas\Reviews\Model\Behavior\UsersBehavior;

/**
 * Integrateideas\Reviews\Model\Behavior\UsersBehavior Test Case
 */
class UsersBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Integrateideas\Reviews\Model\Behavior\UsersBehavior
     */
    public $Users;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Users = new UsersBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
