DROP DATABASE IF EXISTS banque_php;
CREATE DATABASE banque_php CHARACTER SET 'utf8';
DROP USER IF EXISTS banquePHP;

CREATE USER 'banquePHP'@'banque_php' IDENTIFIED BY 'CoucouCNous';

GRANT ALL PRIVILEGES ON banque_php.* TO 'banquePHP'@'banque_php';

CREATE TABLE Users (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	date_creation DATE NOT NULL,
	login VARCHAR(30) NOT NULL,
	password VARCHAR(40) NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE Accounts (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	number VARCHAR(20) NOT NULL,
	user_id INT UNSIGNED NOT NULL,
	account_type_id INT UNSIGNED NOT NULL,
	bank_id INT UNSIGNED NOT NULL,
	montant DOUBLE(7,2),
	PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE Account_Types (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE Transferts (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	type BOOLEAN NOT NULL,
	amount DOUBLE(7,2) NOT NULL,
	account_id INT UNSIGNED NOT NULL,
	date_transfert DATETIME NOT NULL,
	PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE Banks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL,
	address VARCHAR(50) NOT NULL,
	national_id VARCHAR(20) NOT NULL,
	PRIMARY KEY(id)
)
ENGINE = InnoDB;

ALTER TABLE Accounts
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `fk_account_type_id` FOREIGN KEY (`account_type_id`) REFERENCES `Account_Types` (`id`),
  ADD CONSTRAINT `fk_bank_id` FOREIGN KEY (`bank_id`) REFERENCES `Banks`(`id`);
  
ALTER TABLE Transferts
	ADD CONSTRAINT `fk_account_id` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`);


INSERT INTO Users (name, date_creation, login, password)
	VALUES 	('Jackie LaFrite', '2020-01-22', 'JL1234', 'potatoes<3'),
			('Miguel SanChez', '2018-05-12', 'MS9876', 'azerty1');
INSERT INTO Account_Types (name) 
	VALUES 	('PEL'),
			('Livret A');
INSERT INTO Banks (name, address, national_id)
	VALUES 	('Rouen', '2 rue du poney qui tousse', '123456789A'),
			('Rouen', '14 avenue de Naheulbeuk', '123456789B');
INSERT INTO Accounts (number, user_id, account_type_id, bank_id, montant)
	VALUES 	('123456789', 1, 2, 1, 3021),
			('9876543210', 2, 1, 2, 8233);
INSERT INTO Transferts (type, amount, account_id, date_transfert)
	VALUES 	(0, 521.36, 1, '2020-03-20 15:41:12'),
			(1, 521.36, 2, '2020-03-20 15:41:12');