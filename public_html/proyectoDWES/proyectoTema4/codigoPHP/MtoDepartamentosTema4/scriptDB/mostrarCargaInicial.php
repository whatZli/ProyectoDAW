/*
 * Author:  Alex Dominguez
 * Created: 05-nov-2019
 */

-- Base de datos a usar
USE DAW205DBDepartamentos;

-- Introduccion de datos dentro de la tabla creada
INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES
    ('ADM', 'Dept Administración'),
    ('VEN', 'Dept ventas'),
    ('CON', 'Dept Contabilidad'),
    ('DIR', 'Dept Directivo');