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
    texto varchar(512),
    ruta_imagen varchar(256),
    titulo varchar(256),
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

INSERT INTO `tema` (`id`, `nombre`, `color_asociado`, `color_texto`) VALUES
(1, 'PHP', 'blue', 'white'),
(2, 'JavaScript', 'orange', 'black');


INSERT INTO `apartado` (`id`, `id_tema`, `nombre`, `fecha`) VALUES
(1, 1, 'Arrays', '2020-10-23 11:20:34'),
(2, 1, 'Bucles', '2020-10-23 11:20:34'),
(3, 2, 'Variables', '2020-10-23 11:24:27'),
(4, 2, 'Funciones', '2020-10-23 11:24:27');

INSERT INTO `contenido` (`id`, `id_apartado`, `texto`, `ruta_imagen`, `titulo`) VALUES
(1, 1, 'Esto es una prueba de ARRAYS\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa omnis assumenda quae nemo veritatis laborum veniam cumque a voluptatem, nihil eos! Obcaecati alias voluptatem sit. Vel nisi tempora quos temporibus?', 'https://cdn.programiz.com/sites/tutorial2program/files/c-arrays.jpg', 'Crear un array'),
(2, 2, 'Texto de  prueba de BUCLES\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa omnis assumenda quae nemo veritatis laborum veniam cumque a voluptatem, nihil eos! Obcaecati alias voluptatem sit. Vel nisi tempora quos temporibus?', 'https://www.explicacion.net/wp-content/uploads/2019/01/ciclos-de-programacion.jpg', ''),
(3, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in', 'https://www.nintenderos.com/wp-content/uploads/2019/11/slack-imgs.com_-7-e1573560248585.jpg', 'Modificar un array');

