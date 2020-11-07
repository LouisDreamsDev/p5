-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema walletx
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `walletx` ;

-- -----------------------------------------------------
-- Schema walletx
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `walletx` ;
USE `walletx` ;

-- -----------------------------------------------------
-- Table `walletx`.`coins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`coins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `info` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `walletx`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`role` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `walletx`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(100) NOT NULL,
  `mail` VARCHAR(255) NULL,
  `password` VARCHAR(60) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `role_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_role_id` (`role_id` ASC)
  )
ENGINE = InnoDB
AUTO_INCREMENT = 29
DEFAULT CHARACTER SET = utf8;

INSERT INTO `user` (`id`, `pseudo`, `mail`, `password`, `created_at`, `role_id`) VALUES
(17, 'test', 'test@test.com',  '$2y$10$mbeyhg3VQKcIXTK1xpkkROwpylAbXCUuShl9CZp4c1a5MOUmU3vgy', '2020-10-08 23:54:10', 1);


-- -----------------------------------------------------
-- Table `walletx`.`wallet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`wallet` (
  `id` INT NOT NULL,
  `user_id` INT(11) NOT NULL,
  `coins_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wallet_user1_idx` (`user_id` ASC),
  INDEX `fk_wallet_coins1_idx` (`coins_id` ASC)
  )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
