# LMS Project

Breve descrição do projeto.

## Pré-requisitos

* Docker
* Docker Compose
* PHP >= 8.x
* Laravel Sail

## Instalação e execução com Sail

1. Clone o repositório:

```bash
git clone git@github.com:Zigtecnologia-web/lms.git
cd lms
```

2. Copie o `.env.example` e configure variáveis de ambiente:

```bash
cp .env.example .env
```

* Configure variáveis como `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `APP_PORT` etc.

3. Suba os containers com Sail:

```bash
./vendor/bin/sail up -d
```

Isso irá iniciar os seguintes serviços:

* **laravel.test**: container principal com PHP 8.4
* **mysql**: banco de dados MySQL 8.0
* **redis**: cache
* **meilisearch**: motor de busca
* **mailpit**: servidor de e-mail para testes
* **selenium**: testes de browser automatizados

4. Instale dependências PHP:

```bash
./vendor/bin/sail composer install
```

5. Rode as migrations do banco de dados:

```bash
./vendor/bin/sail artisan migrate
```

6. (Opcional) Rode seeders para popular dados iniciais:

```bash
./vendor/bin/sail artisan db:seed
```

7. Acesse o projeto:

```
http://localhost:${APP_PORT:-80}
```

## Comandos úteis do Sail

```bash
# Abrir um shell dentro do container principal
./vendor/bin/sail shell

# Parar todos os containers
./vendor/bin/sail down

# Reiniciar containers
./vendor/bin/sail restart

# Rodar migrations
./vendor/bin/sail artisan migrate

# Rodar seeders
./vendor/bin/sail artisan db:seed

# Rodar testes
./vendor/bin/sail artisan test
```

## Observações

* Todas as portas, volumes e variáveis de ambiente estão configuradas no arquivo `docker-compose.yml`.
* Para produção, configure `.env` adequadamente.
* O sistema **não possui front-end**, é apenas backend e serviços associados.

---

Este README funciona como um guia completo para iniciar e executar o projeto LMS usando Laravel Sail, contemplando todos os serviços do `docker-compose.yml`.
