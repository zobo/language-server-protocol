<?php

namespace LanguageServerProtocol;

class CompletionContext
{
    /**
     * How the completion was triggered.
     *
     * @var 1|2|3
     */
    public $triggerKind;

    /**
     * The trigger character (a single character) that has trigger code complete.
     * Is undefined if `triggerKind !== CompletionTriggerKind.TriggerCharacter`
     *
     * @var string|null
     */
    public $triggerCharacter;

    /**
     * @param 1|2|3 $triggerKind
     * @param string|null $triggerCharacter
     */
    public function __construct($triggerKind, ?string $triggerCharacter)
    {
        $this->triggerKind = $triggerKind;
        $this->triggerCharacter = $triggerCharacter;
    }
}