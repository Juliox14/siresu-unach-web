#!/bin/bash
set -euo pipefail

echo "Iniciando despliegue manual en htdocs_nuevo..."

DESTINO="/home/siresu/htdocs_nuevo"
echo "Ruta de Destino (Web): $DESTINO"

cd "$DESTINO"

echo "Descargando ultimos cambios desde el repositorio de GitHub..."
git pull origin main

if [ ! -f .env ]; then
    echo "ERROR: No se encontro el archivo .env en $DESTINO."
    echo "Por favor, crealo manualmente por SSH en la raiz antes de continuar."
    exit 1
fi

echo "Instalando dependencias PHP en servidor destino..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress --no-scripts

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Limpiando/cacheando configuracion..."
php artisan optimize:clear
php artisan config:cache

echo "Actualizando enlace simbolico de almacenamiento..."
rm -f public/storage
php artisan storage:link --no-interaction

echo "¡Despliegue manual completado con exito!"