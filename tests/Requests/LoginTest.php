<?php

namespace VirComTest\ePUAP2\Requests;

use VirCom\ePUAP2\Requests;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VirCom\ePUAP2\Requests\Login 
     */
    private $request;
    
    public function setUp()
    {
        $this->request = new Requests\Login(
            'https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf',
            'http://vircom.pl',
            12345
        );
    }
    
    public function testIsValidUrl()
    {
        $this->assertEquals('https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf', $this->request->getUrl());
    }
    
    public function testIsValidResponseUrl()
    {
        $this->assertEquals('http://vircom.pl', $this->request->getResponseUrl());
    }
    
    public function testIsValidApplicationId()
    {
        $this->assertEquals(12345, $this->request->getApplicationId());
    }
    
}
