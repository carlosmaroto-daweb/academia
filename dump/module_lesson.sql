SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `module_lesson` (
  `id_module` INT NOT NULL,
  `id_lesson` INT NOT NULL,
  PRIMARY KEY (`id_module`, `id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `module_lesson` (`id_module`, `id_lesson`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20);