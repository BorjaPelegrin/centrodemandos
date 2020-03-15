CREATE TABLE `configuraciones`.`zona` (
    `id_zona` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(30) NOT NULL ,
    `is_archived` ENUM('0','1') NOT NULL DEFAULT '0' ,
    PRIMARY KEY (`id_zona`),
    INDEX (`is_archived`)
) ENGINE = InnoDB;

CREATE TABLE `configuraciones`.`tipo` (
    `id_tipo` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(50) NOT NULL ,
    `is_archived` ENUM('0','1') NOT NULL DEFAULT '0',
    PRIMARY KEY (`id_tipo`),
    INDEX (`is_archived`)
) ENGINE = InnoDB;

CREATE TABLE `configuraciones`.`ejercicio` (
    `id_ejercicio` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(100) NOT NULL ,
    `video` VARCHAR(100) NULL ,
    `file` VARCHAR(100) NULL ,
    `id_zona` INT(11) UNSIGNED NOT NULL ,
    `id_tipo` INT(11) UNSIGNED NOT NULL ,
    `is_archived` ENUM('0','1') NOT NULL DEFAULT '0',
    PRIMARY KEY (`id_ejercicio`),
    INDEX (`is_archived`)
) ENGINE = InnoDB;








ALTER TABLE `ejercicio` ADD FOREIGN KEY (`id_tipo`) REFERENCES `tipo`(`id_tipo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `ejercicio` ADD FOREIGN KEY (`id_zona`) REFERENCES `zona`(`id_zona`) ON DELETE RESTRICT ON UPDATE RESTRICT;