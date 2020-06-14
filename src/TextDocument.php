<?php

namespace LanguageServerProtocol;

class TextDocument
{
    /**
     * The associated URI for this document. Most documents have the __file__-scheme, indicating that they
     * represent files on disk. However, some documents may have other schemes indicating that they are not
     * available on disk.
     *
     * @var DocumentUri
     */
    public $uri;

    /**
     * The identifier of the language associated with this document.
     *
     * @var string
     */
    public $languageId;

    /**
     * The version number of this document (it will increase after each
     * change, including undo/redo).
     *
     * @var int
     */
    public $version;

    /**
     * The number of lines in this document.
     *
     * @var int
     */
    public $lineCount;

    public function __construct(DocumentUri $uri, string $languageId, int $version, int $lineCount)
    {
        $this->$uri = $this->$uri;
        $this->$languageId = $this->$languageId;
        $this->$version = $this->$version;
        $this->$lineCount = $this->$lineCount;
    }
}