create table utilisateur(
	idUser int not null primary key auto_increment,
	nom varchar(20),
	prenom varchar(20),
	sexe varchar(10),
	dtn date,
	adresse varchar(50),
	email varchar(100),
	mdp varchar(100)
);

create table tokenUser(
	idToken int not null primary key auto_increment,
	token varchar(100),
	idUser int,
	daty date,
	etat int,
	foreign key (idUser) references utilisateur(idUser)
);

create table pays(
	idPays int not null primary key auto_increment,
	pays varchar(10),
	photo varchar(50)
);

create table categorie(
	idCat int not null primary key auto_increment,
	categorie varchar(30)
);

create table actualite(
	idActu int not null primary key auto_increment,
	idPays int,
	idCat int,
	titre varchar(100),
	url varchar(200),
	contenu varchar(1000),
	dateActu date,
	daty date,
	foreign key (idPays) references pays(idPays),
	foreign key (idCat) references categorie(idCat)
);


insert into utilisateur values(null,'hasina','rakoto','homme','2000-10-17','III P 26 BHJ Marohoho','nirina218@gmail.com',sha1('0000'));

insert into pays values(null,'Chine','chine.jpg');
insert into pays values(null,'Brésil','bresil.jpg');
insert into pays values(null,'Bangladesh','bangladesh.jpg');
insert into pays values(null,'Etas-unis','etats-unis.jpg');
insert into pays values(null,'Inde','inde.jpg');
insert into pays values(null,'Indonesie','indonesie.jpg');
insert into pays values(null,'Iran','iran.jpg');
insert into pays values(null,'Japon','japon.jpg');
insert into pays values(null,'Pakistan','pakistan.jpg');
insert into pays values(null,'Philipine','philipine.jpg');


insert into categorie values(null,'Rechauffement climatique');



	
