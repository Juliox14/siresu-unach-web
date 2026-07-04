#!/bin/bash
set -euo pipefail

echo "Iniciando despliegue automatizado directo en htdocs_nuevo..."

ORIGEN="${GITHUB_WORKSPACE:-$(pwd)}"
DESTINO="/home/siresu/htdocs_nuevo"

echo "Ruta de Origen (Runner): $ORIGEN"
echo "Ruta de Destino (Web): $DESTINO"

echo "Sincronizando archivos hacia la raíz web de producción..."
mkdir -p "$DESTINO"

rsync -avz --delete \
  --exclude='.git' \
  --exclude='.github' \
  --exclude='.env' \
  --exclude='vendor' \
  --exclude='node_modules' \
  --exclude='storage' \
  --exclude='public/storage' \
  --exclude='.DS_Store' \
  "$ORIGEN/" "$DESTINO/"

cd "$DESTINO"

if [ ! -f .env ]; then
    echo "ERROR: No se encontró el archivo .env en $DESTINO."
    echo "Por favor, créalo manualmente por SSH en la raíz de htdocs_nuevo antes de continuar."
    exit 1
fi

echo "Instalando dependencias PHP en servidor destino..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Limpiando/cacheando configuración..."
php artisan optimize:clear
php artisan config:cache
php artisan route:clear
php artisan view:clear

rm -f public/storage
php artisan storage:link --no-interaction

echo "Despliegue completado con éxito en la raíz asignada!"