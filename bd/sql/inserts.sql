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