CREATE SCHEMA `eventsdb` ;

CREATE TABLE `eventsdb`.`events_table` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `events_name_text` VARCHAR(45) NULL,
  `events_url` VARCHAR(45) NULL,
  `events_start_timezone` VARCHAR(45) NULL,
  `events_start_local` VARCHAR(45) NULL,
  `events_start_utc` VARCHAR(45) NULL,
  `events_end_timezone` VARCHAR(45) NULL,
  `events_end_local` VARCHAR(45) NULL,
  `events_end_utc` VARCHAR(45) NULL,
  `events_created` VARCHAR(45) NULL,
  `events_changed` VARCHAR(45) NULL,
  `events_status` VARCHAR(45) NULL,
  `events_is_free` INT NULL,
  `events_currency` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
  
  
/*#	RAW
events_name_text
events_url
events_start_timezone
events_start_local
events_start_utc
events_end_timezone
events_end_local
events_end_utc
events_created
events_changed
events_capacity
events_status
events_is_free
events_currency
*/