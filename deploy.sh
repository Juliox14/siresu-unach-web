#!/bin/bash
set -e

echo "🚀 Iniciando despliegue automatizado directo en htdocs_nuevo..."

# 1. Definir rutas absolutas (Cambiamos el destino a la raíz de htdocs_nuevo)
ORIGEN="${GITHUB_WORKSPACE:-$(pwd)}"
DESTINO="/home/siresu/htdocs_nuevo"

echo "📂 Ruta de Origen (Runner): $ORIGEN"
echo "📂 Ruta de Destino (Web): $DESTINO"

echo "📦 Sincronizando archivos hacia la raíz web de producción..."
mkdir -p "$DESTINO"

# Sincronizamos directamente sobre htdocs_nuevo.
# El flag --delete limpiará la subcarpeta vieja si quedó ahí colgada.
rsync -avz --delete --exclude='.git' --exclude='.env' --exclude='storage' "$ORIGEN/" "$DESTINO/"

# 2. Movernos a la carpeta de producción
cd "$DESTINO"

# 3. Asegurar el archivo .env de producción
if [ ! -f .env ]; then
    echo "❌ ERROR: No se encontró el archivo .env en $DESTINO."
    echo "Por favor, créalo manualmente por SSH en la raíz de htdocs_nuevo antes de continuar."
    exit 1
fi

# 4. Instalar dependencias directamente en la raíz de htdocs_nuevo
composer install --no-dev --optimize-autoloader --no-interaction

# 5. Correr migraciones del sistema
php artisan migrate --force

# 5.1 Crear enlace simbólico de almacenamiento publico
php artisan storage:link

# 6. Reconstruir cachés limpias
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ ¡Despliegue completado con éxito en la raíz asignada!"