# Validar CNPJ em PHP

[![License](https://img.shields.io/github/license/vsilva472/php-cnpj.svg)](https://github.com/vsilva472/php-cnpj/blob/master/LICENSE.md)
[![Packagist](https://img.shields.io/packagist/v/vsilva472/php-cnpj.svg)](https://packagist.org/packages/vsilva472/php-cnpj)

## Descrição

phpCNPJ é uma classe escrita em PHP para validar CNPJ alfanumérico ou não, independentemente de o valor possuir máscara (`99.999.999/9999-99`) ou não, de acordo com as normas estabelecidas pelo governo brasileiro.

## Compatibilidade

A versão 2.x introduz suporte ao novo formato de CNPJ alfanumérico.

| Versão | PHP      | CNPJ alfanumérico |
| ------ | -------- | ----------------- |
| `1.x`  | PHP 7.1+ | ❌ Não             |
| `2.x`  | PHP 8.1+ | ✅ Sim             |

### Breaking change

A versão `2.x` é uma **breaking change** em relação à versão `1.x`, principalmente por atualizar a versão mínima suportada do PHP.

Além disso, a versão `2.x` passa a aceitar CNPJs alfanuméricos conforme o novo padrão da Receita Federal.

Se o seu projeto ainda utiliza PHP 7.x, utilize a última versão `1.x`:

```bash
composer require vsilva472/php-cnpj:^1.0
```

Para projetos utilizando PHP 8.1 ou superior:

```bash
composer require vsilva472/php-cnpj:^2.0
```

## Requisitos

* PHP 8.1+ para a versão 2.x
* PHP 7.1+ para a versão 1.x

## Instalação

> Recomendamos a instalação via **Composer**. Você também pode baixar o repositório como arquivo ZIP ou fazer um clone via Git.

### Instalação via Composer

Para instalar a versão mais recente:

```bash
composer require vsilva472/php-cnpj
```

Para utilizar a última versão da série 1.x:

```bash
composer require vsilva472/php-cnpj:^1.0
```

Para utilizar a versão 2.x:

```bash
composer require vsilva472/php-cnpj:^2.0
```

Para baixar e instalar o Composer no seu ambiente, acesse a [documentação oficial do Composer](https://getcomposer.org/download/).

### Instalação manual

* Baixe o repositório como [ZIP](https://github.com/vsilva472/php-cnpj/archive/master.zip) ou faça um clone;
* Descompacte os arquivos em seu projeto;
* Execute o comando `composer install` no local onde extraiu os arquivos.

## Como utilizar

```php
<?php

require 'path/to/vendor/autoload.php';

$cnpj = '23.456.789/0001-55';

$validator = new \Vsilva472\phpCNPJ\CNPJ();

$isCnpjValid = $validator->validate($cnpj);

if ($isCnpjValid) {
    // CNPJ válido
} else {
    // CNPJ inválido
}
```

A partir da versão 2.x, CNPJs alfanuméricos também são aceitos:

```php
<?php

$validator = new \Vsilva472\phpCNPJ\CNPJ();

$validator->validate('00.000.000/E08G-12');
```

## Changelog

Para consultar o log de alterações, acesse o arquivo [CHANGELOG.md](https://github.com/vsilva472/php-cnpj/blob/master/CHANGELOG.md).

## Licença

MIT
