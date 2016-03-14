<?php

namespace VirComTest\ePUAP2\Draco\Messages\Templates;

use VirCom\ePUAP2\Messages\Templates;

class LogoutTest extends \PHPUnit_Framework_TestCase
{
    
    private $requestMock;
    private $xmlWriterMock;
    
    private $templateContent = <<<EOT
<samlp:LogoutRequest
	xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol"
	xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion"
	Version="2.0"
	IssueInstant="2016-02-19T18:03:14.647000Z"
	ID="_1ea91197-f497-47b9-aada-e420a3d070bd">
	<saml:Issuer>
		12345
	</saml:Issuer>
	<samlp:NameID>
		vircom
	</samlp:NameID>
</samlp:LogoutRequest>
EOT;
    
    public function setUp()
    {
        $this->requestMock = $this->getMockBuilder('\VirCom\ePUAP2\Requests\Logout')
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
        
        new Templates\Logout(
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
        $template = new Templates\Logout(
            $this->requestMock,
            $this->xmlWriterMock
        );
        
        $this->assertEquals($this->templateContent, $template->__toString());
    }
    
}
