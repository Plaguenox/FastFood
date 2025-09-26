# 🍔 **FastFood Laravel**

**Sistema de gestión para restaurante de comida rápida**, desarrollado con **Laravel 12**, **Blade** y **Bootstrap 5**.  
Este proyecto fue **adaptado y migrado desde un sistema original en PHP puro**, inspirado en un repositorio de hamburguesería encontrado en GitHub.

---

## 🚀 **Características principales**

- 📦 **Catálogo visual** de productos y extras  
- 🛒 **Carrito de compras** y gestión de pedidos  
- 🧑‍💼 **Panel de administración** con CRUD completo (productos, extras, usuarios)  
- 🗃️ **Migraciones y seeders** para carga inicial de datos  
- 🖼️ **Gestión de imágenes** de productos (subida y visualización)  
- ✅ **Validaciones** de formularios y mensajes de éxito/error  
- 📱 **Diseño moderno y responsivo** para múltiples dispositivos  

---

## 🧩 **Estructura del proyecto**

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/      → Controladores del panel administrativo
│   │   └── Client/     → Controladores del cliente
├── Models/             → Modelos de datos

resources/
├── views/
│   ├── admin/          → Vistas del panel admin
│   └── client/         → Vistas del cliente

database/
├── migrations/         → Migraciones de base de datos
└── seeders/            → Seeders con datos demo

public/images/                      → Imágenes precargadas
storage/app/public/products/       → Imágenes subidas por el administrador
```

## ⚙️ **Instalación y ejecución**

Clona el repositorio:
```bash
git clone https://github.com/usuario/fastfood-laravel.git
```

Instala dependencias:
```bash
composer install
```

Configura tu base de datos en el archivo `.env`

Ejecuta migraciones y seeders:
```bash
php artisan migrate:fresh --seed
```

Crea el enlace simbólico para imágenes:
```bash
php artisan storage:link
```

Inicia el servidor local:
```bash
php artisan serve
```

Accede a la aplicación: [http://localhost:8000](http://localhost:8000)

---

## 👥 **Usuario demo**
| Rol   | Carnet | Contraseña |
|-------|--------|------------|
| Admin | A0001  | admin123   |

---

## 🧠 **Justificación técnica**
Este proyecto fue migrado desde una base en PHP puro para aplicar buenas prácticas modernas con Laravel.  
Se eligió Laravel por su estructura MVC, facilidad de mantenimiento, y robustez en validaciones, seguridad y escalabilidad. Se utilizaron componentes como:

- **Blade** para vistas dinámicas
- **Eloquent** como ORM
- **Bootstrap 5** para una interfaz limpia y responsiva

---

## 🧑‍💻 **Créditos**
Desarrollado por: [Alexis] Año: 2025 Materia: Tecnología Web II
