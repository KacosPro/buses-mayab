<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReservationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReservationsController Test Case
 */
class ReservationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservations',
        'app.users',
        'app.routes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
    }
}
