SET NAMES 'utf8';
SET CHARACTER SET utf8;

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

INSERT INTO `user` (`email`, `password`, `name`, `last_name`, `phone_number`, `dni`, `type`) VALUES
('admin@admin.com', '$2y$14$g6x7cRIDapqO6rHH/yRCUeRRr.NZOO/.Tq/hQSESXDuKpaBHBC45u', 'Admin', 'Admin', '', '', 'admin');
