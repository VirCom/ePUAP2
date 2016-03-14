<?php

namespace VirCom\ePUAP2;

use Sabre\Xml;
use VirCom\ePUAP2\Services;
use VirCom\ePUAP2\Messages;
use VirCom\ePUAP2\Messages\Transformers;

class AuthenticationFactory implements ServiceFactoryInterface
{
    /**
     * @return \VirCom\ePUAP2\Services\Authentication
     */
    public function createService()
    {
        return new Services\Authentication(
            new Messages\MessagesProvider(
                new Xml\Writer()
            ),
            new Transformers\Transformer()
        );
    }
}
