<?php

namespace LanguageServerProtocol;

class Unregistration
{
    /**
     * The id used to unregister the request or notification. Usually an id
     * provided during the register request.
     *
     * @var string
     */
    public $id;

    /**
     * The method to unregister for.
     *
     * @var string
     */
    public $method;

    public function __construct(string $id, string $method)
    {
        $this->$id = $this->$id;
        $this->$method = $this->$method;
    }
}