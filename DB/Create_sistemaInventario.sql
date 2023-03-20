/*Verificar que no exista la base de datos para crearla*/
DROP DATABASE IF EXISTS SistemaInventario;

-- Crear la base de datos
CREATE DATABASE SistemaInventario;

USE SistemaInventario;

-- TABLAS
CREATE TABLE Usuario (
    Usuario_Id  INT NOT NULL AUTO_INCREMENT,
    Sede_Id INT NOT NULL,
    UsuarioNombre VARCHAR (100) NOT NULL,
    UsuarioApaterno VARCHAR (100) NOT NULL,
    UsuarioAMaterno VARCHAR (100) NOT NULL,
    UsuarioCorreo VARCHAR (100) UNIQUE NOT NULL,
    UsuarioPassword VARCHAR (100) NOT NULL,
    UsuarioEstado BOOLEAN NOT NULL,
    UsuarioRol ENUM('administrador', 'CE', 'Consultor', 'editor'),

    CONSTRAINT PK_userId PRIMARY KEY (Usuario_ID ASC),
    CONSTRAINT CHKROL CHECK (UsuarioRol = 'administrador' OR UsuarioRol = 'CE' OR UsuarioRol = 'consultor' OR UsuarioRol = 'editor')
);

CREATE TABLE Administrador (
    Usuario_Id INT PRIMARY KEY,
    
    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id) ON DELETE CASCADE
);

CREATE TABLE ControlEscolar (
    Usuario_Id INT PRIMARY KEY,
    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id) ON DELETE CASCADE
);

CREATE TABLE Consultor (
    Usuario_Id INT PRIMARY KEY,
    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id) ON DELETE CASCADE
);

CREATE TABLE Editor (
    Usuario_Id INT PRIMARY KEY,
    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id) ON DELETE CASCADE
);

CREATE TABLE IntentosLogin (
    Usuario_Id INT PRIMARY KEY,
    UsuarioCorreo VARCHAR (100) NOT NULL,
    IntentosLoginFecha DATE NOT NULL,
    IntentosLoginNum INT NOT NULL,

    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id) ON DELETE CASCADE,
    FOREIGN KEY (UsuarioCorreo) REFERENCES Usuario (UsuarioCorreo) ON DELETE CASCADE
);

CREATE TABLE Sedes (
    Sede_Id INT NOT NULL AUTO_INCREMENT,
    SedeNombre VARCHAR (100) NOT NULL,
    SedeSiglas VARCHAR (50) NOT NULL,

    CONSTRAINT PkSedeId PRIMARY KEY (Sede_Id ASC)
);

CREATE TABLE Diplomado (
    Diplomado_Id INT NOT NULL AUTO_INCREMENT,
    DiplomadoNombre VARCHAR (100) NOT NULL,
    DiplomadoEmision VARCHAR (50) NOT NULL,
    DiplomadoEstado BOOLEAN NOT NULL,

    CONSTRAINT PKDiplomadoId PRIMARY KEY (Diplomado_Id ASC)
);

CREATE TABLE Area (
    Area_Id INT NOT NULL AUTO_INCREMENT,
    AreaNombre VARCHAR (100) NOT NULL,
    AreaTipo VARCHAR (100) NOT NULL,
    AreaEstado BOOLEAN NOT NULL,

    CONSTRAINT PkAreaId PRIMARY KEY (Area_Id ASC)
);

CREATE TABLE TipoSeccion(
    TipoSeccion_Id INT NOT NULL AUTO_INCREMENT,
    Diplomado_Id INT NOT NULL,
    Area_Id INT NOT NULL,

    CONSTRAINT PKtipoSeccion PRIMARY KEY (TipoSeccion_Id ASC),
    FOREIGN KEY (Diplomado_Id) REFERENCES Diplomado (Diplomado_Id),
    FOREIGN KEY (Area_Id) REFERENCES Area (Area_Id)
);

CREATE TABLE Secciones (
    Seccion_Id INT NOT NULL AUTO_INCREMENT,
    SeccionNombre VARCHAR (100) NOT NULL,
    TipoSeccion_Id INT NOT NULL,

    CONSTRAINT PkSeccionId PRIMARY KEY (Seccion_Id ASC),
    FOREIGN KEY (TipoSeccion_Id) REFERENCES TipoSeccion (TipoSeccion_Id)
);

CREATE TABLE Material (
    Material_Id INT NOT NULL AUTO_INCREMENT,
    Seccion_Id INT NOT NULL, 
    MaterialNombre VARCHAR (100) NOT NULL,
    MaterialAuditoria INT NOT NULL,
    MaterialCompilacion INT NULL,
    MaterialISBN VARCHAR (100) NULL,
    MaterialTiraje INT NOT NULL,
    MaterialAutor VARCHAR (100) NOT NULL,
    MaterialVersion VARCHAR (50) NOT NULL,

    CONSTRAINT PkMaterialId PRIMARY KEY (Material_Id ASC),
    FOREIGN KEY (Seccion_Id) REFERENCES Secciones (Seccion_Id)
);

CREATE TABLE Descargas(
    Descarga_Id INT NOT NULL AUTO_INCREMENT,
    Sede_Id INT NOT NULL,
    Usuario_Id INT NOT NULL,
    Material_Id INT NOT NULL,
    DescargaFecha DATE NOT NULL,
    DescargaCantidad INT NOT NULL,

    CONSTRAINT PkDescargaId PRIMARY KEY (Descarga_Id ASC),
    FOREIGN KEY (Sede_Id) REFERENCES Sedes (Sede_Id),
    FOREIGN KEY (Usuario_Id) REFERENCES Usuario (Usuario_Id),
    FOREIGN KEY (Material_Id) REFERENCES Material (Material_Id) ON DELETE CASCADE
);

-- TRIGGER PARA LAS TABLAS: ControlEscolar, Consultor, Editor.
DELIMITER $$
CREATE TRIGGER NewUserConsultor AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
    IF NEW.UsuarioRol = 'consultor' THEN BEGIN
        INSERT INTO consultor (Usuario_Id) VALUES (NEW.Usuario_Id);
    END; END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER NewUserEditor AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
    IF NEW.UsuarioRol = 'editor' THEN BEGIN
        INSERT INTO editor (Usuario_Id) VALUES (NEW.Usuario_Id);
    END; END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER NewUserCE AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
    IF NEW.UsuarioRol = 'CE' THEN BEGIN
        INSERT INTO ControlEscolar (Usuario_Id) VALUES (NEW.Usuario_Id);
    END; END IF;
END$$
DELIMITER ;