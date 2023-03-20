INSERT INTO Sedes (SedeNombre, SedeSiglas)
        VALUES ('Centro Mascarones', 'CM'),
                ('Ciudad Universitaria', 'CU'),
                ('Centro Polanco', 'CP');

INSERT INTO Usuario (Sede_Id, UsuarioNombre, UsuarioApaterno, UsuarioAMaterno, UsuarioCorreo, UsuarioPassword, UsuarioEstado, UsuarioRol)
            VALUES (1, 'Angel', 'Argonza', 'Roblero', 'correo1@correo.com', 'password1', TRUE, 'Administrador'),
                    (2, 'Rogelio', 'Sánchez', 'Gómez', 'correo2@correo.com', 'password2', FALSE, 'CE'),
                    (3, 'Fernando', 'Robles', 'Pérez', 'correo3@correo.com', 'password3', TRUE, 'CE'),
                    (2, 'Sandra', 'Mendez', 'Chavez', 'correo4@correo.com', 'password4', FALSE, 'consultor'),
                    (1, 'María', 'Rosal', 'Hernández', 'correo5@correo.com', 'password5', TRUE, 'editor'),
                    (1, 'Felicia', 'Piña', 'Salgado', 'correo6@correo.com', 'password6', TRUE, 'consultor');

INSERT INTO Area (AreaNombre, AreaTipo, AreaEstado)
            VALUES ('Area1', 'Tipo1', TRUE),
                    ('Area2', 'Tipo2', FALSE),
                    ('Area3', 'Tipo3', TRUE),
                    ('Area4', 'Tipo4', TRUE),
                    ('Area5', 'Tipo5', FALSE);

INSERT INTO Administrador
    SELECT (Usuario_Id) FROM Usuario WHERE UsuarioRol = 'Administrador';

INSERT INTO ControlEscolar 
    SELECT (Usuario_Id) FROM Usuario WHERE UsuarioRol = 'CE';

INSERT INTO editor
    SELECT (Usuario_Id) FROM Usuario WHERE UsuarioRol = 'editor';

INSERT INTO Consultor 
    SELECT (Usuario_Id) FROM Usuario WHERE UsuarioRol = 'consultor';