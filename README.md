# Projeto Integrador - 2º Semestre <br> (Excelência Operacional - PlayPark)

Repositório destinado ao desenvolvimento do Projeto Integrador do 2º semestre do curso de Tecnologia em Desenvolvimento de Software Multiplataforma (DSM) da FATEC Araras.

## Informações Acadêmicas

* Instituição: FATEC Araras

* Curso: Tecnologia em Desenvolvimento de Software Multiplataforma (DSM)

* Semestre: 2º Semestre (2026)

* Orientador: Prof. Bruno Henrique de Paula Ferreira

## Status do Projeto

Em desenvolvimento

## Tecnologias e Ferramentas Utilizadas

O ambiente de desenvolvimento foi padronizado utilizando containers para garantir consistência entre os desenvolvedores.

* PHP 8.3 (Servidor Apache integrado)

* MySQL 8.0 (Banco de Dados Relacional)

* phpMyAdmin (Administração do Banco de Dados)

* Docker e Docker Compose (Orquestração de Containers)

## Como Executar o Projeto Localmente

### Pré-requisitos

* Git instalado

* Docker e Docker Compose instalados e em execução

### Passo a Passo

1. Clone este repositório para a sua máquina local:

   git clone https://github.com/PedroErnestoDev/projeto-integrador-fatec-2-sem.git

2. Acesse o diretório do projeto:

   cd projeto-integrador-fatec-2-sem

3. Inicie os containers em segundo plano executando o comando abaixo:

   docker compose up -d --build

4. Após a inicialização, os serviços estarão disponíveis nos seguintes endereços:

   * Aplicação Web: http://localhost:8081

   * Gerenciador do Banco de Dados (phpMyAdmin): http://localhost:8889

Nota: O banco de dados `playpark` será criado automaticamente na primeira execução, com as credenciais definidas no arquivo `docker-compose.yml`.

## Estrutura de Diretórios

* `/mysql-data` - Volume local gerado pelo Docker para persistência dos dados (ignorado no versionamento).

* `docker-compose.yml` - Arquivo de orquestração dos serviços.

* `Dockerfile` - Arquivo de construção da imagem customizada do servidor web.

* `.dockerignore` - Define arquivos e diretórios que não devem ser enviados para o contexto de construção da imagem Docker.

* `.gitignore` - Define arquivos e diretórios que não devem ser enviados para o controle de versão.

## Autores

* Pedro Henrique Ernesto de Souza

* Ítalo Kawamura Gabriel

* Giovanna Alves Gomes

* Gustavo Beltrame Vitoriano

* Gabriel Ferretti
