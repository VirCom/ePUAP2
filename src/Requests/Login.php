<?php

namespace VirCom\ePUAP2\Requests;

class Login
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $responseUrl;

    /**
     * @var string
     */
    private $applicationId;

    /**
     * @param string $url
     * @param string $responseUrl
     * @param string $applicationId
     */
    public function __construct($url, $responseUrl, $applicationId)
    {
        $this->url = $url;
        $this->responseUrl = $responseUrl;
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
    public function getResponseUrl()
    {
        return $this->responseUrl;
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }
}
