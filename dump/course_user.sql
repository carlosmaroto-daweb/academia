SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE `course_user` (
  `id_course` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_course`, `id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `course_user` (`id_course`, `id_user`) VALUES
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 5),
(2, 6),
(2, 9),
(3, 6);