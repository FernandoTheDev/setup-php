<?php

/**
* Powered by https://github.com/fernandothedev/
* Copyright 2024
*/

namespace Fernando\Setup;
use Monolog\Logger;

class Variables {
    private Logger $logger;
    protected array $data = [];
    
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function set(array $variable): void
    {
        $variableName = $variable[0];

        if (array_key_exists($variableName, $this->getData())) {
            $this->logger->critical("Variable already exists '{$variableName}'\n");
        }

        $this->data[$variableName] = $this->type($variable[1]);
    }

    private function type(string $value): string|bool|int|float|array
    {
        if (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null) {
            return boolval($value);
        }

        if (is_numeric($value)) {
            return intval($value);
        }

        if (is_float($value)) {
            return floatval($value);
        }

        $jsonString = str_replace("'", '"', $value);
        $array = json_decode($jsonString, true);

        if (is_array($array)) {
            return $array;
        }

        return strval(trim($value, '"'));
    }

    public function getData(): array {
        return $this->data;
    }
}