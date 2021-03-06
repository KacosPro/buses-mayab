<?php
class TestSale extends PHPUnit_Extensions_Selenium2TestCase
{

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost:8765');
    }

    public function testDiffPw()
    {
        $this->url('http://localhost:8765');
        $forma = $this->byId('form');
        $this->select($this->byName('sourceRoute'))->selectOptionByValue('Mérida');
        $this->select($this->byName('destinationRoute'))->selectOptionByValue('Campeche');
        $this->byName('date')->value('2016-05-16');
        $forma->submit();
        $resultado = $this->byId('routes')->text();
        $this->assertEquals('Rutas disponibles', $resultado);
    }
}
