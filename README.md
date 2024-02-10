# Parser de .setup em PHP

## Como usar?

1. Carregue a classe:

```php
use Fernando\Setup\Parser;

require_once(__DIR__ . '/../vendor/autoload.php');
```

2. Inicie a classe e carregue as variáveis:

```php
$setup = new Parser(__DIR__);
$setup->run();
```

3. Exemplo de uso (contém tipagem):

```php
// Exemplo de uso
echo $_SETUP['DEV'];
```

## Instalação

### Como e onde instalar o parser:

- Usando Composer:
```bash
composer require fernandothedev/setup-php
```

- Clonando o repositório Git:
```bash
git clone https://github.com/fernandothedev/setup-php
```
