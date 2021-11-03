
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `equipoTrabajos` (`id`, `nombre`, `cargo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Evelin Patricia Gutierrez Castro', 'Coordinadora', 'Licenciada en Relaciones Internacionales y Maestra en Ciencias\nPolíticas, Evelin Gutiérrez, asignada para coordinar la Secretaría de\nPosgrados de la Universidad de El Salvador con el objetivo de unificar\nel sistema de Posgrados de las 12 facultades con las que cuenta este máximo centro de estudios de Educación Superior.', '2021-11-02 07:07:15', '2021-11-02 07:11:13'),
(2, 'Nancy Orellana', 'Área de comunicaciones', 'Licenciada en Periodismo, Nancy Orellana, asignada para en el área de Comunicaciones de la Secretaría de Posgrados', '2021-11-02 07:11:04', '2021-11-02 07:11:04'),
(3, 'Sandra Hernández', 'Asistente Administrativo', 'Sandra Hernández, Asistente Administrativo de la Secretaría de\nPosgrado', '2021-11-02 07:11:50', '2021-11-02 07:11:50');
COMMIT;

INSERT INTO `reseniaHistoricas` (`id`, `anio`, `importancia`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1841, 1, 'Por decreto de la Asamblea Legislativa, la Universidad de El Salvador se crea el 16 de febrero, siendo la primera universidad en el territorio nacional además de ser la única Universidad pública hasta la actualidad.', NULL, NULL),
(2, 1843, 2, 'Inicia sus actividades impartiendo matemáticas puras, lógica,\r\nmoral, metafísica y física general.', NULL, NULL),
(3, 1880, 2, 'por resolución del Poder Ejecutivo se subdividió en Facultades, algunas de las cuales desaparecieron tiempo después y otras nuevas fueron creadas.', NULL, NULL),
(4, 1937, 2, 'por solicitud de las autoridades universitarias, el Gobierno de la República formaliza la compraventa de 20 manzanas de terreno de la\r\nfinca San Carlos, ubicada al norte de la ciudad de San Salvador.', NULL, NULL),
(5, 1947, 1, 'La UES inicia las obras de construcción de la actual Ciudad\r\nUniversitaria.', NULL, NULL),
(6, 1949, 2, 'Se amplía el predio de la UES mediante la compraventa de 19 manzanas más, aunque su campus central está ubicado en el\r\ndepartamento de San Salvador con 9 Facultades, también, cuenta con tres sedes departamentales: la Facultad Multidisciplinaria Occidental, en el departamento de Santa Ana, la Facultad Multidisciplinaria Paracentral, en el departamento de San Vicente y la Facultad Multidisciplinaria Oriental, en el departamento de San Miguel.', NULL, NULL),
(7, 1992, 2, 'Después de los Acuerdos de Paz que puso fin al conflicto armado\r\nen el país, la UES logra recuperar su patrimonio físico para continuar\r\ncon la excelencia académica, además se el artículo 61 de la\r\nConstitución de la República de El Salvador garantiza que la\r\nUniversidad de El Salvador goza de autonomía académica,\r\nadministrativa y financiera.', NULL, NULL),
(8, 2004, 2, 'se presentó un documento al Consejo Superior\r\nUniversitario como propuesta de reglamento general del Sistema de\r\nEstudios de Posgrado en el que se considera indispensable la emisión\r\ndel Reglamento General del Sistema de Estudios de Postgrado para\r\nfortalecer el desarrollo de dichos estudios y garantizar su efectiva\r\norganización y funcionamiento en la Universidad de El Salvador. En\r\neste documento se formularon las disposiciones generales, entre ellas\r\nsu objetivo, encaminado a formar docentes y estudiantes\r\ninvestigadores del más alto nivel, capaces de desarrollar actividades\r\nen forma independiente y provechosa para la comunidad salvadoreña\r\ny regional.', NULL, NULL),
(9, 2008, 1, 'se presenta un plan estratégico de trabajo del Sistema de\r\nPosgrado dirigido al Rector y vicerrectores en turno, con el propósito\r\nde analizar, debatir y aprobar su aplicación en los próximos años.', NULL, NULL),
(10, 2009, 1, 'se inicia la creación de Escuelas de Posgrado, las\r\nfacultades de Ciencias y Humanidades, Odontología, Medicina,\r\nAgronomía y Multidisciplinaria Paracentral (San Vicente) presentaron\r\nsus proyectos de creación de Escuelas de posgrados en sus facultades.\r\nEn la propuesta de Escuela de Posgrado, también se incorporó el\r\nprograma de Educación Continua, es decir la implementación de\r\ncursos y diplomados para el fortalecimiento profesional de las\r\nFacultades y en adquisición de nuevas metodologías y técnicas que\r\n\r\nmejorarán el ejercicio de la docencia y de la investigación.', NULL, NULL),
(11, 2011, 2, 'El Posgrado de la Universidad de El Salvador (UES) se regula\r\nformalmente por el instrumento jurídico denominado Reglamento\r\nGeneral del Sistema de Posgrado (Diario Oficial, Tomo 390, N°38,\r\nfebrero de 2011). Según este normativo, el posgrado se organiza\r\ncomo SISTEMA, siendo sus componentes a) la Vicerrectoría\r\nAcadémica, b) la Secretaría de Posgrado (nivel central), c) las\r\ndiferentes Escuelas de Posgrado de las respectivas Facultades y d) los\r\nConsejos de Posgrado de Facultad. Según lo establece el artículo 11\r\ndel Reglamento de Posgrados, funcionalmente, el sistema está bajo la\r\ndependencia jerárquica de la Vicerrectoría Académica, pero es\r\nadministrado, coordinado, supervisado y evaluado por la Secretaría de\r\nPosgrado de la UES a nivel central y por las Escuelas de Posgrado de\r\nlas Facultades.', NULL, NULL),
(12, 2014, 1, 'El reconocimiento a la excelencia académica llevó a la UES a\r\nclasificarse en el Ranking Mundial de Universidades en la Web, esto\r\nclasificó a la UES como la mejor universidad de la República de El\r\nSalvador, ubicando al Alma Máter en la posición 3453 a nivel\r\ninternacional.', NULL, NULL),
(13, 2018, 2, 'autoridades de la UES solicitaron al Presidente del Alto Consejo\r\nde Evaluación de la Investigación en la Educación Superior (Hcéres)\r\nFrancia, el inicio del proceso de acreditación institucional.', NULL, NULL),
(14, 2019, 1, 'en octubre Hcéres otorgó la acreditación institucional a la\r\nUniversidad de El Salvador por un periodo de 5 años.', NULL, NULL),
(15, 2021, 2, 'A lo largo de su existencia la Universidad de El Salvador ha sido\r\ntestigo y protagonista de importantes cambios políticos y sociales del\r\npaís, ha superado daños en infraestructuras causados por terremotos,\r\nocupaciones militares que prolongaron el cierre del campus en varias\r\nocasiones, represión y persecución política de sus estudiantes y\r\ntrabajadores en un contexto de guerra civil.', NULL, NULL),
(16, 2021, 2, 'Actualmente, la UES ha logrado ampliar la oferta académica de\r\nPosgrado: 79 carreras en modalidad presencial y 7 a distancia; 71\r\nmaestrías, 9 doctorados, 27 especialidades médicas y 44 diplomados\r\ncomo parte de la educación continua.', NULL, NULL),
(17, 2021, 2, 'La UES logró designar al 2021 como el año de la gratuidad\r\nbeneficiando a los aspirantes de pregrado procedentes de\r\ninstituciones públicas y privadas, exonerando la matrícula y cuota de\r\nescolaridad. En la actualidad las autoridades universitarias continúan y\r\ncontinuarán trabajando para que los Posgrados que ofrece la\r\nUniversidad de El Salvador, respondan a la creciente necesidad de\r\nformación especializada que demanda la sociedad salvadoreña en el\r\ncontexto nacional.', NULL, NULL);
COMMIT;


INSERT INTO `tipo_duracions` (`id`, `nombre`) VALUES
(1, 'Semanas'),
(2, 'Ciclos'),
(3, 'Horas'),
(4, 'Meses'),
(5, 'Mes'),
(6, 'Año'),
(7, 'Años'),
(8, 'Niveles'),
(9, 'Sin Definir');
COMMIT;

INSERT INTO `modalidades` (`id`, `nombre`, `color`) VALUES
(1, 'Presencial', 'Rojo'),
(2, 'En Linea', 'Amarillo'),
(3, 'Semi Presencial', 'Azul');
COMMIT;

INSERT INTO `tipo_programas` (`id`, `nombre`) VALUES
(1, 'Doctorado'),
(2, 'Maestría'),
(3, 'Especialidad Medica');
COMMIT;

INSERT INTO `facultades` (`id`, `urlImagen`, `nombre`, `telefonoPosgrado`, `extPosgrado`, `correoPosgrado`, `color`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'none', 'Facultad de Ciencias Agronómicas', '-', '-', '-', '#385E07', 'Fue creada en 1964, ha graduado a profesionales que han ostentado honrosos cargos públicos o privados debido a la excelencia académica que es brindada en la Facultad.', NULL, NULL),
(2, 'none', 'Facultad de Ciencias Económicas', '-', '-', '-', '#c47048', 'Se fundó el 7 de febrero de 1946, con la carrera de Economía y Finanzas. En la actualidad y después de 75 años, ofrece cuatro carreras en el nivel de: Licenciatura en Economía, Contaduría Pública, Mercadeo Internacional y Administración de Empresa', NULL, NULL),
(3, 'none', 'Facultad de Ciencias y Humanidades', '-', '-', '-', '#96cde2', 'Nació el 13 de octubre de 1948, con la Misión de formar profesionales en los campos de las ciencias sociales, las artes, las comunicaciones, la investigación, la docencia, la proyección social.', NULL, NULL),
(4, 'none', 'Facultad de Ciencias Naturales y Matemáticas', '-', '-', '-', '#101D7E', 'La Facultad de Ciencias Naturales y Matemáticas nació el 5 de septiembre de 1991.', NULL, NULL),
(5, 'none', 'Facultad de Ingeniería y Arquitectura', '22350235', '-', 'uposgrados@fias.ues.edu.sv', '#202864', 'La Facultad de Ingeniería y Arquitectura tiene la misión de proporcionar al estudiante de Ingeniería y Arquitectura una formación de calidad en las áreas de física, matemática, estadística y metodología de la investigación científica', NULL, NULL),
(6, 'none', 'Facultad de Jurisprudencia y Ciencias Sociales', '22251490', '-', '-', '#63A70C', 'Por resolución del Poder Ejecutivo del 19 de octubre de 1880, se crea la Facultad de Derecho, Su visión es ser la mejor opción y ser reconocida en el ámbito nacional y regional en la formación de profesionales de alta calidad', NULL, NULL),
(7, 'none', 'Facultad de Medicina', '25112000', '6082/22710279', 'maestrias.medicina@ues.edu.sv', '#70C5BC', 'La Facultad de Medicina de la Universidad de El Salvador fue creada en 1847, tiene la misión de formar recursos humanos en salud de elevada calidad científica, técnica y humana, desarrollar la investigación y la generación de conocimiento científico', NULL, NULL),
(8, 'none', 'Facultad de Odontología', '-', '4745', 'posgrado.foues@ues.edu.sv', '#410778', 'La Facultad de Odontología de la Universidad de El Salvador nace en 1885, Líder e incidente respecto a las diferentes estructuras sociales que actúan en el ámbito de la salud bucal, generando nuevos  conocimientos y propiciando su transformación.', NULL, NULL),
(9, 'none', 'Facultad de Química y Farmacia', '25112000', '7510/7515', 'posgrado.fqf@ues.edu.sv', '#0b811', 'Nueve años después de haber sido fundada la Universidad de El Salvador nace la Facultad de Química y Farmacia en 1850, bajo el nombre de Facultad de Farmacia.', NULL, NULL),
(10, 'none', 'Facultad de Multidisciplinaria de  Occidente.', '24840555', '-', 'posgrado.fqf@ues.edu.sv', '#630303', 'Cuenta con la extensión del Centro Universitario en Ahuachapán en el que imparte cursos y diplomados. También cuenta el Programa Extramural de Posgrado en Sonsonate en el que oferta dos maestrías.', NULL, NULL),
(11, 'none', 'Facultad de Multidisciplinaria de Oriente', '-', '-', '-', '#630303', 'El 17 de junio de 1969, fue creado oficialmente el Centro Universitario de Oriente, con sede en la ciudad de San Miguel, Posteriormente fue transformado en Facultad Multidisciplinaria el 04 de junio de 1992.', NULL, NULL),
(12, 'none', 'Facultad de Multidisciplinaria Paracentral', '-', '-', '-', '#630303', 'Es una de las más recientes de las faculta descentralizadas con las que cuenta la UES. Esta Facultad fue creada el 27 de abril de 1989 bajo el nombre de Centro Regional pero, fue hasta el año de 1992 paso a ser Facultad Multidisciplinaria', NULL, NULL);
COMMIT;