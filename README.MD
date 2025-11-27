docker-compose up -d --build

docker compose exec app bash
docker exec -it ne_afisha_node sh

composer install
npm install
npm run dev

docker compose exec app bash

cp .env.example .env

php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan key:generate
php artisan storage:link
php artisan migrate

переделать категории
