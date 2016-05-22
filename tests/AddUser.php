<?php
class AddUser extends PHPUnit_Extensions_Selenium2TestCase
{

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost:8765/users/add');
    }


    public function testRedirect()
    {
        $this->url('http://localhost:8765/users/add');
        $forma = $this->byId('userform');
        $enviar = $this->byId('userform')->attribute('action');
        $this->assertEquals('http://localhost:8765/users/add', $enviar);
    }
    
    /*LISTO
    public function testAddUser()
    {
        $this->url( 'http://localhost:8765/users/add' );
        $forma = $this->byId( 'userform' );
        $this->byName( 'username' )->value( 'chu' );
        $this->byName( 'password' )->value( 'ecuador' );
        $this->byName( 'confirmPassword' )->value( 'ecuador' );
        $this->byName( 'name' )->value( 'carlos' );
        $this->byName( 'lastname' )->value( 'Proaño' );
        $this->byName( 'email' )->value( 'chu@grr.la' );
        $forma->submit();
        $resultado = $this->byId('success')->text();
        $this->assertEquals( "Success!", $resultado );
    }*/

    public function testDuplicateUsername()
    {
        $this->url('http://localhost:8765/users/add');
        $forma = $this->byId('userform');
        $this->byName('username')->value('kacos');
        $this->byName('password')->value('ecuador');
        $this->byName('confirmPassword')->value('ecuador');
        $this->byName('name')->value('carlos');
        $this->byName('lastname')->value('Proaño');
        $this->byName('email')->value('kacos@grr.com');
        $forma->submit();
        $resultado = $this->byId('error')->text();
        $this->assertEquals("Error!", $resultado);
    }
    
    public function testDuplicateMail()
    {
        $this->url('http://localhost:8765/users/add');
        $forma = $this->byId('userform');
        $this->byName('username')->value('kacospro');
        $this->byName('password')->value('ecuador');
        $this->byName('confirmPassword')->value('ecuador');
        $this->byName('name')->value('carlos');
        $this->byName('lastname')->value('Proaño');
        $this->byName('email')->value('kacos@grr.la');
        $forma->submit();
        $resultado = $this->byId('error')->text();
        $this->assertEquals("Error!", $resultado);
    }

    public function testDiffPw()
    {
        $this->url('http://localhost:8765/users/add');
        $forma = $this->byId('userform');
        $this->byName('username')->value('chucho');
        $this->byName('password')->value('mex');
        $this->byName('confirmPassword')->value('mexico');
        $this->byName('name')->value('Jesus');
        $this->byName('lastname')->value('Marin');
        $this->byName('email')->value('chucho@grr.la');
        $forma->submit();
        $resultado = $this->byId('error')->text();
        $this->assertEquals("Error!", $resultado);
    }
}
