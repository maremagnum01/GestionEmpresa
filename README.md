# Sistema de Gestión de Empleados

## 📋 Descripción
Sistema CRUD (Create, Read, Update, Delete) desarrollado con PHP puro para la gestión de registros de empleados. Este proyecto implementa funcionalidades básicas de administración de personal, incluyendo autenticación de usuarios y gestión de perfiles.

## 🚀 Características Principales
- Sistema de autenticación (Login/Registro/Logout)
- Gestión completa de empleados (Crear, Leer, Actualizar, Eliminar)
- Buscador en tiempo real con AJAX
- Sistema de paginación
- Gestión de imágenes de perfil
- Interfaz responsive con Bootstrap

## 🛠️ Tecnologías Utilizadas
- PHP (Backend)
- HTML5 (Estructura)
- Bootstrap (Diseño y Componentes)
- jQuery (Interactividad y AJAX)
- MySQL (Base de datos)

## 📁 Estructura del Proyecto
```
GestionEmpresa/
├── Empleados/
│   ├── empleados.php      # Lógica de gestión de empleados
│   ├── loginback.php      # Procesamiento de login
│   ├── logout.php         # Cierre de sesión
│   └── registroback.php   # Procesamiento de registro
├── Imagenes/              # Almacenamiento de fotos de perfil
├── index.php              # Página principal
├── jquery.js             # Funcionalidades JavaScript
└── icono.svg             # Recursos gráficos
```

## 💡 Características Detalladas
- **Página Principal (index.php)**:
  - Visualización de lista de empleados
  - Modales para login y registro
  - Modal para agregar nuevos registros
  - Buscador en tiempo real
  - Sistema de paginación

- **Sistema de Usuarios**:
  - Registro de nuevos usuarios
  - Autenticación segura
  - Gestión de sesiones

## 🔧 Requisitos
- Servidor web con soporte PHP
- MySQL/MariaDB
- Navegador web moderno

## 📌 Notas Importantes
- Las imágenes de perfil se almacenan en la carpeta `Imagenes/`
- La configuración de la base de datos se encuentra en el archivo de conexión
- El sistema incluye validaciones de seguridad básicas

## 🤝 Contribuciones
Las contribuciones son bienvenidas. Por favor, asegúrate de probar cualquier cambio antes de enviar un pull request.
