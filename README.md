# Resumizer :: Plugin para Meduza Static Site Generator

Cria um resumo do conteúdo com base no primeiro parágrafo até um limite de palavras.


## Instalação
O método de instalação recomendado é utilizando o [Composer](https://getcomposer.org):

```sh
composer require meduza-static-site-generator/meduza-plugin-resumizer
```

## Configuração
A configuração do plugin é bastante simples:

```yaml
## Configuração do plugin resumizer

plugins:
  Resumizer:
    # Caminho relativo/absoluto para o inicializador do plugin.
    source: "./vendor/meduza-static-site-generator/meduza-plugin-resumizer/Resumizer.php"
    # Número máximo de palavras do resumo
    maxWords: 30
    
```

Fornecemos um arquivo de configuração *resumizer.yml* com todas as opções documentadas na raiz do projeto. Inclua as configurações ou importe com ```import``` no seu arquivo de configurações.

## Uso
**Resumizer** cria um resumo ou descrição do conteúdo copiando o primeiro parágrafo *markdown* até o limite de palavras definido em ```maxWords``` e disponibiliza isso para o tema (desde que o tema tenha suporte a isso).

Basicamente, o plugin acrescenta ao *frontmatter* de cada página as palavras-chave ```resume```, ```description``` e ```summary``` (se ainda não existirem) que contém o primeiro parágrafo do conteúdo da página (limitado por ```maxWords```).

## Como o plugin funciona
Ele quebra num array o *markdown* a cada par de quebras de linha e pega o primeiro elemento do array, limitando-o por ```maxWords```.

## Como contribuir
Para contribuir com o projeto, faça o seguinte:

- Crie um *fork*;
- Clone o *fork* e crie um novo *branch* para a sua contribuição;
- Envie suas alterações para o *fork*;
- Crie um *pull request*.

Será interessante você criar um *issue* no repositório oficial para a sua alteração e referenciá-la no nome do seu *branch* e nos *commits*. Também referencie seu *pull request* nas *issue*. Isso agilizará a análise da sua contribuição.

## Licença

**Resumizer** é licenciado sob a [MIT Licence](https://github.com/meduza-static-site-generator/meduza-plugin-resumizer/blob/main/LICENSE)