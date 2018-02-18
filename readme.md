## Description

This repository is a fresh installation of laravel 5.5 with passport integration.
It aims to support multi-model passport authentication

## Installation

Clone and download the repository
```
git clone https://github.com/islem-kms/l5-passport-multiauth-test.git
```
Copy .env.example
```
cp .env.example .env
```
Then
```
composer update
```
Make a new app key
```
php artisan key:generate
```
Edit .env file 
```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=homestead
```
Run the migration
```
php artisan migrate
```
This command generates the encryption keys Passport needs in order to generate access token. The generated keys are not typically kept in source control
```
php artisan passport:keys
```
Before your application can issue tokens via the password grant, you will need to create a password grant client.
```
php artisan passport:client --password
```
Edit BaseApiController.php to set the path to your directory and then run:
```
php artisan l5-swagger:generate
```