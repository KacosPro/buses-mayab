<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.reservations',
        'app.routes'
    ];

    public function testAdd()
    {
        $this->get('/users/add');

        $this->assertResponseOk();

        $data = [
        'id' => '230a5222-52b7-41f3-9542-b8e326490dfb',
        'username' => 'ken.kitchen',
        'password' => 'qwerty',
        'confirmPassword' => 'qwerty',
        'name' => 'name',
        'lastname' => 'lastname',
        'email' => 'c@b.com',
        'created' => time(),
        'modified' => time()
        ];
        $this->post('/users/add', $data);

        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['username' => $data['username']]);
        $this->assertEquals(1, $query->count());
    }

    public function testEdit()
    {
        $this->get('/users/edit/130a5222-52b7-41f3-9542-b8e326490dfb');

        $newData = [
        'id' => '130a5222-52b7-41f3-9542-b8e326490dfb',
        'username' => 'ken.kitchen',
        'password' => 'asdfg',
        'confirmPassword' => 'asdfg',
        'name' => 'name',
        'lastname' => 'lastname',
        'email' => 'a@b.com',
        'created' => time(),
        'modified' => time()
        ];
        $this->post('/users/edit/130a5222-52b7-41f3-9542-b8e326490dfb', $newData);

        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['username' => $newData['username']]);
        $this->assertEquals(1, $query->count());
    }

    public function testAddWithDifferentPassword()
    {
        $this->get('/users/add');

        $this->assertResponseOk();

        $data = [
        'id' => '133a5222-52b7-41f3-9542-b8e326490dfb',
        'username' => 'perezcarlos192',
        'password' => 'pollo19',
        'confirmPassword' => 'pollo199',
        'name' => 'Carlos',
        'lastname' => 'Perez',
        'email' => 'nasserperez192@gmail.com',
        'created' => time(),
        'modified' => time()
        ];
        $this->post('/users/add', $data);

        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['username' => $data['username']]);
        $this->assertEquals(0, $query->count());
    }

    public function testSameMail()
    {
        $this->get('/users/add');

        $this->assertResponseOk();

        $data = [
        'id' => '130a5222-52b7-41f3-9542-b8e326490dfb',
        'username' => 'ken.kitchen',
        'password' => 'qwerty',
        'confirmPassword' => 'qwerty',
        'name' => 'name',
        'lastname' => 'lastname',
        'email' => 'a@b.com',
        'created' => time(),
        'modified' => time()
        ];
        $this->post('/users/add', $data);

        $this->assertResponseSuccess();

        $this->get('/users/add');

        $sameData = [
        'id' => '220b5222-52b7-41f3-9782-b8e326g57dnh',
        'username' => 'chucho',
        'password' => 'asdfg',
        'confirmPassword' => 'asdfg',
        'name' => 'name',
        'lastname' => 'lastname',
        'email' => 'a@b.com',
        'created' => time(),
        'modified' => time()
        ];
        $this->post('/users/add', $sameData);

        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['username' => $sameData['username']]);
        $this->assertEquals(0, $query->count());
    }
}
