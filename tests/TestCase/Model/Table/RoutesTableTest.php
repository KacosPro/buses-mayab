<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutesTable Test Case
 */
class RoutesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutesTable
     */
    public $RoutesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.routes',
        'app.reservations',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Routes') ? [] : ['className' => 'App\Model\Table\RoutesTable'];
        $this->RoutesTable = TableRegistry::get('Routes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RoutesTable);

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
