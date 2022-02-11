# Academic Student Management System for Subic Bay Colleges, Inc.

# Get Started 
There are two ways of installing the system. Better use with [Docker].

## How to install ?
The following are the steps on how to install the system.

Alternative installation is possible without local dependencies relying on [Docker].

Clone the repository
```
git clone https://github.com/Mikee-Angelo/asms.git
```

Switch to the extracted repo folder
```
cd asms-main
```

Install all the dependencies using composer. __Better to install__ [composer](https://getcomposer.org/download/)
```
composer install
```

Copy `.env.example` and rename to `.env` manually or you can use this command.
```
cp .env.example .env
```

After copying fillup the following important parameters found in `.env`
```
DB_HOST=127.0.0.1 or localhost
DB_DATABASE=NAME_OF_YOUR_DATABASE
DB_USERNAME=DB_SERVER_USERNAME
DB_PASSWORD=DB_SERVER_PASSWORD
```

Generate new application key 
```
php artisan key:generate
```

Publish `laravel-permission` for roles and permission function 
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Clear config cache 
```
php artisan optimize:clear
or 
php artisan config:clear
```

Run the database migration (__Always check you configuration of database on your .env file to prevent error when migrating__)
```
php artisan migrate
```

Lastly, run the server then you can open http://localhost:8000
```
php artisan serve
```

## Database Seeding
__Populate the database with the seed data which includes the default account of the super admin and the default roles of the system__

Open database seeder `DatabaseSeeder` and set the property values as per your requirement. You can also change the default account credentials of the Super Admin.
```
database/seeders/DatabaseSeeders.php
```

Run the database seeder command
```
php artisan db:seed
```

__*Note*__: It's recommended to clean first your database before seeding. Refresh your database by using this command
```
php artisan migrate:refresh
```

## Docker
This is my recommended way of installing so you will not install all the required tools. Just download [Docker](https://www.docker.com/products/docker-desktop)

Run the following commands: 
```
git clone https://github.com/Mikee-Angelo/asms.git
cd asms
cp .env.example .env #follow changing of parameter in option 1
create "mysql" folder and add "data" folder inside it
docker-compose up -d
docker-compose run --rm composer install
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
docker-compose exec php php  artisan optimize:clear or docker-compose exec php php artisan config:clear
docker-compose exec php php artisan migrate
```
The api can be accessed at http://localhost:8000

#### Good luck, Cheers !!!
