# carsdy

Carsdy is a web app that allows one to build flashcards for easy studying! It's currently in development so be patient :/ 

### boring details
Carsdy is built with Laravel 5.7 (PHP) and MySQL. The install guide for Laravel is [here](https://laravel.com/docs/5.7/installation):

0. Install `MySql` and `php` if they are not already installed in your OS.
1. Install [Composer](https://getcomposer.org/) to manage any dependencies.
2. Use `php -m` to check if you cover all the dependencies listed in the guide. If not, well, install them.
3. Run `composer global require laravel/installer` as stated in the guide.
4. Navigate to the repo directory and in the `.env` file configure any values you need to (especially the database).
5. Run `php artisan migrate` to create the database and the tables used.
6. Run `php artisan db:seed` to seed the tables.
7. Run `php artisan serve` to run the app over `artisan`.