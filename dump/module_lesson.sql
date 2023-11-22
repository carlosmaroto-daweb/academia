SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `module_lesson` (
  `id_module` INT NOT NULL,
  `id_lesson` INT NOT NULL,
  PRIMARY KEY (`id_module`, `id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;