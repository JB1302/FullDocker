# 🐳 Sistema de Reservas con PHP, MySQL y Docker

Proyecto de gestión de **reservas** desarrollado en **PHP 8.2** con **MySQL 8** y **phpMyAdmin**, completamente **dockerizado** y funcional para desarrollo local.

---

## 🚀 Características principales

- Backend en **PHP 8.2 con Apache**  
- Conexión a base de datos MySQL mediante **PDO**  
- Hasheo de contraseñas con `password_hash()`  
- API sencilla con **GET** y **POST** (para consultar y actualizar)  
- Interfaz minimalista construida con **Bootstrap 5**  
- Contenedor adicional con **phpMyAdmin** para gestión visual de la base de datos  

---

## 🧩 Estructura del proyecto

```
FullDocker/
│
├── app/
│   ├── config/
│   │   └── database.php         # Conexión PDO a MySQL
│   ├── controllers/
│   │   └── reservaController.php # Controlador principal (GET/POST)
│   ├── models/
│   │   └── reserva.php          # Lógica CRUD de reservas
│   ├── public/
│   │   └── js/
│   │       └── script.js        # Lógica de búsqueda y actualización (fetch API)
│   ├── views/
│   │   ├── formulario.php       # Formulario principal
│   │   └── layout.php           # Plantilla base
│   └── index.php                # Página principal
│
├── Dockerfile                   # Imagen PHP personalizada
├── docker-compose.yml            # Definición de servicios
└── README.md                    # Este archivo 😎
```

---

## ⚙️ Configuración de Docker

### **Dockerfile**
```dockerfile
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql     && a2enmod rewrite

WORKDIR /var/www/html
EXPOSE 80
```

### **docker-compose.yml**
```yaml
version: "3.8"

services:
  web:
    build: .
    container_name: reservasWeb
    ports:
      - "8080:80"
    volumes:
      - ./app:/var/www/html
    depends_on:
      - db

  db:
    image: mysql:8.0
    container_name: reservasSQL
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: appdb
      MYSQL_USER: appuser
      MYSQL_PASSWORD: apppass
    volumes:
      - db_data:/var/lib/mysql
    ports:
      - "3308:3306"

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: phpReservas
    depends_on:
      - db
    environment:
      PMA_HOST: db
      PMA_USER: appuser
      PMA_PASSWORD: apppass
    ports:
      - "8081:80"

volumes:
  db_data:
```

---

## 🧠 Lógica de la aplicación

### 1. **Búsqueda de reservas**
`GET /controllers/reservaController.php?id={id}`  
→ Devuelve los datos de la reserva en formato JSON.

### 2. **Actualización de clave**
`POST /controllers/reservaController.php`  
Cuerpo:
```
id=1
action=update
clave=1234
```
→ Actualiza la clave (se guarda **hasheada** en la base de datos).

---

## 🧱 Dependencias principales
- PHP 8.2 (Apache)
- MySQL 8.0
- phpMyAdmin
- Bootstrap 5
- Fetch API (nativa JS)

---

## 👤 Autor
**Jonathan Barrantes**  
Proyecto: *FullDocker – Sistema CRUD de Reservas*  
📍 *Desarrollado en Costa Rica* 🇨🇷  

---

## 🐙 GitHub
[🔗 Repositorio oficial](https://github.com/JB1302/FullDocker)
