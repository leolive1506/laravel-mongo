# [Para baixar na máquina mongodb seguir essa docs](mongodb.com/docs/manual/tutorial/install-mongodb-on-ubuntu/) 

# Usado para esse test
- Extensão php para utilizar mongo
- Php 8.1
- Laravel 9

# Extensão php
```sh
sudo pecl install mongodb
sudo vim /etc/php/8.1/cli/php.ini

# dentro arquivo add
extension=mongodb.so
```

# Instalações dentro do projeto
```sh
composer require jenssegers/mongodb
```

# Configurações dentro do projeto
- config/app.php
```php
// dentro providers
Jenssegers\Mongodb\MongodbServiceProvider::class,
```

- config/database.php
```php
'mongodb' => [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', '127.0.0.1'),
//            27017 -> porta padrão mongodb
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE', 'your_database'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'options' => [
                // here you can pass more settings to the Mongo Driver Manager
                // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use

                'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
            ],
        ],
```

- env
```dotenv 
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=your_database
DB_USERNAME=
DB_PASSWORD=
```

- env.testing
  - Database somente para teste com propósito de não afetar app principal
```dotenv
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=your_database_test
DB_USERNAME=
DB_PASSWORD=
``

# Dicas mongodb
```sh
# acessar terminal
mongosh

# se existir usa ela, se não cria
use databasename

# ver qual banco estamos conectado
db

# listar colecções
show dbs

# help
help

# criar uma collection e inserir dados
db.nome_collection.insert(
    {
        "nome": "Leonardo",
        "email": "leonardo.santana@paylivre.com"
    }
)

# listar documentos
db.pessoas.find()
```


# OBS
- Para rodar os teste via interface phpStorm, necessário configurar o template de teste no projeto
