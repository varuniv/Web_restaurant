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