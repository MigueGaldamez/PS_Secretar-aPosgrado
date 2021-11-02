
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `equipotrabajos` (`id`, `nombre`, `cargo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Evelin Patricia Gutierrez Castro', 'Coordinadora', 'Licenciada en Relaciones Internacionales y Maestra en Ciencias\nPolíticas, Evelin Gutiérrez, asignada para coordinar la Secretaría de\nPosgrados de la Universidad de El Salvador con el objetivo de unificar\nel sistema de Posgrados de las 12 facultades con las que cuenta este máximo centro de estudios de Educación Superior.', '2021-11-02 07:07:15', '2021-11-02 07:11:13'),
(2, 'Nancy Orellana', 'Área de comunicaciones', 'Licenciada en Periodismo, Nancy Orellana, asignada para en el área de Comunicaciones de la Secretaría de Posgrados', '2021-11-02 07:11:04', '2021-11-02 07:11:04'),
(3, 'Sandra Hernández', 'Asistente Administrativo', 'Sandra Hernández, Asistente Administrativo de la Secretaría de\nPosgrado', '2021-11-02 07:11:50', '2021-11-02 07:11:50');
COMMIT;
