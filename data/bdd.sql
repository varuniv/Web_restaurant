drop table if exists DONNER;
drop table if exists UTILISATEUR;
drop table if exists DATEAVIS;
drop table if exists APPARTENIR;
drop table if exists RESTAURANT;
drop table if exists EMPLACEMENT;
drop table if exists CUISINE;
drop table if exists TYPERESTAURANT;

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

-- Avis des utilisateurs
create table UTILISATEUR(
    idUtilisateur int primary key auto_increment,
    pseudo varchar(42),
    passwordUtil varchar(100)
);

create or replace table UTILISATEUR (
    idUtilisateur int primary key auto_increment,
    pseudo varchar(24),
    motDePasse varchar(24),
    moderateur boolean default false
);

create table DONNER(
    idUtilisateur int,
    dateAvis date,
    idRestaurant int,
    avis varchar(100),
    note int,
    primary key(idUtilisateur, dateAvis, idRestaurant)
);

create table APPARTENIR(
    idRestaurant int,
    idCuisine int,
    primary key(idRestaurant, idCuisine)
);

alter table RESTAURANT add foreign key (idType) references TYPERESTAURANT (idType);
alter table RESTAURANT add foreign key (commune) references EMPLACEMENT (commune);
alter table APPARTENIR add foreign key (idRestaurant) references RESTAURANT (idRestaurant);
alter table APPARTENIR add foreign key (idCuisine) references CUISINE (idCuisine);
alter table DONNER add foreign key (idUtilisateur) references UTILISATEUR (idUtilisateur);
alter table DONNER add foreign key (idRestaurant) references RESTAURANT (idRestaurant);

insert into CUISINE (typeCuisine) values
    ('Française'),
    ('Italienne');

insert into TYPERESTAURANT (typeRestaurant) values
    ("Fast Food"),
    ("Bistrot"),
    ("Gastronomique"),
    ("Végétarien"),
    ("Pizzeria");

insert into EMPLACEMENT (commune, numDepartement, departement) values
    ("Paris", 75, "Paris"),
    ("Lyon", 69, "Rhône"),
    ("Bordeaux", 33, "Gironde"),
    ("Marseille", 13, "Bouches du Rhône"),
    ("Toulouse", 31, "Haute Garonne"),
    ("Orléans", 45, "Loiret"),
    ("Bourges", 18, "Cher");

insert into RESTAURANT (idType, nomRestaurant, horaires, siret, numTel, urlWeb, commune, vegetarien, vegan, entreeFauteuilRoulant, accesInternet, marqueRestaurant, nbEtoiles, urlFacebook) values
    (2, 'Le Petit Gourmet', '08:00-22:00', '12345678901234', '0123456789', 'http://lepetitgourmet.fr', "Paris", false, false, true, true, 'Indépendant', 4, 'http://facebook.com/lepetitgourmet'),
    (5, 'La Bella Pizza', '11:00-23:00', '23456789012345', '0987654321', 'http://labellapizza.it', "Lyon", true, false, true, true, 'Franchise', 5, 'http://facebook.com/labellapizza'),
    (3, 'Chez Pierre', '12:00-23:00', '34567890123456', '0678901234', 'http://chezpierre.com', "Bordeaux", false, false, false, true, 'Indépendant', 5, 'http://facebook.com/chezpierre'),
    (1, 'Burger Town', '10:00-00:00', '45678901234567', '0555123456', 'http://burgertown.com', "Marseille", false, false, true, true, 'Franchise', 3, 'http://facebook.com/burgertown'),
    (4, 'Green Eat', '09:00-21:00', '56789012345678', '0444123456', 'http://greeneat.com', "Toulouse", true, true, true, true, 'Indépendant', 4, 'http://facebook.com/greeneat');


insert into UTILISATEUR (pseudo, motDePasse, moderateur) values
('Alice123', 'passAlice', false),
('BobLeChef', 'passBob', true),
('Charlie92', 'passCharlie', false),
('AdminJoe', 'passJoe', true),
('EveGourmande', 'passEve', false);

insert into DONNER values
    (1, "2024-02-28", 1, "Avis 1", 0),
    (2, "2024-02-28", 1, "Coucou c moi", 0),
    (3, "2024-11-11", 3, "Je suis un avis très utile", 2),
    (4, "2025-01-29", 4, "Le serveur était pas sympa", 3),
    (4, "2024-11-11", 5, "C mon premier avis", 2),
    (3, "2024-02-28", 2, "Je suis très gentil", 1),
    (2, "2024-08-31", 1, "C le dernier insert des avis", 5);