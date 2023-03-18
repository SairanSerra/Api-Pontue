#!/bin/sh

cd /app/api-pontue
php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=8080