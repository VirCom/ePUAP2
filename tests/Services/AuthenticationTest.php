<?php

namespace VirComTest\ePUAP2\Services;

use VirCom\ePUAP2\Services;

class AuthenticationTest extends \PHPUnit_Framework_TestCase
{
    
    private $messagesProviderMock;
    private $transformerMock;
    
    public function setUp()
    {
        $this->messagesProviderMock   = $this->getMockBuilder('\VirCom\ePUAP2\Messages\MessagesProviderInterface')
                                        ->setMethods([
                                            'getLoginMessage',
                                            'getLogoutMessage',
                                        ])
                                        ->getMock();
        
        $this->transformerMock   = $this->getMockBuilder('\VirCom\ePUAP2\Messages\Transformers\TransformerInterface')
                                        ->setMethods([
                                            'transform'
                                        ])
                                        ->getMock();
    }
    
    public function testAuthenticationServiceIsInstanceOfAuthenticationInterface()
    {   
        $dracoClient = new Services\Authentication(
            $this->messagesProviderMock,
            $this->transformerMock
        );
        
        $this->assertInstanceOf('\VirCom\ePUAP2\Services\AuthenticationInterface', $dracoClient);
    }
    
    public function testAuthenticationLoginGetMessageAndCallHttpRequest()
    {
        $loginRequestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Login')
                                        ->disableOriginalConstructor()
                                        ->getMock();
        
        $messageTemplate = $this->getMockBuilder('\VirCom\ePUAP2\Messages\Templates\Login')
                                        ->disableOriginalConstructor()
                                        ->setMethods(['__toString'])
                                        ->getMock();
        
        $this->messagesProviderMock
            ->expects($this->once())
            ->method('getLoginMessage')
            ->willReturn($messageTemplate);
        
        $this->transformerMock
            ->expects($this->once())
            ->method('transform');
        
        $authenticationService = new Services\Authentication(
            $this->messagesProviderMock,
            $this->transformerMock
        );
        $authenticationService->getLoginUrl($loginRequestMock);
    }
    
    public function testAuthenticationLogoutGetMessageAndCallHttpRequest()
    {
        $logoutRequestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Logout')
                                        ->disableOriginalConstructor()
                                        ->getMock();
        
        $messageTemplate = $this->getMockBuilder('\VirCom\ePUAP2\Messages\Templates\Logout')
                                        ->disableOriginalConstructor()
                                        ->setMethods(['__toString'])
                                        ->getMock();
        
        $this->messagesProviderMock
            ->expects($this->once())
            ->method('getLogoutMessage')
            ->willReturn($messageTemplate);
        
        $this->transformerMock
            ->expects($this->once())
            ->method('transform');
        
        $authenticationService = new Services\Authentication(
            $this->messagesProviderMock,
            $this->transformerMock
        );
        $authenticationService->getLogoutUrl($logoutRequestMock);
    }
}
