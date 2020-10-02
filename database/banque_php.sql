-- delete database an user if exist
DROP DATABASE IF EXISTS banque_php;
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
