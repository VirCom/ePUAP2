<?php

namespace VirCom\ePUAP2\Services;

use VirCom\ePUAP2\Requests;
use VirCom\ePUAP2\Messages;
use VirCom\ePUAP2\Messages\Transformers;

class Authentication implements AuthenticationInterface
{
    /**
     * @var \VirCom\ePUAP2\Messages\MessagesProviderInterface
     */
    private $messagesProvider;
    
    /**
     * @var \VirCom\ePUAP2\Messages\Transformers\TransformerInterface 
     */
    private $transformer;
    
    /**
     * @param \VirCom\ePUAP2\Messages\MessagesProviderInterface $messagesProvider
     * @param \VirCom\ePUAP2\Messages\Transformers\TransformerInterface $transformer
     */
    public function __construct(
        Messages\MessagesProviderInterface $messagesProvider,
        Transformers\TransformerInterface $transformer
    ) {
        $this->messagesProvider = $messagesProvider;
        $this->transformer = $transformer;
    }
    
    /**
     * @param string $parameter
     * @return string
     */
    private function escapeUrlParameter($parameter)
    {
        return addslashes(rawurlencode($parameter));
    }
    
    /**
     * @param \VirCom\ePUAP2\Requests\Login $request
     * @return string
     */
    public function getLoginUrl(Requests\Login $request)
    {
        $message = $this->messagesProvider->getLoginMessage($request);
        return $request->getUrl() . '?SAMLRequest=' . $this->escapeUrlParameter($this->transformer->transform($message->__toString()));
    }
    
    /**
     * @param \VirCom\ePUAP2\Requests\Logout $request
     * @return string
     */
    public function getLogoutUrl(Requests\Logout $request)
    {
        $message = $this->messagesProvider->getLogoutMessage($request);
        return $request->getUrl() . '?SAMLRequest=' . $this->escapeUrlParameter($this->transformer->transform($message->__toString()));
    }
}
