SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `lesson` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `files` VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `lesson` (`name`, `files`) VALUES
('Vistas de una figura. Metodología.', 'Vistas_de_una_figura__Metodología_(1);;view/assets/academia/files/65607d2bc2b74.mp4'),
('Ejercicios: 30 figuras y soluciones.', 'Enunciado;;view/assets/academia/files/65607da5d6650.pdf;;Solución;;view/assets/academia/files/65607da5d74e1.pdf'),
('Introducción', 'Introducción(1);;view/assets/academia/files/65648e3dc224a.mp4'),
('El punto, la recta y el plano. Tercera proyección.', 'El_punto;;view/assets/academia/files/65648e849c6cd.mp4;;La_recta;;view/assets/academia/files/65648e84a0953.mp4;;El_plano;;view/assets/academia/files/65648e84a44c4.mp4'),
('Abatimiento de un plano oblicuo.', 'Abatimiento_de_un_plano_oblicuo_(1);;view/assets/academia/files/6564904f2648a.mp4'),
('Abatimiento por la cota y por afinidad.', 'Abatimiento_por_la_cota_y_por_afinidad_(1);;view/assets/academia/files/6564906d7e69b.mp4'),
('Distancia entre dos puntos.', 'Distancia_entre_dos_puntos_(1);;view/assets/academia/files/656490d2279f9.mp4'),
('Distancia de un punto a un plano.', 'Distancia_de_un_punto_a_un_plano_(1);;view/assets/academia/files/656490ef0f7a4.mp4'),
('Introducción.', 'Introducción_(1);;view/assets/academia/files/6564918be6e43.mp4'),
('Ángulos que forma una recta dada con los planos de proyección.', 'Ángulos_que_forma_una_recta_dada_con_los_planos_de_proyección_(1);;view/assets/academia/files/656491b97f08e.mp4'),
('Sistema Diédrico. Formas geométricas.', 'Sistema_Diédrico__Formas_geométricas_(1);;view/assets/academia/files/6564924e515ce.mp4'),
('Altura de una figura apoyada en un plano.', 'Altura_de_una_figura_apoyada_en_un_plano_(1);;view/assets/academia/files/65649276f1b3d.mp4'),
('Desarrollos, transformada y línea geodésica.', 'Desarrollos,_transformada_y_línea_geodésica_(1);;view/assets/academia/files/65649306b8f31.mp4'),
('Desarrollo de prisma recto y cilindro recto.', 'Desarrollo_de_prisma_recto_y_cilindro_recto_(1);;view/assets/academia/files/656493295bfd7.mp4'),
('Ejercicio 01: Vistas y acotación. Perspectiva isométrica.', 'Ejercicio_01:_Vistas_y_acotación__Perspectiva_isométrica_(1);;view/assets/academia/files/656493519fd82.pdf'),
('Ejercicio 02: Perspectiva Isométrica.', 'Ejercicio_02:_Perspectiva_Isométrica_(1);;view/assets/academia/files/6564937b67c01.pdf'),
('Introducción. Punto, recta y plano.', 'Introducción__Punto,_recta_y_plano_(1);;view/assets/academia/files/6564944f2604a.mp4'),
('Pertenencia.', 'Pertenencia_(1);;view/assets/academia/files/6564943961a7e.mp4'),
('Triángulos: Nomenclatura y clasificación.', 'Triángulos:_Nomenclatura_y_clasificación_(1);;view/assets/academia/files/656494b31f0e3.mp4'),
('Triángulos: Puntos y rectas notables.', 'Triángulos:_Puntos_y_rectas_notables_(1);;view/assets/academia/files/656494d29e38c.mp4');
