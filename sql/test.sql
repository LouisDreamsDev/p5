-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema walletx
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema walletx
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `walletx` DEFAULT CHARACTER SET utf8mb4 ;
USE `walletx` ;

-- -----------------------------------------------------
-- Table `walletx`.`coins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`coins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `coinName` VARCHAR(100) NULL DEFAULT NULL,
  `symbol` VARCHAR(10) NULL DEFAULT NULL,
  `slug` VARCHAR(30) NULL DEFAULT NULL,
  `maxSupply` BIGINT(20) NULL DEFAULT NULL,
  `circulatingSupply` BIGINT(20) NULL DEFAULT NULL,
  `totalSupply` BIGINT(20) NULL DEFAULT NULL,
  `cmcRank` INT(11) NULL DEFAULT NULL,
  `lastUpdated` DATETIME NULL DEFAULT NULL,
  `price` DECIMAL(20,8) NULL DEFAULT NULL,
  `volume24h` DECIMAL(20,8) NULL DEFAULT NULL,
  `percentChange_1h` DECIMAL(10,8) NULL DEFAULT NULL,
  `percentChange24h` DECIMAL(10,8) NULL DEFAULT NULL,
  `percentChange7d` DECIMAL(10,8) NULL DEFAULT NULL,
  `marketCap` BIGINT(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `symbol` (`symbol` ASC),
  UNIQUE INDEX `id` (`id` ASC, `coinName` ASC, `symbol` ASC, `slug` ASC, `maxSupply` ASC, `circulatingSupply` ASC, `totalSupply` ASC, `cmcRank` ASC, `lastUpdated` ASC, `price` ASC, `volume24h` ASC, `percentChange_1h` ASC, `percentChange24h` ASC, `percentChange7d` ASC, `marketCap` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2376
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `walletx`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`role` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `walletx`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(100) NOT NULL,
  `mail` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(60) NOT NULL,
  `createdAt` DATETIME NOT NULL,
  `roleId` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_role_id` (`roleId` ASC),
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`roleId`)
    REFERENCES `walletx`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `walletx`.`wallet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`wallet` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `lastEdit` DATETIME NOT NULL,
  `userId` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wallet_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_wallet_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `walletx`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `walletx`.`wallet_has_coins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `walletx`.`wallet_has_coins` (
  `walletId` INT(11) NOT NULL COMMENT '			',
  `coinId` INT(11) NOT NULL,
  `coinQuantity` INT(11) NOT NULL,
  INDEX `fk_wallet_has_coins_coins_idx` USING BTREE (`coinId`),
  INDEX `fk_wallet_has_coins_wallet_idx` USING BTREE (`walletId`),
  CONSTRAINT `fk_wallet_has_coins_coins1`
    FOREIGN KEY (`coinId`)
    REFERENCES `walletx`.`coins` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wallet_has_coins_wallet1`
    FOREIGN KEY (`walletId`)
    REFERENCES `walletx`.`wallet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
