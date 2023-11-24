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
('Ejercicios: 30 figuras y soluciones.', 'Enunciado;;view/assets/academia/files/65607da5d6650.pdf;;Solución;;view/assets/academia/files/65607da5d74e1.pdf');
