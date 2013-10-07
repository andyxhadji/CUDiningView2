
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
    `Food` VARCHAR(50),
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
