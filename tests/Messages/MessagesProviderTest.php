<?php

namespace VirComTest\ePUAP2\Messages;

use VirCom\ePUAP2\Messages;

class MessagesProviderTest extends \PHPUnit_Framework_TestCase
{
    private $xmlWriterMock;
    
    public function setUp()
    {
        $this->xmlWriterMock = $this->getMock('\Sabre\Xml\Writer');
    }
    
    public function testGetLoginMessageIsInstanceOfLoginTemplate()
    {
        $loginRequestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Login')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        $provider = new Messages\MessagesProvider($this->xmlWriterMock);
        $this->assertInstanceOf('\VirCom\ePUAP2\Messages\Templates\Login', $provider->getLoginMessage($loginRequestMock));
    }
    
    public function testGetLogoutMessageIsInstanceOfLoginTemplate()
    {
        $logoutRequestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Logout')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        $provider = new Messages\MessagesProvider($this->xmlWriterMock);
        $this->assertInstanceOf('\VirCom\ePUAP2\Messages\Templates\Logout', $provider->getLogoutMessage($logoutRequestMock));
    }
}
