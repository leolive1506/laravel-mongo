# [Para baixar na máquina mongodb seguir essa docs](mongodb.com/docs/manual/tutorial/install-mongodb-on-ubuntu/) 

# install terminal
```sh
# install extension
sudo pecl install mongodb

# ir até
sudo vim /etc/php/8.1/cli/php.ini  
# add
extension=mongodb.so

# dentro app laravel
composer require jenssegers/mongodb
```

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


# config/database.php
```php
       'mongodb' => [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE', 'postsmongo'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'options' => [
                // here you can pass more settings to the Mongo Driver Manager
                // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use

                'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
            ],
        ],

    #env
    DB_CONNECTION=mongodb
    DB_HOST=127.0.0.1
    DB_PORT=27017
    DB_DATABASE=postsmongo
    DB_USERNAME=
    DB_PASSWORD=
```

# config/app.php
```php
// dentro providers
Jenssegers\Mongodb\MongodbServiceProvider::class,
```
