# Husky Teste
[Demo](https://husky-teste.herokuapp.com/)

## Como executar
### Pré-requisitos
- PHP 7.4.26
- Composer 2.1.14
- Qualquer banco de dados relacional

### Instalação
Clone o projeto
```
git clone git@github.com:devanderson-pires/husky-teste.git
```

Acesse a pasta do mesmo e instale as dependências
```
cd husky-teste
composer install
```

Copie o arquivo `.env.example` na raiz do projeto, renomeie para `.env` e altere as seguites variáveis para conectar seu banco de dados
```
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

:warning: Por padrão, o arquivo `config/database.php` utiliza mysql
```
'default' => env('DB_CONNECTION', 'mysql')
```

Rode as migrations e o seeder EntregadorSeeder
```
php artisan migrate
php artisan db:seed EntregadorSeeder
```

Inicie o projeto
```
php artisan serve
```
