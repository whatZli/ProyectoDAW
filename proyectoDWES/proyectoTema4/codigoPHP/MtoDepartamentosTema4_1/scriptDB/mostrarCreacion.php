-- Crear base de datos --
create database if not exists DAW205DBDepartamentos;

-- Usar la base de datos --
use DAW205DBDepartamentos;

-- Crear tablas --
create table if not exists Departamento (
	CodDepartamento varchar(3),
	DescDepartamento varchar(255),
        fechaAlta date,
	primary Key (CodDepartamento)
	)ENGINE=InnoDB;

-- Crear el usuario --
create user if not exists 'usuarioDAW205Departamentos'@'%' identified BY 'paso';

-- Dar permisos --
GRANT ALL PRIVILEGES ON DAW205DBDepartamentos.* TO 'usuarioDAW205Departamentos'@'%'; 

-- Limpiar privilegios para actualizar los permisos --
flush privileges;