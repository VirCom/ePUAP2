<?php

namespace VirCom\ePUAP2\Messages\Transformers;

interface TransformerInterface
{
    /**
     * @return string
     */
    public function transform($content);
}
