# Rutinas Gimnàs — Aplicació Web Laravel

---

## Usuaris per defecte

| Rol | Email | Contrasenya |
|-----|-------|-------------|
| Admin | admin@admin.cat | admin1234 |
| Client | Regístrate en /register | — |

---

## Opción 1 — Instalación con Docker (Recomendada)

> No necesitas tener PHP, MySQL ni Composer instalados. Solo Docker.

### Requisitos
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo

### Pasos

**1. Clonar el repositorio**
```bash
git clone https://github.com/adil-zero-one/rutinas-gimnasio.git
cd rutinas_gimnas
```

**2. Levantar los contenedores**
```bash
docker-compose up -d --build
```
Espera a que termine. La primera vez tarda unos minutos porque descarga las imágenes.

**3. Instalar dependencias**
```bash
docker-compose exec app composer install
```

**4. Permisos y caché**
```bash
docker-compose exec app chmod -R 777 storage bootstrap/cache
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
```

**5. Enlace de almacenamiento**
```bash
docker-compose exec app php artisan storage:link
```

**6. Abrir en el navegador**
```
http://localhost:8000
```

> La base de datos ya viene importada en `database.sql` y se carga automáticamente al levantar Docker. No necesitas ejecutar migraciones.

### Parar los contenedores
```bash
docker-compose down
```

### Parar y borrar la base de datos (reset completo)
```bash
docker-compose down -v
```

---

## Opción 2 — Instalación local con Laragon/XAMPP

### Requisitos
- PHP 8.4+
- Composer
- MySQL
- Laragon o XAMPP

### Pasos

**1. Clonar el repositorio**
```bash
git clone https://github.com/adil-zero-one/rutinas-gimnasio.git
cd rutinas_gimnas
```

**2. Instalar dependencias**
```bash
composer install
```

**3. Copiar el fichero de entorno**
```bash
cp .env.example .env
```

**4. Generar la clave de la aplicación**
```bash
php artisan key:generate
```

**5. Configurar la base de datos**

Edita el fichero `.env` con tus credenciales locales:
```env
DB_HOST=127.0.0.1
DB_DATABASE=rutinas_gimnas
DB_USERNAME=root
DB_PASSWORD=
```

**6. Importar la base de datos**

Abre phpMyAdmin, crea una base de datos llamada `rutinas_gimnas` e importa el fichero `database.sql`.

**IMPORTANTE**
(SI NO USAIS LA BD TENDREIS OBLIGATORIAMENTE USAR LA COMANDA SEGUIENTE)
O si prefieres usar las migraciones y seeders:
```bash
php artisan migrate:fresh --seed
```

**7. Enlace de almacenamiento**
```bash
php artisan storage:link
```

**8. Iniciar el servidor**
```bash
php artisan serve
```

Abre `http://localhost:8000` en el navegador.

---

## Estructura del proyecto

```
rutinas_gimnas/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controladores
│   │   └── Middleware/       # AsegurarAdminIsValid, SoloCliente
│   └── Models/               # User, Client, Rutina, Exercici, Categoria
├── database/
│   ├── migrations/           # Estructura de la base de datos
│   └── seeders/              # Admin + Categorias seeders
├── resources/views/          # Vistas Blade
├── routes/web.php            # Rutas de la aplicación
├── Dockerfile                # Configuración PHP para Docker
├── docker-compose.yml        # Orquestación de contenedores
├── nginx.conf                # Configuración del servidor web
├── database.sql              # Base de datos exportada
└── .env.docker               # Variables de entorno para Docker
```

---

## Funcionalidades

### Administrador (`admin@admin.cat`)
- Gestionar categorías (crear, editar, eliminar, imagen)
- Gestionar ejercicios (crear, editar, eliminar, imagen)
- Ver todas las rutinas de los clientes

### Cliente (usuario registrado)
- Registrarse con DNI, fecha de nacimiento y teléfono
- Ver categorías y ejercicios del gimnàs
- Crear, editar y eliminar sus propias rutinas
- Añadir ejercicios a las rutinas con series y repeticiones
- Ver el detalle de cada rutina

---

## Tecnologías utilizadas

- **Laravel 13** — Framework PHP
- **MySQL 8** — Base de datos
- **Bootstrap 5** — Diseño y estilos
- **Laravel Breeze** — Autenticación
- **Docker + Nginx** — Contenerización
- **PHP 8.4** — Lenguaje de programación
