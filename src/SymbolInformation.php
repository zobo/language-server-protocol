<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 */
class SymbolInformation
{
    /**
     * The name of this symbol.
     *
     * @var string
     */
    public $name;

    /**
     * The kind of this symbol.
     *
     * @var 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26
     */
    public $kind;

    /**
     * Indicates if this symbol is deprecated.
     *
     * @var bool|null
     */
    public $deprecated;

    /**
     * The location of this symbol. The location's range is used by a tool
     * to reveal the location in the editor. If the symbol is selected in the
     * tool the range's start information is used to position the cursor. So
     * the range usually spans more than the actual symbol's name and does
     * normally include thinks like visibility modifiers.
     * 
     * The range doesn't have to denote a node range in the sense of a abstract
     * syntax tree. It can therefore not be used to re-construct a hierarchy of
     * the symbols.
     *
     * @var Location
     */
    public $location;

    /**
     * The name of the symbol containing this symbol. This information is for
     * user interface purposes (e.g. to render a qualifier in the user interface
     * if necessary). It can't be used to re-infer a hierarchy for the document
     * symbols.
     *
     * @var string|null
     */
    public $containerName;

    /**
     * @param string $name
     * @param 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26 $kind
     * @param bool|null $deprecated
     * @param Location $location
     * @param string|null $containerName
     */
    public function __construct(string $name, $kind, Location $location, ?bool $deprecated = null, ?string $containerName = null)
    {
        $this->name = $name;
        $this->kind = $kind;
        $this->deprecated = $deprecated;
        $this->location = $location;
        $this->containerName = $containerName;
    }

    /**
     * @param array<string,mixed> $array
     */
    public static function fromArray(array $array): self
    {
        $map = [
            'location' => ['names' => [Location::class], 'iterable' => false],
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