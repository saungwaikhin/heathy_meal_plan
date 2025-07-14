SET SESSION FOREIGN_KEY_CHECKS=0;

/* Drop Tables */

DROP TABLE IF EXISTS dailyfoodplan;
DROP TABLE IF EXISTS choosepackage;
DROP TABLE IF EXISTS mealplan;
DROP TABLE IF EXISTS foodlist;
DROP TABLE IF EXISTS foodcategory;
DROP TABLE IF EXISTS package;
DROP TABLE IF EXISTS record;
DROP TABLE IF EXISTS user;




/* Create Tables */

CREATE TABLE choosepackage
(
	choose_id int NOT NULL AUTO_INCREMENT,
	package_id int NOT NULL,
	user_id int NOT NULL,
	start_date date,
	finish_date date,
	package_result varchar(255),
	PRIMARY KEY (choose_id)
);


CREATE TABLE dailyfoodplan
(
	daily_id int NOT NULL AUTO_INCREMENT,
	days int,
	choose_id int NOT NULL,
	status int,
	meal_id int NOT NULL,
	PRIMARY KEY (daily_id)
);


CREATE TABLE foodcategory
(
	cat_id int NOT NULL AUTO_INCREMENT,
	cat_name varchar(30),
	PRIMARY KEY (cat_id)
);


CREATE TABLE foodlist
(
	food_id int NOT NULL AUTO_INCREMENT,
	food_name varchar(50),
	cat_id int NOT NULL,
	food_desc varchar(255),
	PRIMARY KEY (food_id)
);


CREATE TABLE mealplan
(
	meal_id int NOT NULL AUTO_INCREMENT,
	meal_type varchar(10),
	meal_time int,
	food_id int NOT NULL,
	meal_desc varchar(255),
	meal_image varchar(255),
	PRIMARY KEY (meal_id)
);


CREATE TABLE package
(
	package_id int NOT NULL AUTO_INCREMENT,
	package_name varchar(50),
	package_type int,
	package_desc varchar(255),
	PRIMARY KEY (package_id)
);


CREATE TABLE record
(
	record_id int NOT NULL AUTO_INCREMENT,
	height_feet int,
	height_inches int,
	weight float,
	bmi float,
	user_id int NOT NULL,
	updated_date date,
	PRIMARY KEY (record_id)
);


CREATE TABLE user
(
	user_id int NOT NULL AUTO_INCREMENT,
	username varchar(15) NOT NULL,
	password varchar(35),
	name varchar(50),
	dob date,
	gender char(2),
	email varchar(100),
	phone varchar(16),
	role int,
	bmi_result float,
	photo varchar(255),
	code varchar(10),
	PRIMARY KEY (user_id),
	UNIQUE (user_id),
	UNIQUE (username)
);



/* Create Foreign Keys */

ALTER TABLE dailyfoodplan
	ADD FOREIGN KEY (choose_id)
	REFERENCES choosepackage (choose_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE foodlist
	ADD FOREIGN KEY (cat_id)
	REFERENCES foodcategory (cat_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE mealplan
	ADD FOREIGN KEY (food_id)
	REFERENCES foodlist (food_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE dailyfoodplan
	ADD FOREIGN KEY (meal_id)
	REFERENCES mealplan (meal_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE choosepackage
	ADD FOREIGN KEY (package_id)
	REFERENCES package (package_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE choosepackage
	ADD FOREIGN KEY (user_id)
	REFERENCES user (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE record
	ADD FOREIGN KEY (user_id)
	REFERENCES user (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



