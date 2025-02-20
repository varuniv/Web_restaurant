-- SQLite
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Cuisine;

CREATE TABLE Restaurant (
    idRestaurant INTEGER  PRIMARY KEY NOT NULL,
    typeRestaurant VARCHAR(255) NOT NULL,
    nomRestaurant VARCHAR(255) NOT NULL,
    horaires VARCHAR(20),
    numSiret VARCHAR(14),
    numTel VARCHAR(20),
    urlWeb VARCHAR(255),
    departement VARCHAR(100),
    commune VARCHAR(100),
    numDepartement VARCHAR(10),
    vegetarien BOOLEAN DEFAULT FALSE,
    vegan BOOLEAN DEFAULT FALSE,
    entreeFauteuilRoulant BOOLEAN DEFAULT FALSE,
    idCuisine INTEGER ,
    accesInternet BOOLEAN DEFAULT FALSE,
    marqueRestaurant VARCHAR(255),
    nbEtoiles INTEGER  CHECK (nbEtoiles BETWEEN 0 AND 5),
    urlFacebook VARCHAR(255),
    FOREIGN KEY (idCuisine) REFERENCES Cuisine(idCuisine)
);

CREATE TABLE Cuisine (
    idCuisine INTEGER PRIMARY KEY AUTOINCREMENT,
    typeCuisine VARCHAR(100)
);

CREATE TABLE Utilisateur (
    idUtilisateur INTEGER PRIMARY KEY AUTOINCREMENT,
    pseudo VARCHAR(24),
    motDePasse VARCHAR(24),
    moderateur BOOLEAN DEFAULT FALSE
);

-- Insertion de cuisines
INSERT INTO Cuisine (typeCuisine) VALUES
('Française'),
('Italienne');

-- Insertion de restaurants
INSERT INTO Restaurant (typeRestaurant, nomRestaurant, horaires, numSiret, numTel, urlWeb, departement, commune, numDepartement, vegetarien, vegan, entreeFauteuilRoulant, idCuisine, accesInternet, marqueRestaurant, nbEtoiles, urlFacebook) VALUES
('Bistrot', 'Le Petit Gourmet', '08:00-22:00', '12345678901234', '0123456789', 'http://lepetitgourmet.fr', 'Paris', 'Paris', '75', FALSE, FALSE, TRUE, 1, TRUE, 'Indépendant', 4, 'http://facebook.com/lepetitgourmet'),
('Pizzeria', 'La Bella Pizza', '11:00-23:00', '23456789012345', '0987654321', 'http://labellapizza.it', 'Lyon', 'Lyon', '69', TRUE, FALSE, TRUE, 2, TRUE, 'Franchise', 5, 'http://facebook.com/labellapizza'),
('Gastronomique', 'Chez Pierre', '12:00-23:00', '34567890123456', '0678901234', 'http://chezpierre.com', 'Bordeaux', 'Bordeaux', '33', FALSE, FALSE, FALSE, 1, TRUE, 'Indépendant', 5, 'http://facebook.com/chezpierre'),
('Fast Food', 'Burger Town', '10:00-00:00', '45678901234567', '0555123456', 'http://burgertown.com', 'Marseille', 'Marseille', '13', FALSE, FALSE, TRUE, NULL, TRUE, 'Franchise', 3, 'http://facebook.com/burgertown'),
('Végétarien', 'Green Eat', '09:00-21:00', '56789012345678', '0444123456', 'http://greeneat.com', 'Toulouse', 'Toulouse', '31', TRUE, TRUE, TRUE, NULL, TRUE, 'Indépendant', 4, 'http://facebook.com/greeneat');

INSERT INTO Utilisateur (pseudo, motDePasse, moderateur) VALUES
('Alice123', 'passAlice', FALSE),
('BobLeChef', 'passBob', TRUE),
('Charlie92', 'passCharlie', FALSE),
('AdminJoe', 'passJoe', TRUE),
('EveGourmande', 'passEve', FALSE);
