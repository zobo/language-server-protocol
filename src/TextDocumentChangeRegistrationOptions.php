<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;

/**
 * Describe options to be used when registered for text document change events.
 *
 * Mixins (implemented TS interfaces): TextDocumentRegistrationOptions
 */
class TextDocumentChangeRegistrationOptions
{
    /**
     * How documents are synced to the server.
     *
     * @var 0|1|2
     */
    public $syncKind;

    /**
     * A document selector to identify the scope of the registration. If set to null
     * the document selector provided on the client side will be used.
     *
     * @var array<(string|array<mixed>|array<mixed>|array<mixed>)>|null
     */
    public $documentSelector;

    /**
     * @param 0|1|2 $syncKind
     * @param array<(string|array<mixed>|array<mixed>|array<mixed>)>|null $documentSelector
     */
    public function __construct($syncKind, $documentSelector = null)
    {
        $this->syncKind = $syncKind;
        $this->documentSelector = $documentSelector;
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
        foreach ($classNames as $className) {
            try {
                // @phpstan-ignore-next-line
                return call_user_func_array($className . '::fromArray', [$object]);
            } catch (Exception $e) {
                continue;
            }
        }

        return null;
    }
        
}