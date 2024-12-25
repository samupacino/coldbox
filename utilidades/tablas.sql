CREATE DATABASE PlataformaDB;

USE PlataformaDB;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Contraseñas cifradas
    rol ENUM('admin', 'invitado') NOT NULL DEFAULT 'invitado'
);

CREATE TABLE plataformas (
    id INT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE instrumentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plataforma INT NOT NULL UNIQUE,
    nombre VARCHAR(255) NOT NULL,
    FOREIGN KEY (plataforma) REFERENCES plataformas(id)
);

-- Registra plataformas iniciales
INSERT INTO plataformas (id,nombre) VALUES 
(1,'Plataforma 1'), 
(2,'Plataforma 2'), 
(3,'Plataforma 3'), 
(4,'Plataforma 4'), 
(5,'Plataforma 5'),
(6,'Plataforma 6'),
(7,'Plataforma 7'),
(8,'Base');

INSERT INTO usuarios (username, password, rol) 
VALUES 
('makens', MD5('makens'), 'admin'),
('admin', MD5('admin123'), 'admin'), 
('guest', MD5('guest123'), 'invitado');

