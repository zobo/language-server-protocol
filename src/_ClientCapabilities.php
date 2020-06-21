<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace LanguageServerProtocol;

use DTL\Invoke\Invoke;

/**
 * Defines the capabilities provided by the client.
 */
class _ClientCapabilities
{
    /**
     * Workspace specific client capabilities.
     *
     * @var WorkspaceClientCapabilities|null
     */
    public $workspace;

    /**
     * Text document specific client capabilities.
     *
     * @var TextDocumentClientCapabilities|null
     */
    public $textDocument;

    /**
     * Window specific client capabilities.
     *
     * @var object|null
     */
    public $window;

    /**
     * Experimental client capabilities.
     *
     * @var object|null
     */
    public $experimental;

    /**
     * @param WorkspaceClientCapabilities|null $workspace
     * @param TextDocumentClientCapabilities|null $textDocument
     * @param object|null $window
     * @param object|null $experimental
     */
    public function __construct(?WorkspaceClientCapabilities $workspace = null, ?TextDocumentClientCapabilities $textDocument = null, ?object $window = null, ?object $experimental = null)
    {
        $this->workspace = $workspace;
        $this->textDocument = $textDocument;
        $this->window = $window;
        $this->experimental = $experimental;
    }

    /**
     * @param array<mixed> $array
     */
    public static function fromArray(array $array): self
    {
        $map = [
            'workspace' => [WorkspaceClientCapabilities::class],
            'textDocument' => [TextDocumentClientCapabilities::class],
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