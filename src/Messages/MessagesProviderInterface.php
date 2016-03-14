<?php

namespace VirCom\ePUAP2\Messages;

use VirCom\ePUAP2\Requests;

interface MessagesProviderInterface
{
    /**
     * @param \VirCom\ePUAP2\Requests\Login $request
     * @return \VirCom\ePUAP2\Messages\Templates\Login
     */
    public function getLoginMessage(Requests\Login $request);
    
    /**
     * @param \VirCom\ePUAP2\Requests\Logout $request
     * @return \VirCom\ePUAP2\Messages\Templates\Logout
     */
    public function getLogoutMessage(Requests\Logout $request);
}
