SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `id_subject` INT,
  `studies` VARCHAR(255),
  `location` VARCHAR(255),
  `type` VARCHAR(255),
  `start_date` DATE,
  `end_date` DATE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `course` (`name`, `id_subject`, `studies`, `location`, `type`, `start_date`, `end_date`) VALUES
('Expresión Gráfica en la Ingeniería - UMA', 1, 'Ingeniería en Diseño Industrial y Desarrollo del Producto', 'Málaga', 'Universidad', '2023-09-18', '2024-07-19');
