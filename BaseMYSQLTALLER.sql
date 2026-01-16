DROP DATABASE IF EXISTS proveedores_db;
CREATE DATABASE proveedores_db CHARACTER SET utf8mb4;
USE proveedores_db;

CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ruc VARCHAR(13) NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    contacto VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Activo'
);
SELECT * FROM proveedores;
