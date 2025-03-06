-- Restaurants
create table CUISINE(
    idCuisine int primary key auto_increment,
    typeCuisine varchar(42) unique
);

create table TYPERESTAURANT(
    idType int primary key auto_increment,
    typeRestaurant varchar(42)
);

create table EMPLACEMENT(
    commune varchar(42) primary key,
    numDepartement int,
    departement varchar(42)
);

create table RESTAURANT(
    idRestaurant int primary key auto_increment,
    idType int,
    nomRestaurant varchar(42),
    horaires varchar(42),
    siret varchar(25) unique,
    numTel varchar(10) unique,
    urlWeb varchar(100),
    commune varchar(42),
    vegetarien boolean,
    vegan boolean,
    entreeFauteuilRoulant boolean,
    accesInternet boolean,
    marqueRestaurant varchar(42),
    nbEtoiles int check (nbEtoiles<=5),
    urlFacebook varchar(100)
);

create table APPARTENIR(
    idRestaurant int,
    idCuisine int,
    primary key(idRestaurant, idCuisine)
);

-- Avis des utilisateurs
create table UTILISATEUR(
    idUtilisateur int primary key auto_increment,
    pseudo varchar(42),
    passwordUtil varchar(100)
);

create table DATEAVIS(
    idDate int primary key auto_increment,
    dateAvis date
);

create or replace table UTILISATEUR (
    idUtilisateur int primary key auto_increment,
    pseudo varchar(24),
    motDePasse varchar(24),
    moderateur boolean default false
);

create table DONNER(
    idUtilisateur int,
    idDate int,
    idRestaurant int,
    avis varchar(100),
    note int,
    primary key(idUtilisateur, idDate, idRestaurant)
);

alter table RESTAURANT add foreign key (idType) references TYPERESTAURANT (idType);
alter table RESTAURANT add foreign key (commune) references EMPLACEMENT (commune);
alter table APPARTENIR add foreign key (idRestaurant) references RESTAURANT (idRestaurant);
alter table APPARTENIR add foreign key (idCuisine) references CUISINE (idCuisine);
alter table DONNER add foreign key (idUtilisateur) references UTILISATEUR (idUtilisateur);
alter table DONNER add foreign key (idDate) references DATEAVIS (idDate);
alter table DONNER add foreign key (idRestaurant) references RESTAURANT (idRestaurant);