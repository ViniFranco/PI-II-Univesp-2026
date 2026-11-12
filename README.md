# PI II Univesp 2026

Aplicação desenvolvida com Laravel 13 e Filament 5. O ambiente local é executado com Laravel Sail e Docker.

## Pré-requisitos

- Docker com Docker Compose
- PHP 8.3 ou superior e Composer para instalar as dependências - dê preferência para o PHP 8.5.

## Como executar localmente

Na raiz do projeto:

1. Instale as dependências e, se ainda não existir, crie o arquivo de ambiente:

   ```bash
   composer install
   cp .env.example .env
   ```

2. No arquivo `.env`, configure a conexão com o banco usado pelo Sail:

   ```dotenv
   APP_URL=http://localhost:8000
   APP_PORT=8000

   DB_CONNECTION=pgsql
   DB_HOST=pgsql
   DB_PORT=5432
   DB_DATABASE=laravel
   DB_USERNAME=sail
   DB_PASSWORD=<configure sua senha aqui>

   REDIS_HOST=valkey
   ```

3. Inicie os serviços e prepare a aplicação:

   ```bash
   ./vendor/bin/sail up -d --build
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run build
   ```

4. Acesse a aplicação em [http://localhost](http://localhost) (ou use a porta configurada no .env caso não funcione diretamente).

Para encerrar os serviços:

```bash
./vendor/bin/sail down
```

## Comandos locais específicos do projeto

Estes comandos precisam ser rodados antes de começar a testar localmente:

O primeiro cria as permissões para que os perfis de acesso fiquem corretamente configurados, enquanto o segundo preenche o banco de dados com os dados sintéticos de teste, usando o Faker e as factories definidas no projeto.

```bash
./vendor/bin/sail artisan shield:generate --all --panel=admin --no-interaction
./vendor/bin/sail artisan db:seed
```
