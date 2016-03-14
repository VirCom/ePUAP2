<?php

namespace VirCom\ePUAP2\Messages\Templates;

use Sabre\Xml;
use VirCom\ePUAP2\Requests;

class Logout
{

    /**
     * @var string
     */
    private $parsedMessage;
    
    /**
     * @param string $url
     * @param \VirCom\ePUAP2\Requests\Logout $request
     * @param \Sabre\Xml\Writer $xmlWriter
     */
    public function __construct(Requests\Logout $request, Xml\Writer $xmlWriter)
    {
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument();
        
        $xmlWriter->startElement('samlp:LogoutRequest');
        $xmlWriter->writeAttribute('xmlns:samlp', 'urn:oasis:names:tc:SAML:2.0:protocol');
        $xmlWriter->writeAttribute('xmlns:saml', 'urn:oasis:names:tc:SAML:2.0:assertion');
        $xmlWriter->writeAttribute('ID', microtime(true));
        $xmlWriter->writeAttribute('IssueInstant', (new \DateTime())->format('Y-m-d\TH:i:s\Z'));
        $xmlWriter->writeAttribute('Version', '2.0');
        
        $xmlWriter->startElement('saml:Issuer');
        $xmlWriter->write($request->getApplicationId());
        $xmlWriter->endElement();
        
        $xmlWriter->startElement('samlp:NameID');
        $xmlWriter->write($request->getUsername());
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
