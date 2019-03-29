
## Crypto Chart
Laravel + React
chart of crypto currencies

## Install manual
cp .env.example .env

add database connection credentials to .env

php artisan key:generate

cd storage

mkdir framework

cd framework

mkdir cache

mkdir sessions

mkdir views

cd ../../
 
composer install

php artisan migrate

php artisan db:seed

npm install

npm run dev
