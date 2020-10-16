CREATE TABLE usuario(
    id int primary key auto_increment,
    nombre varchar(32),
    apellido varchar(32),
    correo varchar(64) unique,
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
    FOREIGN KEY (id_tema) REFERENCES ON tema(id) ON UPDATE CASCADE
);
CREATE TABLE contenido(
    id int primary key auto_increment,
    id_apartado int,
    FOREIGN KEY (id_apartado) REFERENCES ON apartado(id) ON UPDATE CASCADE
);
CREATE TABLE texto_contenido(
    id int primary key auto_increment,
    id_contenido int,
    texto varchar(256),
    FOREIGN KEY (id_contenido) REFERENCES ON contenido(id)
);
CREATE TABLE imagenes_contenido(
    id int primary key auto_increment,
    id_contenido int,
    ruta varchar(256),
    FOREIGN KEY (id_contenido) REFERENCES ON contenido(id)
);
CREATE TABLE comentario(
    id int primary key auto_increment,
    id_usuario int,
    id_apartado int,
    texto varchar(256),
    fecha timestamp  DEFAULT NOW(),
    padre int,
    FOREIGN KEY (id_usuario) REFERENCES ON usuario(id) ON UPDATE CASCADE,
    FOREIGN KEY (id_apartado) REFERENCES ON apartado(id) ON UPDATE CASCADE
    FOREIGN KEY (padre) REFERENCES ON comentario(id) ON UPDATE CASCADE
);