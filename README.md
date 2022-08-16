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

# [Para baixar na máquina mongodb seguir essa docs](mongodb.com/docs/manual/tutorial/install-mongodb-on-ubuntu/) 
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
        'dns' => env('DB_URI', 'mongodb+srv://Leonardo_Paylivre:<password>@cluster0.q4ecgjs.mongodb.net/?retryWrites=true&w=majority'),
        'database' => 'database_name_in_clound_mongo'
    ]
```

# config/app.php
```php
// dentro providers
Jenssegers\Mongodb\MongodbServiceProvider::class,
```

