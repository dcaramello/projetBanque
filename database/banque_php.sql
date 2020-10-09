-- delete database an user if exist
DROP DATABASE IF EXISTS banque_php;
<<<<<<< HEAD
DROP USER IF EXISTS 'banquePHP'@'localhost';

-- create new database and new user and grant all privileges for user
CREATE DATABASE banque_php;
CREATE USER 'banquePHP'@'localhost' IDENTIFIED BY 'root';

GRANT ALL PRIVILEGES ON banque_php.* TO 'banquePHP'@'localhost';


CREATE TABLE User(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(50) NOT NULL,
  firstname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  city VARCHAR(30) NOT NULL,
  city_code CHAR(5) NOT NULL,
  adress VARCHAR(50) NOT NULL,
  sex CHAR(1) NOT NULL,
  password VARCHAR(255) NOT NULL UNIQUE,
  birth_date DATE NOT NULL,
  PRIMARY KEY (id)
)
ENGINE=InnoDB;

INSERT INTO User(lastname, firstname, email, city, city_code, adress, sex, password, birth_date)
VALUES
("Dupont", "Richard", "r.dupont@gmail.com", "Rouen", "76100", "9 rue du gros horloge", "h", "Riri1962!", "1962-05-21"),
("Melez", "Claire", "clairemelez@outlook.com", "Lille", "59100", "45 rue du Molinel", "f", "AstraGirl154", "1989-11-14");

CREATE TABLE Account(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  amount DECIMAL(11,2) NOT NULL,
  opening_date TIMESTAMP NOT NULL,
  account_type VARCHAR(50) NOT NULL,
  user_id INT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES User(id)
)
ENGINE=InnoDB;

INSERT INTO Account(amount, opening_date, account_type, user_id)
VALUES
(596.23, NOW(), "Compte courant", 1),
(12345, NOW(), "Livret A", 1),
(500, NOW(), "PEL", 1),
(-56.78, NOW(), "Compte courant", 2);

CREATE TABLE Operation(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  operation_type VARCHAR(30) NOT NULL,
  amount DECIMAL(11,2) NOT NULL,
  registered TIMESTAMP NOT NULL,
  label VARCHAR(50) NULL,
  account_id INT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (account_id) REFERENCES Account(id)
)
ENGINE=InnoDB;

INSERT INTO Operation(operation_type, amount, registered, label, account_id)
VALUES
("débit", -15.60, NOW(), "le poulet d'or SARL", 1),
("crédit", 500, NOW(), NULL, 2),
("débit", -7.62, NOW(), "carrefour essence", 2),
("débit", -50, NOW(), "frais de gestion", 2)
;
=======
DROP USER IF EXISTS 'banquePHP'@'*';

-- create new database and new user and grant all privileges for user
CREATE DATABASE banque_php;
CREATE USER 'banquePHP'@'*' IDENTIFIED BY 'root';

GRANT ALL PRIVILEGES ON banque_php.* TO 'banquePHP'@`*`;


-- create 3 tables in database
CREATE TABLE utilisateurs (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  mail varchar(30) NOT NULL,
  mdp varchar(30) NOT NULL,
  compte_id int NOT NULL
);

CREATE TABLE comptes (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  type varchar(30) NOT NULL,
  numéro int NOT NULL,
  ouverture date NOT NULL,
  solde double(10,2) NULL,
  utilisateur_id int NOT NULL
);

CREATE TABLE opérations (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  retrait double(10,2) NULL,
  dépôt double(10,2) NULL,
  compte_id int NOT NULL
);

-- add foreign keys for table
ALTER TABLE comptes
  ADD CONSTRAINT fk_utilisateur_id FOREIGN KEY(utilisateur_id) REFERENCES utilisateurs(id);

ALTER TABLE opérations
  ADD CONSTRAINT fk_compte_id FOREIGN KEY(compte_id) REFERENCES comptes(id);


-- add of some users, accounts and operations in the tables
INSERT INTO utilisateurs (nom, mail, mdp, compte_id)
  VALUE ('John Bobby', 'johnbobby@afpa.fr', 'bobby', 1),
        ('Brice Willous', 'diehard@afpa.fr', 'willous', 2);

INSERT INTO comptes (type, numéro, ouverture, solde, utilisateur_id)
  VALUE ('compte courant', 14052177830, '2020-10-02', 6058.16, 1),
        ('PEL', 30092785114, '2019-06-03', 168400.01, 2);

INSERT INTO opérations (retrait, dépôt, compte_id)
    VALUE (19.90, 38, 1),
          (40, 16.50, 2),
          (10, 3000, 1);
>>>>>>> 807cac678930f6bd9edfa18000d7befddca8c268
