<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;

/**
 * Represents a related message and source code location for a diagnostic. This should be
 * used to point to code locations that cause or related to a diagnostics, e.g when duplicating
 * a symbol in a scope.
 */
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

    /**
     * @param Location $location
     * @param string $message
     */
    public function __construct(Location $location, string $message)
    {
        $this->location = $location;
        $this->message = $message;
    }

    /**
     * @param array<mixed> $array
     */
    public static function fromArray(array $array): self
    {
        $map = [
            'location' => [Location::class],
        ];
        foreach ($array as $key => &$value) {
            if (!isset($map[$key])) {
                continue;
            }
            foreach ($map[$key] as $className) {
               try {
                   $value = Invoke::new($className, $value);
                   continue;
               } catch (Exception $e) {
                   continue;
               }
            }
        }
        return Invoke::new(self::class, $array);
    }
        
}