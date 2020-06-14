<?php

namespace LanguageServerProtocol;

class DiagnosticRelatedInformation
{
    /**
     * The location of this related diagnostic information.
     *
     * @var Location
     */
    public $location;

    /**
     * The message of this related diagnostic information.
     *
     * @var string
     */
    public $message;

    public function __construct(Location $location, string $message)
    {
        $this->$location = $this->$location;
        $this->$message = $this->$message;
    }
}