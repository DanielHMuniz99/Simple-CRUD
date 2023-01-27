# Simple CRUD

A simple crud App with Laravel 5.5.

## Installation

Clone the repository-
```
git clone 
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Edit `.env` file with your database server

Do a database migration
```
php artisan migrate
```

Run the seeders command to insert the data into the tables
```
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=UserSeeder
```

Generate the Key
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```