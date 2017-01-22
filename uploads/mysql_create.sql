SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `city`;

DROP TABLE IF EXISTS `country`;

DROP TABLE IF EXISTS `district`;

DROP TABLE IF EXISTS `region`;
DROP TABLE IF EXISTS `employees_groups`;
DROP TABLE IF EXISTS `employee`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `delivery`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `orders_items`;
DROP TABLE IF EXISTS `payment`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
CREATE TABLE `city` (
  `cit_id`         INT          NOT NULL AUTO_INCREMENT,
  `cit_id_country` INT          NOT NULL,
  `cit_id_region`  INT          NOT NULL,
  `cit_name`       varchar(128) NOT NULL,
  `created_at`     TIMESTAMP    NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`     TIMESTAMP    NULL,
	PRIMARY KEY (`cit_id`)
);
CREATE TABLE `country` (
  `cou_id`      INT          NOT NULL AUTO_INCREMENT,
  `cou_id_city` INT          NOT NULL,
  `cou_name`    varchar(128) NOT NULL,
  `created_at`  TIMESTAMP    NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  TIMESTAMP    NULL,
	PRIMARY KEY (`cou_id`)
);
CREATE TABLE `district` (
  `dis_id`         INT       NOT NULL AUTO_INCREMENT,
  `dis_id_country` INT       NOT NULL,
  `dis_id_region`  INT       NOT NULL,
  `dis_id_city`    INT       NOT NULL,
  `dis_name`       varchar(255),
  `dis_active`     INT,
  `created_at`     TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`     TIMESTAMP NULL,
	PRIMARY KEY (`dis_id`)
);
CREATE TABLE `region` (
  `reg_id`         INT         NOT NULL AUTO_INCREMENT,
  `reg_id_country` INT         NOT NULL,
  `reg_id_city`    INT         NOT NULL,
  `reg_name`       varchar(64) NOT NULL,
  `created_at`     TIMESTAMP   NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`     TIMESTAMP   NULL,
	PRIMARY KEY (`reg_id`)
);
CREATE TABLE `employees_groups` (
  `emg_id`     INT NOT NULL AUTO_INCREMENT,
  `emg_name`   varchar(255),
  `emg_option` TEXT,
	PRIMARY KEY (`emg_id`)
);
INSERT IGNORE INTO `employees_groups` (`emg_id`, `emg_name`, `emg_option`) VALUES
                            (1, 'Гости', '{}'),
                            (2, 'Поставщики', '{}'),
                            (3, 'Клиент', '{}'),
                            (4, 'Менеджер', '{}'),
                            (5, 'Админ', '{}');

CREATE TABLE `employee` (
  `emp_id`                  INT       NOT NULL AUTO_INCREMENT,
  `emp_id_user`             INT       NOT NULL,
  `emp_employees_groups_id` INT       NOT NULL,
  `emp_lname`               varchar(255),
  `emp_name`                VARCHAR(255),
  `emp_fname`               VARCHAR(255),
  `emp_email`               varchar(255),
  `emp_password`            varchar(255),
  `emp_salt`                TEXT      NOT NULL,
  `emp_confirm`             INT       NOT NULL DEFAULT '0',
  `emp_online`              INT       NOT NULL DEFAULT '0',
  `emp_online_date`         TIMESTAMP NULL,
  `created_at`              TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`              TIMESTAMP NULL,
	PRIMARY KEY (`emp_id`)
);
INSERT INTO employee (emp_id, emp_employees_groups_id, emp_fname, emp_lname, emp_email,
                            emp_password, emp_online_date, emp_online, emp_salt, emp_confirm)
                            VALUES (1, 5, 'Admin', '', 'admin@waterbuy.net', 'd54bbdef05bdc249ff19f05045dc9ba6', '2017-01-15 14:34:30', 0, '6fb6b846e', 1);
