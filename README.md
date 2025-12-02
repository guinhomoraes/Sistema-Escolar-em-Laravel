# 🚀 Sistema Escolar em Laravel 12

## ✅ Requisitos

- PHP >= 8.1
- Composer
- Banco de dados (MySQL)

---

### ⚙️ Passo 1: Instalar Laravel 12

Crie o projeto:

```bash
laravel new sistema_laravel
```

Configure o arquivo .env com os dados do seu banco:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_escolar
DB_USERNAME=nome do usuario do banco
DB_PASSWORD= senha do banco
```

Execute as migrações iniciais:

```bash
php artisan migrate
```

### 🛡️ Passo 3: Criar Model/Controller/Migration

Para criar a model/controller/migration deve executar o comando abaixo

```

php artisan make:model Curso -mcr

```

### 🛡️ Passo 4: Criar Model/Controller/Resource

Para criar a model/controller/resource deve executar o comando abaixo

```

php artisan make:model Curso -cr

```

### 🛡️ Passo 5: Executando a aplicação

Para iniciar a aplicação deve executar o comando abaixo

```
composer run dev
```

## Autenticação 

Para autenticar a aplicação utilizamos o Brezee. Para adiciona-lo no projeto deve-se seguir os seguintes passos

- Adicionando o pacote via composer

````
composer require laravel/breeze --dev
````

- Em seguida, execute o comando php artisan breeze:install e você verá as opções de pilha que já conhece para escolher.

```
php artisan breeze:install
```
- Execute o comando abaixo para atualizar os pacoteS Node do projeto

```
npm install
```

- Agora é só iniciar a aplicação e configurar as rotas que será publicas e provadas em "route/web.php"

