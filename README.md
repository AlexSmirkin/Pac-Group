## Запуск проекта

После скачивания репозитория выполните команду(версия php 8.2 и выше):
composer install

Далее выполните команду для запуска Docker контейнера:
./vendor/bin/sail up

Затем зайдите в в контейнер:
docker exec -ti pac-group-laravel.test-1 /bin/bash

И запустите миграции:
php artisan migrate

Откройте сайт по адресу:
http://0.0.0.0/
