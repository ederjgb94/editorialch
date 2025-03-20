# Aplicación de Editorial de Libros

Esta es una aplicación web construida con Laravel para gestionar y mostrar información sobre libros, autores y editoriales.

## 🚀 Características Principales

* **Gestión de Libros:**
    * Agregar, editar y eliminar libros.
    * Visualizar detalles de cada libro (título, autor, sinopsis, etc.).
    * Buscar libros por título, autor o género.
* **Gestión de Autores:**
    * Agregar, editar y eliminar autores.
    * Visualizar detalles de cada autor (nombre, biografía, etc.).
    * Listar libros por autor.
* **Gestión de Editoriales:**
    * Agregar, editar y eliminar editoriales.
    * Visualizar detalles de cada editorial (nombre, dirección, etc.).
    * Listar libros por editorial.
* **Usuarios y Roles:**
    * Sistema de autenticación y autorización.
    * Roles de usuario (administrador, editor, usuario).
    * Control de acceso a funcionalidades según el rol.
* **Interfaz de Usuario:**
    * Diseño responsivo y amigable.
    * Uso de templates para la generación de vistas.
    * Integración con Tailwind CSS para estilos.

## 🔧 Requisitos

* PHP >= 8.0
* Composer
* MySQL o similar
* Node.js y npm
* Vite

## 🛠️ Instalación

1.  **Clonar el repositorio:**

    ```bash
    git clone <URL_del_repositorio>
    cd <nombre_del_proyecto>
    ```

2.  **Instalar dependencias de Composer:**

    ```bash
    composer install
    ```

3.  **Copiar el archivo `.env.example` a `.env` y configurar la base de datos:**

    ```bash
    cp .env.example .env
    ```

    Edita el archivo `.env` y configura las variables de entorno de la base de datos (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD, etc.).

4.  **Generar la clave de la aplicación:**

    ```bash
    php artisan key:generate
    ```

5.  **Ejecutar las migraciones de la base de datos:**

    ```bash
    php artisan migrate
    ```

6.  **(Opcional) Instalar dependencias de npm y compilar activos frontend:**

    ```bash
    npm install
    ```

7.  **Iniciar el servidor de desarrollo:**

    ```bash
    composer run dev
    ```

## 🔧 Configuración

* **Archivo `.env`:** Configura las variables de entorno de la aplicación.
* **Base de datos:** Configura la base de datos y ejecuta las migraciones.
* **Usuarios:** Crea usuarios administradores y asigna roles.

## 📱 Tecnologías Utilizadas

* Laravel
* PHP
* MySQL
* Tailwind Css.

## 🤝 Contribución

Si deseas contribuir a este proyecto, sigue estos pasos:

1.  Haz un fork del repositorio.
2.  Crea una rama con tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3.  Haz commit de tus cambios (`git commit -am 'Añade nueva funcionalidad'`).
4.  Sube a la rama (`git push origin feature/nueva-funcionalidad`).
5.  Abre un Pull Request.

## 📄 Licencia

Este proyecto está bajo la licencia [MIT].

## 📞 Contacto

Eder J. Bravo - [ederjgb94@gmail.com](mailto:ederjgb94@gmail.com)

Ana H. Lara - [analara.stay@gmail.com](mailto:analara.stay@gmail.com)

Enlace del proyecto: [https://github.com/ederjgb94/editorialch](https://github.com/ederjgb94/editorialch)

Enlace del proyecto: [https://github.com/lara5tar/editorialch](https://github.com/lara5tar/editorialch)