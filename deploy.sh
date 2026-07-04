#!/bin/bash
set -e

echo "Iniciando despliegue automatizado directo en htdocs_nuevo..."

ORIGEN="${GITHUB_WORKSPACE:-$(pwd)}"
DESTINO="/home/siresu/htdocs_nuevo"

echo "Ruta de Origen (Runner): $ORIGEN"
echo "Ruta de Destino (Web): $DESTINO"

echo "Sincronizando archivos hacia la raíz web de producción..."
mkdir -p "$DESTINO"

rsync -avz --delete --exclude='.git' --exclude='.env' --exclude='storage' --exclude='public/storage' "$ORIGEN/" "$DESTINO/"

cd "$DESTINO"

if [ ! -f .env ]; then
    echo "ERROR: No se encontró el archivo .env en $DESTINO."
    echo "Por favor, créalo manualmente por SSH en la raíz de htdocs_nuevo antes de continuar."
    exit 1
fi

composer install --no-dev --optimize-autoloader --no-interaction

php artisan migrate --force

php artisan storage:link

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs

php artisan view:clear

php artisan config:cache
php artisan route:clear
php artisan storage:link --force

echo "¡Despliegue completado con éxito en la raíz asignada!"