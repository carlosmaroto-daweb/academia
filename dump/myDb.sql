CREATE TABLE `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255),
  `password` CHAR(60),
  `name` VARCHAR(255),
  `last_name` VARCHAR(255),
  `phone_number` VARCHAR(255),
  `dni` VARCHAR(255),
  `type` ENUM ('student', 'teacher', 'secretary', 'admin') DEFAULT 'student',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `lesson` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `files` VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `module` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `header_image` LONGTEXT,
  `preview` LONGTEXT,
  `preview_image` LONGTEXT,
  `content` LONGTEXT,
  `content_image` LONGTEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `header_image` LONGTEXT,
  `preview` LONGTEXT,
  `preview_image` LONGTEXT,
  `content` LONGTEXT,
  `content_image` LONGTEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `module_lesson` (
  `id_module` INT NOT NULL,
  `id_lesson` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
