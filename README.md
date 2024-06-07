# Academia Cartabón 

Bienvenido a Academia Cartabón, donde la calidad y la formación han sido nuestra pasión desde 1994.

## Demostración

¡Explora nuestra plataforma ahora mismo! Visita la demostración en vivo de Academia Cartabón [aquí](https://academia.carlosmaroto-daweb.com).

- **Usuario Admin**: admin@admin.com
- **Contraseña**: Admin123.

### Acceso a la Base de Datos

Para acceder a la base de datos a través de phpMyAdmin, dirígete [aquí](https://academia.carlosmaroto-daweb.com/phpmyadmin).

- **Usuario Admin**: admin
- **Contraseña**: admin

### Tecnologías Utilizadas

- PHP con arquitectura MVC
- HTML
- CSS
- JavaScript
- JQuery
- AJAX
- JSON
- Summernote
- Html2canvas
- Bootstrap
- Modelado Base de Datos
- MySQL
- phpMyAdmin
- Infraestructura LAMP
- Docker para contenerización
- Docker Compose para despliegue en local
- Implementación continua y entrega continua (CI/CD) con GitHub Actions
- Proxy inverso Nginx
- Uso de EC2 de AWS para alojamiento

## Dibujo Técnico Online

### Sobre Nuestros Cursos

En Academia Cartabón nos comprometemos a ofrecer cursos de dibujo técnico actualizados y detallados, utilizando materiales de alta calidad para mejorar la comprensión y dominio de las asignaturas.

### Excelencia Académica

- **Accesibilidad y Flexibilidad**: Ofrecemos cursos accesibles en línea para estudiantes de todas partes, en cualquier momento y dispositivo.
- **Apoyo Integral**: Brindamos clases en vivo y tutorías individuales con profesores expertos para garantizar el éxito académico de cada estudiante.
- **Innovación Continua**: Nos actualizamos constantemente para liderar en educación en línea, adaptándonos a las cambiantes necesidades del dibujo técnico y los estudiantes.

### Características Principales:

- **Roles de Usuario**: La plataforma cuenta con diferentes roles de usuario, incluyendo administrador, secretaría, profesor y estudiante. Cada uno tiene acceso a funciones específicas, con el administrador teniendo control total sobre la plataforma.

- **Áreas Privadas**:
  - **Alumnos**: Los alumnos tienen acceso a una parte privada donde pueden ver los cursos en los que están matriculados, así como acceder al contenido completo de dichos cursos. También pueden configurar su perfil personal.
  - **Secretaría**: La secretaría tiene acceso a herramientas para la creación de cursos, la gestión de la matrícula de alumnos y otras funciones administrativas.
  - **Administración**: La administración tiene acceso a la gestión de todas las cuentas registradas en la plataforma, brindando un control completo sobre los usuarios y sus permisos.

## Estructura de Archivos

- **dump/**: Carpeta que contiene archivos SQL como copia de seguridad de los datos de la base de datos.
- **www/**: Directorio principal que contiene todos los archivos y carpetas necesarios para la funcionalidad de la página web.
  - **config/**: Carpeta que contiene variables del sistema y gestión de sesiones.
  - **controller/**: Carpeta que contiene los controladores del patrón MVC.
  - **model/**: Carpeta que contiene los modelos del patrón MVC.
  - **view/**: Carpeta que contiene las vistas del patrón MVC.
  - **index.php**: Archivo PHP que redirige todas las llamadas al controlador del patrón MVC.
- **.github/workflows/**: Directorio que contiene los flujos de trabajo de GitHub Actions.
- **docker-compose.yml**: Archivo YAML que define la configuración para desplegar el contenedor en local.
- **Dockerfile_db**: Archivo que define la configuración para crear la imagen de MySQL con los archivos de copia de seguridad.
- **Dockerfile_www**: Archivo que define la configuración para crear la imagen de PHP con los programas necesarios y características, incluyendo los archivos de la carpeta www.

## Autor

- Desarrollador: [Carlos Maroto](https://github.com/carlosmaroto-daweb)

## Mi web

¿Quieres ver más proyectos? Visita mi página web [aquí](https://www.carlosmaroto-daweb.com).
