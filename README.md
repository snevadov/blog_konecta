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

INSERT INTO usuario (identificacion, nombre, correo, contrasena, numeromovil, idtipousuario, fechacreacion) 
  VALUES ('1','Administrador', 'administrador@blogkonecta.com', MD5('abc123'), '3007483357',1, NOW());

CREATE TABLE categoria (
  id INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(128) NOT NULL UNIQUE,
  descripcion TEXT,
  fechacreacion datetime,
  fechaactualizacion datetime,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE blog (
  id INTEGER NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(128) NOT NULL,
  slug VARCHAR(128) NOT NULL,
  textocorto VARCHAR(256) NOT NULL,
  textolargo TEXT NOT NULL,
  rutaimagen TEXT,
  fechacreacion datetime,
  fechaactualizacion datetime,
  PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categoriaxblog (
  id INTEGER NOT NULL AUTO_INCREMENT,
  idcategoria INTEGER NOT NULL,
  idblog INTEGER NOT NULL,
  CONSTRAINT FOREIGN KEY (idcategoria) REFERENCES `categoria` (id)
      ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FOREIGN KEY (idblog) REFERENCES `blog` (id)
      ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(id),
  UNIQUE KEY `idcategoria_x_idblog` (`idcategoria`,`idblog`)
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

5) Loguear usuarios: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"login",
    "correo":"",
    "contrasena":""

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

/*--------------------- BLOGS -------------------------*/
1) Listado de Blogs: 
  URL: localhost/blog_konecta/
  Parámetros: "action":"listarBlogs"

2) Crear categoría: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"crearBlog",
    "titulo":"",
    "slug":"",
    "textocorto":"",
    "textolargo":"",
    "rutaimagen":"",
    "idcategorias":[]

3) Editar blog: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"editarBlog",
    "id","",
    "titulo":"",
    "slug":"",
    "textocorto":"",
    "textolargo":"",
    "rutaimagen":"",
    "idcategorias":[]

4) Eliminar blog: 
  URL: localhost/blog_konecta/
  Parámetros: 
    "action":"eliminarBlog",
    "id":""

/*------------------------------------- FIN Documentación --------------------------------------*/