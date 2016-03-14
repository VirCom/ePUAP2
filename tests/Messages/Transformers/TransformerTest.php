<?php

namespace VirComTest\ePUAP2\Draco\Messages\Transformers;

use VirCom\ePUAP2\Messages\Transformers;

class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \VirCom\ePUAP2\Messages\Transformers\Transformer
     */
    private $transformer;
    
    public function setUp()
    {
        $this->transformer = new Transformers\Transformer();
    }
    
    public function testValidTransformedUrl()
    {
        $messageTemplate = <<<EOT
<samlp:AuthnRequest 
	xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol" 
	ID="1457449945.1927"
    Version="2.0" 
	IssueInstant="2016-01-30T07:58:31Z" 
	Destination="https://github.com/VirCom/ePUAP2" 
	IsPassive="false" 
	AssertionConsumerServiceURL="https://github.com/VirCom/ePUAP2">
	<saml:Issuer xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion">
		12345
	</saml:Issuer>
</samlp:AuthnRequest>
EOT;

        $this->assertEquals(
            'jZHLasMwEEXXCeQfjPexLT/qeogDJtkEUghJk0V3qpnWAltyNVLo51dWWtpuSmcj5nHPDFcr4kM/QmNNJ4/4ZpFMsJjP3odeEvheHVotQXESBJIPSGBaODUPe0ijBEatjGpVH06q3bYOWV6UeV5VeRGxKi3DxTxwcUFNQsk6dJrbKJHFnSTDpXHVhN0tE7bMksekhOIeMvbkx7buHiG58drOmJEgjl+F6exz1Kohvgi9cQ8ezs0h/QQfOJG4Yh2+8J7QFxsi1BNkoyTZAfUJ9VW0eD7u/4FdO8Jq8gL81Tr4dudvc/jXWo+YsTTLi4kV/4C5zi3//QnrDw==',
            $this->transformer->transform($messageTemplate)
        );
    }
}
