<?php

namespace VirCom\ePUAP2\Requests;

class Logout
{
    /**
     * @var string
     */
    private $url;
    
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $applicationId;

    /**
     * @param string $url
     * @param string $username
     * @param string $applicationId
     */
    public function __construct($url, $username, $applicationId)
    {
        $this->url = $url;
        $this->username = $username;
        $this->applicationId = $applicationId;
    }
    
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }
}