CREATE TABLE `users` (
  `use_id`                         INT       NOT NULL AUTO_INCREMENT,
  `use_id_country`                 INT       NULL,
  `use_id_region`                  INT       NULL,
  `use_id_city`                    INT       NULL,
  `use_id_district`                INT,
  `use_organization`               varchar(255),
  `use_last_name`                  varchar(255),
  `use_name`                       varchar(255),
  `use_father_name`                varchar(255),
  `use_birthday`                   DATE,
  `use_male`                       varchar(255),
  `use_phone`                      varchar(255),
  `use_email`                      varchar(255),
  `use_comments`                   varchar(255),
  `use_street`                     varchar(255),
  `use_building`                   varchar(255),
  `use_room`                       varchar(255),
  `use_intercom`                   varchar(255),
  `use_destonation`                varchar(255),
  `use_last_name_logist`           varchar(255),
  `use_name_logist`                varchar(255),
  `use_father_name_logist`         varchar(255),
  `use_phone_logist`               varchar(255),
  `use_email_logist`               varchar(255),
  `use_time_receive_orders_begin`  TIME,
  `use_time_receive_orders_end`    TIME,
  `use_time_delivery_orders_begin` TIME,
  `use_time_delivery_orders_end`   TIME,
  `use_days_reception_orders`      TEXT,
  `use_days_delivery_orders`       TEXT,
  `use_rating`                     INT                DEFAULT '0',
  `use_ballance`                   FLOAT(10,2)        DEFAULT '0',
  `use_count_done_orders`          INT                DEFAULT '0',
  `created_at`                     TIMESTAMP NULL     DEFAULT CURRENT_TIMESTAMP,
  `updated_at`                     TIMESTAMP NULL,
	PRIMARY KEY (`use_id`)
);
CREATE TABLE `delivery` (
  `del_id`          INT       NOT NULL AUTO_INCREMENT,
  `del_name`        varchar(255),
  `del_id_country`  INT       NOT NULL,
  `del_id_region`   INT       NOT NULL,
  `del_id_city`     INT       NOT NULL,
  `del_id_district` INT,
  `del_id_user`     INT       NOT NULL,
  `del_id_products` INT,
  `del_street`      VARCHAR(255),
  `del_building`    VARCHAR(255),
  `del_room`        VARCHAR(255),
  `del_intercom`    VARCHAR(255),
  `del_destonation` VARCHAR(255),
  `del_active`      INT                DEFAULT '0',
  `created_at`      TIMESTAMP NULL     DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      TIMESTAMP NULL,
	PRIMARY KEY (`del_id`)
);
CREATE TABLE `products` (
  `prd_id`                INT       NOT NULL AUTO_INCREMENT,
  `prd_id_user`           INT       NOT NULL,
  `prd_title`             varchar(255),
  `prd_description`       TEXT,
  `prd_title_producer`    varchar(255),
  `prd_comments`          TEXT,
  `prd_volume_price`      FLOAT(10,2)        DEFAULT '0',
  `prd_price`             FLOAT(10,2)        DEFAULT '0',
  `prd_file`              TEXT,
  `prd_file_certificates` TEXT,
  `prd_rating`            INT                DEFAULT '0',
  `prd_id_category`       INT       NOT NULL,
  `created_at`            TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`            TIMESTAMP NULL,
	PRIMARY KEY (`prd_id`)
);
CREATE TABLE `orders` (
  `odr_id`                INT       NOT NULL AUTO_INCREMENT,
  `ord_id_user`           INT,
  `ord_father_name`       varchar(255),
  `ord_name`              varchar(255),
  `ord_last_name`         varchar(255),
  `ord_phone`             varchar(25),
  `ord_commetns`          TEXT,
  `ord_delivery_datetime` DATETIME,
  `ord_author`            INT,
  `ord_id_country`        INT,
  `ord_id_region`         INT,
  `ord_id_city`           INT,
  `ord_id_district`       INT,
  `ord_street`            varchar(255),
  `ord_building`          varchar(255),
  `ord_room`              varchar(255),
  `ord_intercom`          varchar(255),
  `ord_destonation`       TEXT(255),
  `ord_done`              INT                DEFAULT '0',
  `created_at`            TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`            TIMESTAMP NULL,
	PRIMARY KEY (`odr_id`)
);
CREATE TABLE `category` (
  `cat_id`     INT       NOT NULL AUTO_INCREMENT,
  `cat_pid`    INT,
  `cat_name`   varchar(255),
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
	PRIMARY KEY (`cat_id`)
);
CREATE TABLE `orders_items` (
  `ori_id`          INT       NOT NULL AUTO_INCREMENT,
  `ori_id_products` INT       NOT NULL,
  `ori_count`       INT                DEFAULT '1',
  `ori_price`       FLOAT(10,2)        DEFAULT '0',
  `ori_sum`         FLOAT(10,2)        DEFAULT '0',
  `ori_done`        INT                DEFAULT '0',
  `ori_comments`    TEXT,
  `created_at`      TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      TIMESTAMP NULL,
	PRIMARY KEY (`ori_id`)
);
CREATE TABLE `payment` (
  `pay_id`       INT NOT NULL AUTO_INCREMENT,
  `pay_id_users` INT NOT NULL,
  `pay_id_order` INT,
  `pay_pay_sum`  INT NOT NULL,
  `pay_type`     INT NOT NULL DEFAULT '0',
	PRIMARY KEY (`pay_id`)
)