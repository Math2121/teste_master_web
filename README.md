# Master da Web

## Backend
## Step 1: Clone este repositório

```shell
git clone https://github.com/Math2121/teste_master_web.git
```

## Step 2: Instale as dependências dentro da pasta server

1. Vá até a pasta do projeto

    ```shell
    cd server
    ```

2. Instale as dependências:

    ```shell
    composer install
    ```

## Step 3: Configure a variável de ambiente

1. Cria uma cópia a partir do `.env.example` e chame de `.env`:

    ```shell
    cp .env.example .env
    ```

## Step 4: Gere a chave da aplicação

Rode o seguinte comando:

```shell
php artisan key:generate
```

## Step 5: Execute o projeto e rode as migrations

    Este projeto utiliza laravel sail então execute o seguinte comando para subir a aplicação

```shell
./vendor/bin/sail up -d
```

   	Se preferir pode estar executando o comando docker-compose:
	
```shell
docker-compose up 
```

Para rodar as migrations execute o seguinte comando se quiser utilizar pelo sail também há um comando abaixo

```shell
php artisan migrate

#Sail
./vendor/bin/sail artisan migrate
```



## Front-End
## Step 1: Vá até a pasta web

    ```shell
    cd web
    ```

## Step 2:Instale as dependências

    ```shell
    npm install
    ```


## Step 3:Execute o projeto

    ```shell
    npm run dev
    ```