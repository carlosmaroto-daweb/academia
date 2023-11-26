SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `subject_module` (
  `id_subject` INT NOT NULL,
  `id_module` INT NOT NULL,
  PRIMARY KEY (`id_subject`, `id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `subject_module` (`id_subject`, `id_module`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 10),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7);