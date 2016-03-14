<?php

namespace VirCom\ePUAP2\Services;

use VirCom\ePUAP2\Requests;

interface AuthenticationInterface
{
    /**
     * @param \VirCom\ePUAP2\Requests\Login $request
     * @return string
     */
    public function getLoginUrl(Requests\Login $request);
    
    /**
     * @param \VirCom\ePUAP2\Requests\Logout $request
     * @return string
     */
    public function getLogoutUrl(Requests\Logout $request);
}
