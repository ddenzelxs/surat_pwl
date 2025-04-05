-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema suratpwl
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema suratpwl
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `suratpwl` DEFAULT CHARACTER SET utf8mb4 ;
USE `suratpwl` ;

-- -----------------------------------------------------
-- Table `suratpwl`.`cache`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`cache` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT(11) NOT NULL,
  PRIMARY KEY (`key`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`cache_locks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`cache_locks` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT(11) NOT NULL,
  PRIMARY KEY (`key`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`failed_jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`failed_jobs` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`failed_jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`job_batches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`job_batches` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT(11) NOT NULL,
  `pending_jobs` INT(11) NOT NULL,
  `failed_jobs` INT(11) NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL DEFAULT NULL,
  `cancelled_at` INT(11) NULL DEFAULT NULL,
  `created_at` INT(11) NOT NULL,
  `finished_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`jobs` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT(3) UNSIGNED NOT NULL,
  `reserved_at` INT(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` INT(10) UNSIGNED NOT NULL,
  `created_at` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `jobs_queue_index` (`queue` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`role` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`role` (
  `id` INT(2) NOT NULL,
  `nama_role` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `suratpwl`.`prodi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`prodi` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`prodi` (
  `id` INT(2) NOT NULL,
  `nama_prodi` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `suratpwl`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`users` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`users` (
  `nrp_nip` VARCHAR(20) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `role_id` INT(2) NOT NULL,
  `prodi_id` INT(2) NOT NULL,
  PRIMARY KEY (`nrp_nip`),
  INDEX `fk_users_role1_idx` (`role_id` ASC),
  INDEX `fk_users_prodi1_idx` (`prodi_id` ASC),
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `suratpwl`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_prodi1`
    FOREIGN KEY (`prodi_id`)
    REFERENCES `suratpwl`.`prodi` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `suratpwl`.`lhs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`lhs` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`lhs` (
  `id` INT(11) NOT NULL,
  `nrp` VARCHAR(20) NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `keperluan_pembuatan_laporan` TEXT NULL DEFAULT NULL,
  `status` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `nrp`),
  INDEX `nrp` (`nrp` ASC),
  CONSTRAINT `lhs_ibfk_1`
    FOREIGN KEY (`nrp`)
    REFERENCES `suratpwl`.`users` (`nrp_nip`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `suratpwl`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`migrations` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`password_reset_tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`password_reset_tokens` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`sessions` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `sessions_user_id_index` (`user_id` ASC),
  INDEX `sessions_last_activity_index` (`last_activity` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratpwl`.`skl`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`skl` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`skl` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nrp` VARCHAR(20) NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `tanggal_lulus` DATE NOT NULL,
  `status` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `nrp`),
  INDEX `nrp` (`nrp` ASC),
  CONSTRAINT `skl_ibfk_1`
    FOREIGN KEY (`nrp`)
    REFERENCES `suratpwl`.`users` (`nrp_nip`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `suratpwl`.`smahaktif`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`smahaktif` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`smahaktif` (
  `id` INT(11) NOT NULL,
  `nrp` VARCHAR(20) NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `semester` INT(11) NOT NULL,
  `alamat` TEXT NULL DEFAULT NULL,
  `keperluan_pengajuan` TEXT NULL DEFAULT NULL,
  `status` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `nrp`),
  INDEX `nrp` (`nrp` ASC),
  CONSTRAINT `smahaktif_ibfk_1`
    FOREIGN KEY (`nrp`)
    REFERENCES `suratpwl`.`users` (`nrp_nip`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `suratpwl`.`smatkul`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratpwl`.`smatkul` ;

CREATE TABLE IF NOT EXISTS `suratpwl`.`smatkul` (
  `id` INT(11) NOT NULL,
  `nrp` VARCHAR(20) NOT NULL,
  `surat_tujuan` VARCHAR(255) NOT NULL,
  `nama_mata_kuliah` VARCHAR(100) NOT NULL,
  `kode_mata_kuliah` VARCHAR(20) NOT NULL,
  `semester` VARCHAR(20) NOT NULL,
  `mahasiswa_data` TEXT NULL DEFAULT NULL,
  `tujuan` TEXT NULL DEFAULT NULL,
  `topik` TEXT NULL DEFAULT NULL,
  `status` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `nrp`),
  INDEX `fk_smatkul_users1_idx` (`nrp` ASC),
  CONSTRAINT `fk_smatkul_users1`
    FOREIGN KEY (`nrp`)
    REFERENCES `suratpwl`.`users` (`nrp_nip`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
