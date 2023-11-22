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
(1, 4);