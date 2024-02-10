<?php

/**
* Powered by https://github.com/fernandothedev/
* Copyright 2024
*/

namespace Fernando\Setup;
use Fernando\Setup\Variables;
use \Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Parser
{
    const EXPRESSION_INVALID = "Sintax invalid in file '%s' on line %s\n";
    const VARIABLES_PATTERN = '/([A-Z_][A-Z0-9_]*)\s*=\s*(true|false|\d+|"[^"]*");/';

    private Variables $variablesClass;
    private Logger $logger;
    protected array $contentFile;
    protected int $line = 0;

    public function __construct() {
        $this->logger = new Logger('setup-log');
        $handler = new StreamHandler('php://stdout', Logger::WARNING);
        $this->logger->pushHandler($handler);
        $this->variablesClass = new Variables($this->logger);
    }

    private function getLine(): int
    {
        return $this->line;
    }

    private function sumLine(): void
    {
        $this->line += 1;
    }

    private function setGlobal(): void
    {
        $_GLOBALS["SETUP"] = $this->variablesClass->getData();
    }

    private function scanDir(string $dir): void
    {
        $setupFiles = [];

        $absolutePath = realpath($dir);

        while ($absolutePath) {
            if (is_readable($absolutePath)) {
                $contents = scandir($absolutePath);

                if ($contents !== false) {
                    foreach ($contents as $item) {
                        $path = $absolutePath . DIRECTORY_SEPARATOR . $item;

                        if (is_file($path) && $item == '.setup') {
                            $setupFiles[] = [
                                "dir" => $path,
                                "content" => file_get_contents($path)
                            ];
                        }
                    }
                } else {
                    $this->logger->error("Não foi possível ler o diretório: {$absolutePath}");
                }
            }

            $absolutePath = dirname($absolutePath);

            if ($absolutePath == '.' || $absolutePath == '/' || $absolutePath == '\\') {
                break;
            }
        }

        $this->contentFile = $setupFiles;
    }

    private function tokenyzer(): void
    {
        foreach ($this->contentFile as $line => $data) {
            $lines = explode("\n", $data['content']);

            foreach ($lines as $key) {
                if ($key == "") {
                    continue;
                }

                $this->sumLine();
                $this->parse($key, $data['dir']);
            }
        }
    }

    private function parse(string $line, string $dir): void
    {
        if (preg_match(self::VARIABLES_PATTERN, $line, $matches)) {
            if (isset($matches[1]) and isset($matches[2])) {
                array_shift($matches);
                $this->variablesClass->set($matches);
            } else {
                $this->logger->critical(sprintf(self::EXPRESSION_INVALID, $dir, $this->getLine()));
            }
        } else {
            $this->logger->error(sprintf(self::EXPRESSION_INVALID, $dir, $this->getLine()));
        }
    }
    
    public function run(string $dir): void 
    {
        $this->scanDir($dir);
        $this->tokenyzer();
        $this->setGlobal();
    }
}