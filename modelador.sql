drop database modelador;
create database modelador;
use modelador;
CREATE TABLE usuario (
  idUsuario INT NOT NULL NULL AUTO_INCREMENT, 
  nombres varchar(255), 
  usuario varchar(255),
  email varchar(255),
  edad int,
  contrasena longtext,
  PRIMARY KEY(idusuario)
) ENGINE=INNODB;

CREATE TABLE usuario_git (
  id INT NOT NULL NULL AUTO_INCREMENT, 
  github_id varchar(255), 
  `name` varchar(255), 
  email varchar(255),
  avatar varchar(255),
  PRIMARY KEY(id)
) ENGINE=INNODB;

CREATE TABLE documento (
  idDocumento INT NOT NULL NULL AUTO_INCREMENT, 
  titulo varchar(45), 
  `owner` int,
  grafico longtext,
  shared int,
  fechaCreacion datetime,
  fechaModif datetime,
  PRIMARY KEY (idDocumento)
) ENGINE=INNODB;

CREATE TABLE git_documento (
  idgd INT NOT NULL AUTO_INCREMENT,
  usuario INT NOT NULL,
  documento INT NOT NULL,
  
  PRIMARY KEY(idgd),
  INDEX (usuario),
  
FOREIGN KEY (usuario)
    REFERENCES usuario_git(id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  INDEX (documento),
  FOREIGN KEY (documento)
    REFERENCES documento(idDocumento)
	ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=INNODB;

CREATE TABLE usuario_documento (
  idud INT NOT NULL AUTO_INCREMENT,
  usuario INT NOT NULL,
  documento INT NOT NULL,
  
  PRIMARY KEY(idud),
  INDEX (usuario),
  
FOREIGN KEY (usuario)
    REFERENCES usuario(idUsuario)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  INDEX (documento),
  FOREIGN KEY (documento)
    REFERENCES documento(idDocumento)
	ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=INNODB;

CREATE TABLE historial (
  idHistorial INT NOT NULL AUTO_INCREMENT,
  shared int NOT NULL,
  propios int not null,
  usuario INT NOT NULL,
  
  PRIMARY KEY(idHistorial),
  INDEX (usuario),
  
FOREIGN KEY (usuario)
    REFERENCES usuario(idUsuario)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=INNODB;
