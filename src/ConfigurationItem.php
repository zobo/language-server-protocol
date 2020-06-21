<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;

class ConfigurationItem
{
    /**
     * The scope to get the configuration section for.
     *
     * @var string|null
     */
    public $scopeUri;

    /**
     * The configuration section asked for.
     *
     * @var string|null
     */
    public $section;

    /**
     * @param string|null $scopeUri
     * @param string|null $section
     */
    public function __construct(?string $scopeUri = null, ?string $section = null)
    {
        $this->scopeUri = $scopeUri;
        $this->section = $section;
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