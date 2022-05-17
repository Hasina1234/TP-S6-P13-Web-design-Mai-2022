DROP TABLE IF EXISTS pays;
DROP TABLE IF EXISTS actualite;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS contenu;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS tokenUser;


CREATE TABLE pays (
id SERIAL NOT NULL PRIMARY KEY,
nom VARCHAR(30) NOT NULL);

CREATE TABLE actualite (
id SERIAL NOT NULL PRIMARY KEY,
idPays SMALLINT NOT NULL,
idCat SMALLINT NOT NULL,
titre VARCHAR(30) NOT NULL,
url VARCHAR(25) NOT NULL,
dateActu DATE NOT NULL,
datePublication DATE NOT NULL);

CREATE TABLE categorie (
id SERIAL NOT NULL PRIMARY KEY,
intitule VARCHAR(30) NOT NULL);

CREATE TABLE contenu (
id SERIAL NOT NULL PRIMARY KEY,
idACtu SMALLINT not null,
resume TEXT NOT NULL,
content TEXT NOT NULL);

CREATE TABLE utilisateur (
id SERIAL NOT NULL PRIMARY KEY,
nom VARCHAR(40) NOT NULL,
prenom VARCHAR(30) NOT NULL,
sexe VARCHAR(1) NOT NULL,
dateNaissance DATE NOT NULL,
adress VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
password  VARCHAR(150) NOT NULL);

CREATE TABLE tokenUser (
refToken varchar(150) not null,
idUser SMALLINT NOT NULL,
dateExpiration DATE NOT NULL,
etatToken INT NOT NULL);

ALTER TABLE actualite ADD CONSTRAINT actualite_idPays_pays_id FOREIGN KEY (idPays) REFERENCES pays(id);
ALTER TABLE actualite ADD CONSTRAINT actualite_idCat_categorie_id FOREIGN KEY (idCat) REFERENCES categorie(id);
ALTER TABLE contenu ADD CONSTRAINT contenu_idActu_actualite_id FOREIGN KEY (idActu) REFERENCES actualite(id);
ALTER TABLE tokenUser ADD CONSTRAINT tokenUser_idUser_utilisateur_id FOREIGN KEY (idUser) REFERENCES utilisateur(id);

create extension pgcrypto

insert into utilisateur values(default,'Rafaralahy','Haendel','H','2001-03-20','Ambatomirahavavy','climatique@gmail.com',encode(digest('adminClimat','sha1'),'hex'));

