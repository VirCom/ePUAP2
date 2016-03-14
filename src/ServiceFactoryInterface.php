<?php

namespace VirCom\ePUAP2;

/**
 * @return \VirCom\ePUAP2\Services\AuthenticationInterface
 */
interface ServiceFactoryInterface
{
    public function createService();
}
