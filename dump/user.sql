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
('carlosmarotodelgado@hotmail.com', '$2y$14$7M.7eTWxsHKsP66rb3Ev5OmuD/URQSY13wXxdUpXfTry1KKSmzDsa', 'Carlos', 'Maroto Delgado', '615763779', '45667750P', 'admin'),
('luis@gmail.com', '$2y$14$AboTlSl12A786evKcT64nucGdRvyaakx.KErrF2Ntvg/.zf34Gpli', 'Luis', 'Ruiz Chico', '671319791', '92726281X', 'admin'),
('maria@gmail.com', '$2y$14$S/dBjZVVYFs3KRmrahG3KOt4CjZScZP4cLILzhQtasv3dZWa6FurK', 'Maria', 'Nieves Guirado', '640023648', '17684415Z', 'secretary'),
('fernando@gmail.com', '$2y$14$Tl91kOOPGs54DqP9ndraeuq5JlJ6X3xR.GidLxnNvLTw0gDMvPrm2', 'Fernando', 'Delgado Palma', '662511473', '13880125Q', 'teacher'),
('angustias@gmail.com', '$2y$14$8IXKlqmiVEYuTWjMjYQCee6w4yBLixeHGv4IZ8lCa5/sTYo/7UJJ2', 'Angustias', 'San Martin', '695967306', '91751029G', 'student'),
('ana@gmail.com', '$2y$14$qWkQNVMdJUXNIxscVXw1JeyvwPOb1sac2XebIrRiGbHHPcefHv7J2', 'Ana', 'Cabrera García', '676487309', '94297614Y', 'student'),
('jose@gmail.com', '$2y$14$1M0q7.pTsMDNSuAdCxkP7ezznpMvoeSRPhRMiOtRNczQkTGExhtr6', 'Jose', 'Moyano Chinchilla', '635718255', '25053981N', 'student'),
('claudia@gmail.com', '$2y$14$XESzBCpccIxFtqhYfyijwepZfFxNYApHnu7yFq87IyuI/Y82uG53e', 'Claudia', 'Valverde Perez', '631236110', '82065377C', 'student'),
('esteban@gmail.com', '$2y$14$hY3YWsu4QFJk2IxuhdB/n.UkfZvBg9v768tDUxX48FBAiggoolHrC', 'Esteban', 'Calvo Martinez', '611739695', '79422122V', 'student');
