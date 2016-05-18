<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Reservation;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Reservation Test Case
 */
class ReservationTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Entity\Reservation
     */
    public $Reservation;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Reservation = new Reservation();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reservation);

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
