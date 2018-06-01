1-composer install
2-php artisan key:generate
3- edit .env 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud
    DB_USERNAME=homestead
    DB_PASSWORD=secret
4-php artisan migrate
5-php artisan serve