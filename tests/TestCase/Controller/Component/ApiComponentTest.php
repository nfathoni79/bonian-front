<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ApiComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ApiComponent Test Case
 */
class ApiComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ApiComponent
     */
    public $Api;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Api = new ApiComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Api);

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
