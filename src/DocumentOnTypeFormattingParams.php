<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;

/**
 * The parameters of a [DocumentOnTypeFormattingRequest](#DocumentOnTypeFormattingRequest).
 */
class DocumentOnTypeFormattingParams
{
    /**
     * The document to format.
     *
     * @var TextDocumentIdentifier
     */
    public $textDocument;

    /**
     * The position at which this request was send.
     *
     * @var Position
     */
    public $position;

    /**
     * The character that has been typed.
     *
     * @var string
     */
    public $ch;

    /**
     * The format options.
     *
     * @var FormattingOptions
     */
    public $options;

    /**
     * @param TextDocumentIdentifier $textDocument
     * @param Position $position
     * @param string $ch
     * @param FormattingOptions $options
     */
    public function __construct(TextDocumentIdentifier $textDocument, Position $position, string $ch, FormattingOptions $options)
    {
        $this->textDocument = $textDocument;
        $this->position = $position;
        $this->ch = $ch;
        $this->options = $options;
    }

    /**
     * @param array<string,mixed> $array
     */
    public static function fromArray(array $array): self
    {
        $map = [
            'textDocument' => ['names' => [TextDocumentIdentifier::class], 'iterable' => false],
            'position' => ['names' => [Position::class], 'iterable' => false],
            'options' => ['names' => [FormattingOptions::class], 'iterable' => false],
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