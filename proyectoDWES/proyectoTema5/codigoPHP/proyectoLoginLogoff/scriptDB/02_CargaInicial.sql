/**
 * Author:  daw2
 * Created: 26-nov-2019
 */
-- La contraseña de los usuarios, es el codUsuario concatenado con el password, en este caso paso. [$usuario . $pass]
-- Base de datos a usar
USE DAW205DBProyectoTema5;

-- Introduccion de datos dentro de la tabla creada
INSERT INTO `Departamento` (`CodDepartamento`, `DescDepartamento`, `FechaBaja`, `VolumenNegocio`) VALUES
('AAA', 'DescripciÃ³n AAAA', NULL, 3),
('ABC', 'DescripciÃ³n qweqweq', NULL, 123),
('ASD', 'DescripciÃ³n ASD', '2019-11-26', 1),
('BBB', 'DescripciÃ³n BBB', '2019-11-24', 1),
('CCC', 'DescripciÃ³n CCC', NULL, 1),
('DDD', 'DescripciÃ³n DDD', NULL, 1),
('EEE', 'DescripciÃ³n EEE', '2019-11-24', 1),
('FFF', 'DescripciÃ³n FFF', '2019-11-24', 1),
('FRE', 'DescripciÃ³n FRE', '2019-11-24', 1),
('GGG', 'DescripciÃ³n GGG', NULL, 1),
('HHH', 'DescripciÃ³n HHH', NULL, 1),
('III', 'DescripciÃ³n III', '2019-11-24', 1),
('JJJ', 'DescripciÃ³n JJJ', '2019-11-24', 1),
('KKK', 'DescripciÃ³n KKK', '2019-11-25', 1),
('LLL', 'DescripciÃ³n LLL', NULL, 1),
('MMM', 'DescripciÃ³n MMM', NULL, 1),
('XXX', 'DescripciÃ³n XXX', '2019-11-24', 1),
('ZZZ', 'DescripciÃ³n ZZZ', '2019-11-24', 1);

-- El tipo de usuario es "usuario" como predeterminado, despues añado un admin --
INSERT INTO Usuario(CodUsuario, DescUsuario, Password) VALUES
    ('daniel','daniel',SHA2('danielpaso',256)),
    ('nereaA','nereaA',SHA2('nereaApaso',256)),
    ('miguel','miguel',SHA2('miguelpaso',256)),
    ('alex','alex',SHA2('alexpaso',256)),
    ('david','david',SHA2('davidpaso',256)),
    ('ismael','ismael',SHA2('ismaelpaso',256)),
    ('victor','victor',SHA2('victorpaso',256)),
    ('bea','bea',SHA2('beapaso',256)),
    ('nereaN','nereaN',SHA2('nereaNpaso',256)),
    ('mateo','mateo',SHA2('mateopaso',256)),
    ('rodrigo','rodrigo',SHA2('rodrigopaso',256)),
    ('ruben','ruben',SHA2('rubenpaso',256)),
    ('heraclio','heraclio',SHA2('heracliopaso',256)),
    ('amor','amor',SHA2('amorpaso',256)),
    ('maria','maria',SHA2('mariapaso',256)),
    ('antonio','antonio',SHA2('antoniopaso',256));

-- Usuario con el rol admin --
INSERT INTO Usuario(CodUsuario, DescUsuario, Password, Perfil) VALUES ('admin','admin',SHA2('adminpaso',256), 'administrador');