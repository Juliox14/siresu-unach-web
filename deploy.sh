#!/bin/bash
set -e

echo "🚀 Iniciando despliegue automatizado en el servidor..."

cd /home/siresu/htdocs_nuevo/siresu-unach-web

# 1. Traer los últimos cambios de la rama main
git pull origin main

# 2. Instalar dependencias de PHP
composer install --no-dev --optimize-autoloader --no-interaction

# 3. Instalar dependencias de JS y compilar Frontend (Vite)
npm install
npm run build

# 4. Correr migraciones del sistema
php artisan migrate --force

# 5. Reconstruir cachés limpias
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ ¡Despliegue completado con éxito en el servidor!"