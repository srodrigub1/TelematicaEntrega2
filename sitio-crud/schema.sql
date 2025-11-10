CREATE DATABASE IF NOT EXISTS usuariosdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'usuarios_user'@'%' IDENTIFIED BY 'tu_password_segura';
GRANT ALL PRIVILEGES ON usuariosdb.* TO 'usuarios_user'@'%';
FLUSH PRIVILEGES;

USE usuariosdb;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(120) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
