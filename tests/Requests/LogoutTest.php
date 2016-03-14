<?php

namespace VirComTest\ePUAP2\Requests;

use VirCom\ePUAP2\Requests;

class LogoutTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VirCom\ePUAP2\Requests\Logout 
     */
    private $request;
    
    public function setUp()
    {
        $this->request = new Requests\Logout(
            'https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf',
            'vircom',
            12345
        );
    }
    
    public function testIsValidUrl()
    {
        $this->assertEquals('https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf', $this->request->getUrl());
    }
    
    public function testIsValidUsername()
    {
        $this->assertEquals('vircom', $this->request->getUsername());
    }
    
    public function testIsValidApplicationId()
    {
        $this->assertEquals(12345, $this->request->getApplicationId());
    }
    
}
