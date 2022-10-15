# Desenvolvimento PHP + HTML + CSS + JS
## Atividade Prática

> Por Wanderlei Silva do Carmo <wander.silva@gmail.com>
>
> Engenheiro Arquiteto de Software
>
> Instrutor de Educação Profissional Técnica
>

![PHP+HTML5+MYSQL](https://www.yoan-jouve.com/wp-content/uploads/2020/12/520-5206022_php-mysql-logo-png-transparent-png-768x589.png "Logo PHP")

## Fique ligado no changelog da aplicação

### Objetivos
1. Praticar a criação de site utilizando PHP com HTML5;
2. Criar aplicação SPA - Single Page Application (SPA);
3. Aprender a realizar carregamento dinâmico de conteúdo;
4. Aquisição de dados;
5. Apresentação de dados via requisição http assíncrona;
6. Consumo de API - Application Programming Interface;
7. Estilizar página utilizado CSS - Cascade Style Sheet - Folha de Estilo em Cascata;

## SPA - Single Page Application
### Desenvolvimento de aplicação em página única
Trata-se de uma abordagem em que uma aplicação WEB é criada utilizando apenas uma página principal que contenha referência para acessos aos demais recursos do sistema (páginas ou chamada a API/RPC) utilizando links para acesso através de âncoras HTML.

## Quais os passos necessários para criar a atividade?
1. Garantir que os binários do PHP estão baixados para a versão estável mais recente;
2. Configurar a variável de ambiente "path" devidamente  o seu usuário (WINDOWS). Para usuários Linux, apenas instale o pactote PHP de acordo com os procedimentos descritos para a distribuição;
3. Criar uma pasta para o novo projeto;
4. Configurar o composer: baixar o **composer.phar** utilizando o  [link do composer](https://getcomposer.org/download/ "composer") oferecido no site oficial; copiar o script  para o download correto da aplicação de acordo com a versão do PHP instalado;
5. Dentro da pasta do projeto e na linha de comando do sistema operacional inicializar o projeto com o composer (**php composer.phar init**); 
6. Adicionar a referência externa para o [CDN](https://www.bootstrapcdn.com/ "Link para CDN bootstrap e font-awesome") do _Bootstrap_, FontAwesome, etc.;
7. Instalar extensões no Visual Studio Code (vscode) para php, js, css, sass, etc.

### O que deve ser realizado na atividade prática?
1. Uma aplicação **SPA** contendo links para conteúdo, contato e sobre - criando links que carregarão as páginas dinâmicamente;
2. Executar a aplicação em um browser;
3. Depurar a aplicação;
4. Criar uma conta no provedor de hospedagem gratuita - [Grátis PHP Host](http://www.gratisphphost.info/?i=1 "Grátis PHP Host")
5. Publicar a aplicação em um servidor de hospedagem gratuito com suporte para a linguagem PHP;


### Change Log da versão
1. Adicionado exemplo, na página conteúdo, de acesso HTTP usando os verbos GET e POST (requisições http).

2. Criado alguns exemplos de array functions em javascript no modo assíncrono. 

3. Mensagens do sistemas na barra de status. Usando a referência *divMsg* para injetar mensagens de texto na barra de status.

4. Acrescentado recurso para um CRUD básico em PHP + JAVASCRIPT + HTML

5. Um arquivo de configuração **'config.json'** deve ser criado na raiz do projeto.
>{
>
>       "dbhost":"localhost ou ip do SGBD",
>    
>       "dbase": "nome_da_base_de_dados",
>
>       "dbuser":"usuário_do_banco", 
>
>       "dbpass":"senha_do_banco",
>
>}

6. Para garantir que o composer seja devidamente adaptável a versão do PHP instalado na máquina (host) de destino foi adicionada uma nova seção no arquivo composer.json com o seguinte conteúdo:
> 
> ...
>
>    "config": {
>
>		"optimize-autoloader": true,
>
>		"prepend-autoloader": false,
>
>		"platform": {
>
>			"php": "7.0"
>
>		}
>
>	},
>
> ...

7. Instalado as extensões no **Visual Studio Code** para codar em PHP e manipular o banco de dados MySQL ou MariaDB:

- PHP Extension Pack
- PHP Interlisense
- PHP Getters & Setters
- Format HTML in PHP
- PHP Namespace Resolver
- phpfmt - PHP Formatter
- PHP Getters & Setters
- PHPDoc Comment
- PHPDoc Generator
- MySQL
- SQL Tools
- SQLTools MySQL/MariaDB

8. CRUD completado para o módulo de exemplo contato:

- Nesta versão é possível CRIAR, EDITAR/ATUALIZAR e EXCLUIR um registro da tabela "contatos".
- Arquivos do módulo completos.


## License

MIT License

Copyright (c) 2016 Tomas de-Camino-Beck

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.