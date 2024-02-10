# Parser de .setup em php

## Como usar?
- Carregue a classe
```php 
use Fernando\Setup\Parser;

require_once(__DIR__ . '/../vendor/autoload.php');
```

- Inicie a classe e carregue as variáveis
```php 
$setup = new Parser(__DIR__);
$setup->run();
```

- Exemplo de uso (Contém tipagem):
```php 
//  Fernando
echo $_SETUP['DEV];

// String 
var_dump($_SETUP['DEV']);
```

## Instalação
### Como e onde instalar o parser.

- Composer 
```shell 
composer require fernandothedev/setup-php
```
- Git clone
```shell 
git clone https://github.com/fernandothedev/setup-php
```
