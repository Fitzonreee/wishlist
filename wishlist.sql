-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wishlist
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wishlist
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wishlist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wishlist` ;

-- -----------------------------------------------------
-- Table `wishlist`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `first_name` VARCHAR(45) NULL COMMENT '',
  `last_name` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(255) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(70) NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `category_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `category_id`)  COMMENT '',
  INDEX `fk_products_categories1_idx` (`category_id` ASC)  COMMENT '',
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `wishlist`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`addresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`addresses` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `house_num` VARCHAR(45) NULL COMMENT '',
  `street` VARCHAR(45) NULL COMMENT '',
  `city` VARCHAR(45) NULL COMMENT '',
  `state` VARCHAR(2) NULL COMMENT '',
  `zipcode` INT(5) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`billings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`billings` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `address_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_billings_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_billings_addresses1_idx` (`address_id` ASC)  COMMENT '',
  CONSTRAINT `fk_billings_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `wishlist`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`shippings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`shippings` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `address_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_shippings_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_shippings_addresses1_idx` (`address_id` ASC)  COMMENT '',
  CONSTRAINT `fk_shippings_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_addresses1`
    FOREIGN KEY (`address_id`)
    REFERENCES `wishlist`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`friendships`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`friendships` (
  `user_id` INT NOT NULL COMMENT '',
  `friend_id` INT NOT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`user_id`, `friend_id`)  COMMENT '',
  INDEX `fk_users_has_users_users1_idx` (`friend_id` ASC)  COMMENT '',
  INDEX `fk_users_has_users_users_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_users_has_users_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users1`
    FOREIGN KEY (`friend_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`carts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`carts` (
  `user_id` INT NOT NULL COMMENT '',
  `product_id` INT NOT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`user_id`, `product_id`)  COMMENT '',
  INDEX `fk_users_has_products_products1_idx` (`product_id` ASC)  COMMENT '',
  INDEX `fk_users_has_products_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_users_has_products_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wishlist`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`wishlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`wishlists` (
  `user_id` INT NOT NULL COMMENT '',
  `product_id` INT NOT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`user_id`, `product_id`)  COMMENT '',
  INDEX `fk_users_has_products1_products1_idx` (`product_id` ASC)  COMMENT '',
  INDEX `fk_users_has_products1_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_users_has_products1_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products1_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `wishlist`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`friend_requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`friend_requests` (
  `requestor_id` INT NOT NULL COMMENT '',
  `recipient_id` INT NOT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`requestor_id`, `recipient_id`)  COMMENT '',
  INDEX `fk_users_has_users_users3_idx` (`recipient_id` ASC)  COMMENT '',
  INDEX `fk_users_has_users_users2_idx` (`requestor_id` ASC)  COMMENT '',
  CONSTRAINT `fk_users_has_users_users2`
    FOREIGN KEY (`requestor_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users3`
    FOREIGN KEY (`recipient_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wishlist`.`preferences`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist`.`preferences` (
  `category_id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`category_id`, `user_id`)  COMMENT '',
  INDEX `fk_categories_has_users_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_categories_has_users_categories1_idx` (`category_id` ASC)  COMMENT '',
  CONSTRAINT `fk_categories_has_users_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `wishlist`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
