<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;

/**
 * Registration options for a [CompletionRequest](#CompletionRequest).
 *
 * Mixins (implemented TS interfaces): TextDocumentRegistrationOptions, CompletionOptions
 */
class CompletionRegistrationOptions
{
    /**
     * A document selector to identify the scope of the registration. If set to null
     * the document selector provided on the client side will be used.
     *
     * @var array<(string|array<mixed>|array<mixed>|array<mixed>)>|null
     */
    public $documentSelector;

    /**
     * Most tools trigger completion request automatically without explicitly requesting
     * it using a keyboard shortcut (e.g. Ctrl+Space). Typically they do so when the user
     * starts to type an identifier. For example if the user types `c` in a JavaScript file
     * code complete will automatically pop up present `console` besides others as a
     * completion item. Characters that make up identifiers don't need to be listed here.
     * 
     * If code complete should automatically be trigger on characters not being valid inside
     * an identifier (for example `.` in JavaScript) list them in `triggerCharacters`.
     *
     * @var array<string>|null
     */
    public $triggerCharacters;

    /**
     * The list of all possible characters that commit a completion. This field can be used
     * if clients don't support individual commmit characters per completion item. See
     * `ClientCapabilities.textDocument.completion.completionItem.commitCharactersSupport`
     * 
     * If a server provides both `allCommitCharacters` and commit characters on an individual
     * completion item the ones on the completion item win.
     *
     * @var array<string>|null
     */
    public $allCommitCharacters;

    /**
     * The server provides support to resolve additional
     * information for a completion item.
     *
     * @var bool|null
     */
    public $resolveProvider;

    /**
     *
     * @var bool|null
     */
    public $workDoneProgress;

    /**
     * @param array<(string|array<mixed>|array<mixed>|array<mixed>)>|null $documentSelector
     * @param array<string>|null $triggerCharacters
     * @param array<string>|null $allCommitCharacters
     * @param bool|null $resolveProvider
     * @param bool|null $workDoneProgress
     */
    public function __construct($documentSelector = null, ?array $triggerCharacters = null, ?array $allCommitCharacters = null, ?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->triggerCharacters = $triggerCharacters;
        $this->allCommitCharacters = $allCommitCharacters;
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }

    /**
     * @param array<string,mixed> $array
     */
    public static function fromArray(array $array): self
    {
        $map = [
        ];

        foreach ($array as $key => &$value) {
            if (!isset($map[$key])) {
                continue;
            }

            if ($map[$key]['iterable']) {
                $value = array_map(function ($object) use ($map, $key) {
                    if (!is_array($object)) {
                        return $object;
                    }

                    return self::invokeFromNames($map[$key]['names'], $object) ?: $object;
                }, $value);
                continue;
            }

            $names = $map[$key]['names'];
            $value = self::invokeFromNames($names, $value) ?: $value;
        }
        
        return Invoke::new(self::class, $array);
    }

    /**
     * @param array<string> $classNames
     * @param array<string,mixed> $object
     */
    private static function invokeFromNames(array $classNames, array $object): ?object
    {
        $lastException = null;
        foreach ($classNames as $className) {
            try {
                // @phpstan-ignore-next-line
                return call_user_func_array($className . '::fromArray', [$object]);
            } catch (Exception $exception) {
                $lastException = $exception;
                continue;
            }
        }

        throw $exception;
    }
        
}