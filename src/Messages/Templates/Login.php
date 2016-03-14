<?php

namespace VirCom\ePUAP2\Messages\Templates;

use Sabre\Xml;
use VirCom\ePUAP2\Requests;

class Login
{

    /**
     * @var string
     */
    private $parsedMessage;
    
    /**
     * @param \VirCom\ePUAP2\Requests\Login $request
     * @param \Sabre\Xml\Writer $xmlWriter
     */
    public function __construct(Requests\Login $request, Xml\Writer $xmlWriter)
    {
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument();
        
        $xmlWriter->startElement('samlp:AuthnRequest');
        $xmlWriter->writeAttribute('xmlns:samlp', 'urn:oasis:names:tc:SAML:2.0:protocol');
        $xmlWriter->writeAttribute('ID', microtime(true));
        $xmlWriter->writeAttribute('IssueInstant', (new \DateTime())->format('Y-m-d\TH:i:s\Z'));
        $xmlWriter->writeAttribute('Version', '2.0');
        $xmlWriter->writeAttribute('Destination', $request->getUrl());
        $xmlWriter->writeAttribute('IsPassive', 'false');
        $xmlWriter->writeAttribute('AssertionConsumerServiceURL', $request->getResponseUrl());
        
        $xmlWriter->startElement('saml:Issuer');
        $xmlWriter->writeAttribute('xmlns:saml', 'urn:oasis:names:tc:SAML:2.0:assertion');
        $xmlWriter->write($request->getApplicationId());
        $xmlWriter->endElement();
        
        $xmlWriter->endElement();
        
        $this->parsedMessage = $xmlWriter->outputMemory();
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->parsedMessage;
    }
}
