<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Route;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Route Test Case
 */
class RouteTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Entity\Route
     */
    public $Route;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Route = new Route();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Route);

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
