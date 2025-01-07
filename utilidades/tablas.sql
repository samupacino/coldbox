CREATE DATABASE PlataformaDB;

USE PlataformaDB;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    name_complete VARCHAR(250) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Contraseñas cifradas
    rol ENUM('admin', 'invitado') NOT NULL DEFAULT 'invitado'
);

CREATE TABLE plataformas (
    id INT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE instrumento_pl2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    plataforma INT NOT NULL,
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

INSERT INTO usuarios (username,name_complete,password, rol) 
VALUES 
('samuel', 'samuel lujan',MD5('samuel'), 'admin');


