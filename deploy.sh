#!/bin/bash
set -euo pipefail

echo "Iniciando despliegue manual en htdocs_nuevo..."

DESTINO="/home/siresu/htdocs_nuevo"
echo "Ruta de Destino (Web): $DESTINO"

# 1. Entrar a la carpeta del proyecto
cd "$DESTINO"

# 2. Descargar los últimos cambios desde GitHub usando Git
echo "Descargando ultimos cambios desde el repositorio de GitHub..."
git pull origin main

# 3. Validar que el archivo de entorno exista
if [ ! -f .env ]; then
    echo "ERROR: No se encontro el archivo .env en $DESTINO."
    echo "Por favor, crealo manualmente por SSH en la raiz antes de continuar."
    exit 1
fi

# 4. Instalar dependencias de Composer optimizando la RAM
echo "Instalando dependencias PHP en servidor destino..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-progress --no-scripts

# 5. Correr migraciones de Base de Datos si las hay
echo "Ejecutando migraciones..."
php artisan migrate --force

# 6. Limpiar y cachear la configuración de Laravel
echo "Limpiando/cacheando configuracion..."
php artisan optimize:clear
php artisan config:cache

# 7. Regenerar el acceso directo al almacenamiento (Storage Link)
echo "Actualizando enlace simbolico de almacenamiento..."
rm -f public/storage
php artisan storage:link --no-interaction

echo "¡Despliegue manual completado con exito!"