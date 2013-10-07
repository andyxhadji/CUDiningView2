
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- countingdata
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `countingdata`;

CREATE TABLE `countingdata`
(
    `HALL` VARCHAR(3) NOT NULL,
    `OCCUPANCY` INTEGER NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- modelcounts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `modelcounts`;

CREATE TABLE `modelcounts`
(
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `count_time` DATETIME NOT NULL,
    `JAY` INTEGER,
    `JJP` INTEGER,
    `FER` INTEGER,
    PRIMARY KEY (`count_time`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- modelformula
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `modelformula`;

CREATE TABLE `modelformula`
(
    `JAY` DECIMAL(8,6) NOT NULL,
    `FER` DECIMAL(8,6) NOT NULL,
    `JJP` DECIMAL(8,6) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- nutrition
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `nutrition`;

CREATE TABLE `nutrition`
(
    `FOOD_ID` SMALLINT NOT NULL,
    `CURRENT` INTEGER(1),
    `Dish` VARCHAR(50),
    `JAY` INTEGER(1),
    `JJP` INTEGER(1),
    `FER` INTEGER(1),
    `ServingSize` VARCHAR(20),
    `Calories` INTEGER(5),
    `TotalFat` INTEGER(5),
    `Cholesterol` INTEGER(5),
    `SaturatedFat` INTEGER(5),
    `Protein` INTEGER(5),
    `Carbohydrate` INTEGER(5),
    `Fiber` INTEGER(5),
    `Sodium` INTEGER(5),
    `Score` INTEGER(5),
    `Url` VARCHAR(200),
    `V` INTEGER(1),
    `VN` INTEGER(1),
    `GF` INTEGER(1),
    `L` INTEGER(1),
    PRIMARY KEY (`FOOD_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_group`;

CREATE TABLE `sf_guard_group`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `sf_guard_group_U_1` (`name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_group_permission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_group_permission`;

CREATE TABLE `sf_guard_group_permission`
(
    `group_id` INTEGER NOT NULL,
    `permission_id` INTEGER NOT NULL,
    PRIMARY KEY (`group_id`,`permission_id`),
    INDEX `sf_guard_group_permission_FI_2` (`permission_id`),
    CONSTRAINT `sf_guard_group_permission_FK_1`
        FOREIGN KEY (`group_id`)
        REFERENCES `sf_guard_group` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `sf_guard_group_permission_FK_2`
        FOREIGN KEY (`permission_id`)
        REFERENCES `sf_guard_permission` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_permission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_permission`;

CREATE TABLE `sf_guard_permission`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `sf_guard_permission_U_1` (`name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_remember_key
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_remember_key`;

CREATE TABLE `sf_guard_remember_key`
(
    `user_id` INTEGER NOT NULL,
    `remember_key` VARCHAR(32),
    `ip_address` VARCHAR(50) NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`user_id`,`ip_address`),
    CONSTRAINT `sf_guard_remember_key_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user`;

CREATE TABLE `sf_guard_user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(128) NOT NULL,
    `algorithm` VARCHAR(128) DEFAULT 'sha1' NOT NULL,
    `salt` VARCHAR(128) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `created_at` DATETIME,
    `last_login` DATETIME,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `is_super_admin` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_user_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_group`;

CREATE TABLE `sf_guard_user_group`
(
    `user_id` INTEGER NOT NULL,
    `group_id` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`,`group_id`),
    INDEX `sf_guard_user_group_FI_2` (`group_id`),
    CONSTRAINT `sf_guard_user_group_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `sf_guard_user_group_FK_2`
        FOREIGN KEY (`group_id`)
        REFERENCES `sf_guard_group` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sf_guard_user_permission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_permission`;

CREATE TABLE `sf_guard_user_permission`
(
    `user_id` INTEGER NOT NULL,
    `permission_id` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`,`permission_id`),
    INDEX `sf_guard_user_permission_FI_2` (`permission_id`),
    CONSTRAINT `sf_guard_user_permission_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `sf_guard_user` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `sf_guard_user_permission_FK_2`
        FOREIGN KEY (`permission_id`)
        REFERENCES `sf_guard_permission` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- testdata
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `testdata`;

CREATE TABLE `testdata`
(
    `HALL` VARCHAR(30) NOT NULL,
    `TTIME` VARCHAR(30),
    `MTYPE` VARCHAR(20),
    `ENTR` INTEGER,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `User` VARCHAR(50) NOT NULL,
    `Name` VARCHAR(50),
    `Gender` VARCHAR(10),
    `Food` VARCHAR(1000),
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Visits` int(11) unsigned DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
