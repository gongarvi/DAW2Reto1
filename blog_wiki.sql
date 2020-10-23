CREATE DATABASE blog_wiki;

USE blog_wiki;

CREATE TABLE usuario(
    id int primary key auto_increment,
    nombre varchar(32),
    apellido varchar(32),
    correo varchar(64) unique,
    password varchar(64),
    administrador tinyint(1) DEFAULT 0
);
CREATE TABLE tema(
    id int primary key auto_increment,
    nombre varchar(16) unique,
    color_asociado varchar(9),
    color_texto varchar(9)
);
CREATE TABLE apartado(
    id int primary key auto_increment,
    id_tema int,
    nombre varchar(64),
    fecha timestamp DEFAULT NOW(),
    FOREIGN KEY (id_tema) REFERENCES tema(id) ON UPDATE CASCADE
);
CREATE TABLE contenido(
    id int primary key auto_increment,
    id_apartado int,
    titulo varchar(256),
    texto varchar(512),
    ruta_imagen varchar(256),
    FOREIGN KEY (id_apartado) REFERENCES apartado(id) ON UPDATE CASCADE
);

CREATE TABLE comentario(
    id int primary key auto_increment,
    id_usuario int,
    id_apartado int,
    texto varchar(256),
    fecha timestamp  DEFAULT NOW(),
    padre int,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON UPDATE CASCADE,
    FOREIGN KEY (id_apartado) REFERENCES apartado(id) ON UPDATE CASCADE,
    FOREIGN KEY (padre) REFERENCES comentario(id) ON UPDATE CASCADE
);

