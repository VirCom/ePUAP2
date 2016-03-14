<?php

namespace VirCom\ePUAP2\Messages\Transformers;

class Transformer implements TransformerInterface
{
    /**
     * @param string $content
     * @return string
     */
    public function transform($content)
    {
        return base64_encode(gzdeflate($content));
    }
}
