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
