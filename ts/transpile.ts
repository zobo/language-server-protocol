import {createSourceFile, ScriptTarget, SyntaxKind, InterfaceDeclaration}  from "typescript"
import path = require('path');
import {Generator} from "./generator";
import {Writer} from './writer';
import {readFileSync} from 'fs';
import {TypeConverter} from './typeConverter';

class Transpiler
{
    writer: Writer;
    generator: Generator;

    constructor (writer: Writer, generator: Generator) {
        this.writer = writer;
        this.generator = generator;
    }

    transpile(file: string[]): Promise<void> {
        file.forEach((file) => {
            const node = createSourceFile(
                file,
                readFileSync(file, 'utf8'),
                ScriptTarget.Latest,
                true
            );

            node.forEachChild(node => {
                if (SyntaxKind[node.kind] == 'InterfaceDeclaration') {
                    const code = this.generator.interfaceDeclaration(node);
                    this.writer.write(node.name.escapedText, code);
                }
            });
        });
    }
}

const paths: string[] = [
    path.resolve(__dirname, '..', 'node_modules', 'vscode-languageserver-protocol', 'lib', 'protocol.d.ts'),
    path.resolve(__dirname, '..', 'node_modules', 'vscode-languageserver-protocol', 'lib', 'protocol.foldingRange.d.ts'),
    path.resolve(__dirname, '..', 'node_modules', 'vscode-languageserver-types', 'lib', 'umd', 'main.d.ts'),
];

const transpiler = new Transpiler(
    new Writer(path.resolve(__dirname, '..', 'src')),
    new Generator(new TypeConverter())
);

transpiler.transpile(paths);
