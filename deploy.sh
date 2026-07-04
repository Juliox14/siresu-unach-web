#!/bin/bash
set -e

echo "Iniciando despliegue automatizado..."

cd /home/siresu/htdocs_nuevo/siresu-unach-web

composer install --no-dev --optimize-autoloader --no-interaction

php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Despliegue completado exitosamente."