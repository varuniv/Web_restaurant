drop table if exists RESTAURANT;
drop table if exists CUISINE;
drop table if exists UTILISATEUR;

create or replace table CUISINE(
    idCuisine int primary key auto_increment,
    typeCuisine varchar(100)
);

create or replace table RESTAURANT(
    idRestaurant int primary key auto_increment,
    typeRestaurant varchar(255) not null,
    nomRestaurant varchar(255) not null,
    horaires varchar(20),
    numSiret varchar(14),
    numTel varchar(20),
    urlWeb varchar(255),
    departement varchar(100),
    commune varchar(100),
    numDepartement varchar(10),
    vegetarien boolean default false,
    vegan boolean default false,
    entreeFauteuilRoulant boolean default false,
    idCuisine int,
    accesInternet boolean default false,
    marqueRestaurant varchar(255),
    nbEtoiles int check (nbEtoiles between 0 and 5),
    urlFacebook varchar(255)
);

create or replace table UTILISATEUR(
    idUtilisateur int primary key auto_increment,
    pseudo varchar(24),
    motDePasse varchar(24),
    moderateur boolean default false
);

alter table RESTAURANT add foreign key (idCuisine) references CUISINE(idCuisine);

insert into CUISINE (typeCuisine) values
('Française'),
('Italienne');

insert into RESTAURANT (typeRestaurant, nomRestaurant, horaires, numSiret, numTel, urlWeb, departement, commune, numDepartement, vegetarien, vegan, entreeFauteuilRoulant, idCuisine, accesInternet, marqueRestaurant, nbEtoiles, urlFacebook) values
('Bistrot', 'Le Petit Gourmet', '08:00-22:00', '12345678901234', '0123456789', 'http://lepetitgourmet.fr', 'Paris', 'Paris', '75', false, false, true, 1, true, 'Indépendant', 4, 'http://facebook.com/lepetitgourmet'),
('Pizzeria', 'La Bella Pizza', '11:00-23:00', '23456789012345', '0987654321', 'http://labellapizza.it', 'Lyon', 'Lyon', '69', true, false, true, 2, true, 'Franchise', 5, 'http://facebook.com/labellapizza'),
('Gastronomique', 'Chez Pierre', '12:00-23:00', '34567890123456', '0678901234', 'http://chezpierre.com', 'Bordeaux', 'Bordeaux', '33', false, false, false, 1, true, 'Indépendant', 5, 'http://facebook.com/chezpierre'),
('Fast Food', 'Burger Town', '10:00-00:00', '45678901234567', '0555123456', 'http://burgertown.com', 'Marseille', 'Marseille', '13', false, false, true, null, true, 'Franchise', 3, 'http://facebook.com/burgertown'),
('Végétarien', 'Green Eat', '09:00-21:00', '56789012345678', '0444123456', 'http://greeneat.com', 'Toulouse', 'Toulouse', '31', true, true, true, null, true, 'Indépendant', 4, 'http://facebook.com/greeneat');

insert into UTILISATEUR (pseudo, motDePasse, moderateur) values
('Alice123', 'passAlice', false),
('BobLeChef', 'passBob', true),
('Charlie92', 'passCharlie', false),
('AdminJoe', 'passJoe', true),
('EveGourmande', 'passEve', false);