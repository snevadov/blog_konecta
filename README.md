Prueba Técnica para Desarrollador Konecta.
/*----------------------------------------------------------------------------------------------------*/
/*--------------------------------------- Script sistema base ----------------------------------------*/
/*----------------------------------------------------------------------------------------------------*/
CREATE DATABASE blog_konecta;

USE blog_konecta;

CREATE USER 'konectaAdmin'@'localhost' IDENTIFIED BY 'AdministradorBlogKonecta2021*';
GRANT ALL ON blog_konecta.* TO 'konectaAdmin'@'localhost';
CREATE USER 'konectaAdmin'@'127.0.0.1' IDENTIFIED BY 'AdministradorBlogKonecta2021*';
GRANT ALL ON blog_konecta.* TO 'konectaAdmin'@'127.0.0.1';

CREATE TABLE tipousuario (
  id INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(128) NOT NULL,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tipousuario (nombre) VALUES ('Administrador');
INSERT INTO tipousuario (nombre) VALUES ('Usuario');

CREATE TABLE usuario (
  id INTEGER NOT NULL AUTO_INCREMENT,
  identificacion VARCHAR(128) NOT NULL UNIQUE,
  nombre VARCHAR(128) NOT NULL,
  correo VARCHAR(128) NOT NULL,
  contrasena VARCHAR(128) NOT NULL,
  numeromovil VARCHAR(128) NOT NULL,
  idtipousuario INTEGER NOT NULL,
  fechacreacion datetime,
  fechaactualizacion datetime,
  CONSTRAINT FOREIGN KEY (idtipousuario) REFERENCES `tipousuario` (id)
      ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO usuario (nombre, correo, contrasena, numeromovil, idtipousuario, fechacreacion) 
  VALUES ('Administrador', 'administrador@blogkonecta.com', MD5('abc123'), '3007483357',1, NOW());

CREATE TABLE categoria (
  id INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(128) NOT NULL UNIQUE,
  descripcion VARCHAR(128),
  fechacreacion datetime,
  fechaactualizacion datetime,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

/*----------------------------------------------------------------------------------------------------*/
/*--------------------------------------- Documentación API ------------------------------------------*/
/*----------------------------------------------------------------------------------------------------*/
Listado de URLs RestAPI.

URL Backend: localhost/blog_konecta/

/*--------------------- USUARIOS -------------------------*/
1) Listado de usuarios: 
  URL: localhost/blog_konecta/
  Parámetros: "action":"listarUsuarios"

2) Crear usuarios: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"crearUsuario",
    "nombre":"",
    "identificacion":"",
    "correo":"",
    "contrasena":"",
    "numeromovil":"",
    "idtipousuario":""

3) Editar usuarios: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"editarUsuario",
    "id":"",
    "nombre":"",
    "identificacion":"",
    "correo":"",
    "contrasena":"",
    "numeromovil":"",
    "idtipousuario":""

4) Eliminar usuarios: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"eliminarUsuario",
    "id":""

/*--------------------- CATEGORÍAS -------------------------*/
1) Listado de categorías: 
  URL: localhost/blog_konecta/
  Parámetros: "action":"listarCategorias"

2) Crear categoría: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"crearCategoria",
    "nombre":"",
    "descripcion":""

3) Editar categoría: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"editarCategoria",
    "id":"",
    "nombre":"",
    "descripcion":""

4) Eliminar categoría: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"eliminarCategoria",
    "id":""

/*------------------------------------- FIN Documentación --------------------------------------*/