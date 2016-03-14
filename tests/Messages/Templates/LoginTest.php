<?php

namespace VirComTest\ePUAP2\Draco\Messages\Templates;

use VirCom\ePUAP2\Messages\Templates;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    
    private $requestMock;
    private $xmlWriterMock;
    
    private $templateContent = <<<EOT
<samlp:AuthnRequest 
	xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol" 
	ID="_e68ca0e50e0ca2d93758" Version="2.0" 
	IssueInstant="2016-01-30T07:58:31Z" 
	Destination="https://vircom.pl" 
	IsPassive="false" 
	AssertionConsumerServiceURL="http://vircom.pl">
	<saml:Issuer xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion">
		12345
	</saml:Issuer>
</samlp:AuthnRequest>
EOT;
    
    public function setUp()
    {
        $this->requestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Login')
                                    ->disableOriginalConstructor()
                                    ->setMethods(['outputMemory'])
                                    ->getMock();
        
        $this->xmlWriterMock = $this->getMock('\Sabre\Xml\Writer');
    }
    
    public function testIsConstructorCreateTemplate()
    {
        $this->xmlWriterMock
            ->expects($this->exactly(1))
            ->method('outputMemory');
        
        new Templates\Login(
            $this->requestMock,
            $this->xmlWriterMock
        );
    }
    
    public function testIsToStringReturnCorrectTemplate()
    {
        $this->xmlWriterMock
            ->expects($this->exactly(1))
            ->method('outputMemory')
            ->willReturn($this->templateContent);
        
        /** @var $authenticate \VirCom\ePUAP2\Messages\Templates\Authenticate */
        $template = new Templates\Login(
            $this->requestMock,
            $this->xmlWriterMock
        );
        
        $this->assertEquals($this->templateContent, $template->__toString());
    }
    
}
