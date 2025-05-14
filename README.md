# Test Decameron - Backend

**Test Decameron** es una solución web diseñada para optimizar la administración de hoteles afiliados a la compañía. La plataforma permite gestionar hoteles, registrar información fiscal y operativa, así como configurar los distintos tipos de habitaciones junto con sus respectivas acomodaciones, garantizando el cumplimiento de las políticas de negocio establecidas.

---

## Funcionalidades Clave

-   Gestión integral de hoteles, incluyendo:
    -   Datos generales
    -   Información tributaria
-   Administración jerarquizada de categorías de habitaciones:
    -   Estándar
    -   Junior
    -   Suite
-   Definición de acomodaciones por categoría:
    -   **Estándar** → Sencilla, Doble
    -   **Junior** → Triple, Cuádruple
    -   **Suite** → Sencilla, Doble, Triple
-   Validaciones automáticas para asegurar la integridad de datos y coherencia operativa

---

## Rutas del Proyecto

### Hoteles

-   `GET /api/hoteles` - Listar todos los hoteles.
-   `POST /api/hoteles` - Crear un nuevo hotel.
-   `GET /api/hoteles/{hotel}` - Mostrar un hotel específico.
-   `PUT /api/hoteles/actualizar/{id}` - Actualizar un hotel.
-   `DELETE /api/hoteles/eliminar/{id}` - Eliminar un hotel.

### Habitaciones

-   `GET /api/habitaciones/{hotel}` - Listar habitaciones de un hotel.
-   `POST /api/habitaciones/{hotel}` - Crear una nueva habitación.
-   `GET /api/habitaciones/{hotel}/filtrar-id/{id}` - Mostrar una habitación específica.
-   `PUT /api/habitaciones/{hotel}/actualizar/{id}` - Actualizar una habitación.
-   `DELETE /api/habitaciones/{hotel}/eliminar/{id}` - Eliminar una habitación.

### Acomodaciones

-   `GET /api/acomodaciones/{hotel}` - Listar acomodaciones de un hotel.
-   `POST /api/acomodaciones/{hotel}` - Crear una nueva acomodación.
-   `GET /api/acomodaciones/{hotel}/filtrar-id/{id}` - Mostrar una acomodación específica.
-   `PUT /api/acomodaciones/{hotel}/actualizar/{id}` - Actualizar una acomodación.
-   `DELETE /api/acomodaciones/{hotel}/eliminar/{id}` - Eliminar una acomodación.

### Tipos de Habitaciones

-   `GET /api/tipo-habitaciones/{hotel}` - Listar tipos de habitaciones de un hotel.
-   `POST /api/tipo-habitaciones/{hotel}` - Crear un nuevo tipo de habitación.
-   `GET /api/tipo-habitaciones/{hotel}/filtrar-id/{id}` - Mostrar un tipo de habitación específico.
-   `PUT /api/tipo-habitaciones/{hotel}/actualizar/{id}` - Actualizar un tipo de habitación.
-   `DELETE /api/tipo-habitaciones/{hotel}/eliminar/{id}` - Eliminar un tipo de habitación.

---

## Estructura del proyecto

El proyecto sigue el enfoque de **Atomic Design**, lo que significa que los componentes están organizados en niveles jerárquicos:

1. **Atoms**: Componentes básicos e independientes (botones, inputs, etc.).
2. **Molecules**: Combinaciones de átomos que forman bloques funcionales.
3. **Organisms**: Componentes más complejos que combinan moléculas y átomos.
4. **Pages**: Vistas completas que representan pantallas de la aplicación.

Si deseas explorar la estructura completa de carpetas y archivos, puedes hacerlo en el siguiente enlace:  
[Ver estructura del proyecto](https://gitingest.com/freiman-uribe/Front-hotel-React)

---

## Proceso de Instalación

La arquitectura del sistema está compuesta por:
**Backend (Laravel en su ultima version -> 12 + PostgreSQL)**.

---

### Requisitos Previos

Antes de iniciar, asegúrese de contar con las siguientes dependencias instaladas en su entorno:

-   PHP (versión 8 o superior)
-   Composer
-   PostgreSQL
-   Laravel Installer (`composer global require laravel/installer`)

---

### Clonación del Repositorio

```bash
git clone https://github.com/freiman-uribe/Back-hotel-laravel
```

---

## Backend – Laravel

Ubicación: `back-hotel-laravel`

```bash
cd back-hotel-laravel
composer install          # Instala dependencias de Laravel
cp .env.example .env      # Crea el archivo de entorno
php artisan key:generate  # Genera la APP_KEY
```

---

### Configuración de la base de datos (PostgreSQL)

Edita el archivo `.env`:

```env
DB_CONNECTION=pgsql     # PostgreSQL
DB_HOST=127.0.0.1       # Host de la base de datos
DB_PORT=5432            # Puerto de la base de datos
DB_DATABASE=nombre      # Nombre de la base de datos
DB_USERNAME=usuario     # Usuario de la base de datos
DB_PASSWORD=contraseña  # Contraseña de la base de datos
```

---

### Migraciones de base de datos

```bash
php artisan migrate
```

---

### Iniciar el servidor

```bash
php artisan serve
```

---

## Tecnologías Utilizadas

-   **Backend**: Laravel, PHP, PostgreSQL
-   **Herramientas**: Composer, Artisan

---

## Contribuciones

Desarrollado por **Freiman Uribe** como parte de un test técnico para Decameron.

## App desplegada

Abre [Back](https://back-hotel-laravel-production.up.railway.app/api/) en tu navegador para ver la aplicación.
