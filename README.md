# SIRESU - Portal de Gestión Universitaria 🏛️

Este es el sistema central de gestión para la **Secretaría de Identidad y Responsabilidad Social Universitaria (SIRESU)** de la **UNACH**. Desarrollado por Julián Antonio Castro Alonso como parte del servicio social y fortalecimiento tecnológico institucional.

## 🚀 Sobre el Proyecto
La plataforma permite la administración eficiente de contenidos informativos y procesos internos, segmentados por departamentos académicos y administrativos.

### Módulos Principales:
* **Gestión de Convocatorias:** Publicación de becas y apoyos con filtrado por departamento.
* **Eventos y Noticias:** Calendario de actividades institucionales y boletines informativos.
* **Instalaciones:** Catálogo de espacios universitarios y deportivos.
* **Control de Acceso (RBAC):** Sistema de roles y permisos avanzado con Filament Shield.
* **Multitenancy por Departamento:** Los editores solo gestionan el contenido perteneciente a su área asignada.

## 🛠️ Stack Tecnológico
* **Framework:** [Laravel 11+](https://laravel.com)
* **Panel Administrativo:** [Filament v3](https://filamentphp.com)
* **Estilos:** Tailwind CSS
* **Base de Datos:** MySQL
* **Gestión de Permisos:** Filament Shield (Spatie Permissions)