# Controle de cliente

## instalação
Na pasta raiz do projeto, execute esses comandos:
```php
composer install
npm i
npm run dev
```

Para criar o banco de dados e popular ele, digite esses comandos:
```php
php artisan migrate
php artisan db:seed --class=ClientSeeder
```

para executar a aplicação, execute esses coemandos:
```php
php artisan ser
```
A aplicação estará rodando em `localhost:8000`

## Rotas da API
- `POST: /register`: registra um novo usuário, os parametros: `name# Controle de cliente

## instalação
Na pasta raiz do projeto, execute esses comandos:
```php
composer install
npm i
npm run dev
```

Para criar o banco de dados e popular ele, digite esses comandos:
```php
php artisan migrate
php artisan db:seed --class=ClientSeeder
```

para executar a aplicação, execute esses coemandos:
```php
php artisan ser
```
A aplicação estará rodando em `localhost:8000`

## Rotas da API
- `POST: /register`: registra um novo usuário, os parametros: `name`, `email` e `password`
- `POST: /login`: faz o login e devolve o token, parametros: `email` e `password`
- `GET: /me`: retorn o usuario logado, deve ser passado o `Bearer token`.
- `GROUP: /client`: deve ser passado o `Bearer token` en todas as rotas.
	- `GET`: retorna uma lista de clientes.
	- `POST`: cadastro um novo cliente.
            - parametros: `full_name`, `document`, `document_type`, `display_name`, `phone`, `email`, `password`.
	- `GET: /{id}`: retorna um único cliente.
	- `DELETE: /{id}`: deleta um cliente.
	- `PUT: /{id}`: atualiza os dados de um cliente.
            - parametros: `full_name`, `document`, `document_type`, `display_name`, `phone`, `email`, `password`.
- `GROUP: /product`: deve ser passado o `Bearer token` en todas as rotas.
	- `GET`: retorna uma lista de produtos.
	- `POST`: cadastro um novo produtos.
        - parametros: `name`, `description`, `price`, `sku`, `stock_amount`, `client_id`.
	- `GET: /{id}`: retorna um único produtos.
	- `DELETE: /{id}`: deleta um produtos.
	- `PUT: /{id}`: atualiza os dados de um produtos.
        - parametros: `name`, `description`, `price`, `sku`, `stock_amount`, `client_id`.