<?php

namespace VirCom\ePUAP2\Messages;

use Sabre\Xml;
use VirCom\ePUAP2\Requests;
use VirCom\ePUAP2\Messages\Templates;

class MessagesProvider implements MessagesProviderInterface
{
    /**
     * @var \Sabre\Xml\Writer
     */
    private $xmlWriter;
    
    /**
     * @param \Sabre\Xml\Writer $xmlWriter
     */
    public function __construct(Xml\Writer $xmlWriter)
    {
        $this->xmlWriter = $xmlWriter;
    }
    
    /**
     * @param \VirCom\ePUAP2\Requests\Login $request
     * @return \VirCom\ePUAP2\Messages\Templates\Login
     */
    public function getLoginMessage(Requests\Login $request)
    {
        return new Templates\Login($request, $this->xmlWriter);
    }
    
    /**
     * @param \VirCom\ePUAP2\Requests\Logout $request
     * @return \VirCom\ePUAP2\Messages\Templates\Logout
     */
    public function getLogoutMessage(Requests\Logout $request)
    {
        return new Templates\Logout($request, $this->xmlWriter);
    }
}
