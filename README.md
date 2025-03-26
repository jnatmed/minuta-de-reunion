# 📄 Sistema de Minutas de Reunión

Este proyecto permite registrar, listar, ver, editar y exportar minutas de reunión de manera estructurada. Ideal para equipos de trabajo que necesitan dejar registro formal de reuniones, decisiones y asistentes.

---

## 🚀 Requisitos

- PHP 8.0 o superior
- Composer
- MySQL o MariaDB
- Servidor local (ej: Apache, Nginx o PHP built-in server)

---

## 🔧 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/minuta-de-reunion.git
cd minuta-de-reunion

composer update

```
#### Copiar y pegar el archivo datos-conexion_copy.php, y editarlos con los datos de la conexion. 

```php

$servername = 'localhost';
$host       = 'localhost';
$dbname     = 'informatica_db';
$username   = 'root';
$password   = '';

```

#### ⚙️ Estructura del proyecto

📁 assets/                # Archivos estáticos (CSS, JS, imágenes)
📁 views/                 # Vistas HTML/Twig
📁 controllers/           # Lógica de control (ej: MinutaController.php)
📁 models/                # Lógica de base de datos (ej: MinutaModel.php)
📁 parts/                 # Partes comunes (header, footer, nav)
📁 minutas/               # Archivos PDF o documentos adjuntos
📄 index.php              # Punto de entrada
📄 datos-conexion.php     # Configuración de conexión a la BD
📄 composer.json          # Dependencias de Composer
