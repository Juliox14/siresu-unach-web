#!/bin/bash
set -e

echo "🚀 Iniciando despliegue automatizado blindado..."

# 1. Forzar rutas absolutas usando la variable nativa de GitHub Actions
# Si la variable está vacía (por si acaso corres el script a mano), usa el pwd
ORIGEN="${GITHUB_WORKSPACE:-$(pwd)}"
DESTINO="/home/siresu/htdocs_nuevo/siresu-unach-web"

echo "📂 Ruta de Origen (Runner): $ORIGEN"
echo "📂 Ruta de Destino (Web): $DESTINO"

echo "📦 Sincronizando archivos hacia la carpeta web de producción..."
mkdir -p "$DESTINO"

# Sincronización limpia: copia todo, mantiene permisos, excluye entornos locales
rsync -avz --delete --exclude='.git' --exclude='.env' --exclude='storage' "$ORIGEN/" "$DESTINO/"

# 2. Entrar formalmente a la carpeta web para levantar Laravel
cd "$DESTINO"

# 3. Asegurar que el .env de producción esté en su lugar
if [ ! -f .env ]; then
    echo "❌ ERROR: No se encontró el archivo .env en $DESTINO."
    echo "Por favor, créalo manualmente por SSH antes de continuar."
    exit 1
fi

# 4. Instalar dependencias directamente en la carpeta destino
composer install --no-dev --optimize-autoloader --no-interaction

# 5. Correr migraciones del sistema
php artisan migrate --force

# 6. Reconstruir cachés limpias
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ ¡Despliegue completado con éxito en la ruta física!"