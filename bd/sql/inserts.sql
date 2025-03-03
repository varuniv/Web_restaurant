insert into CUISINE (typeCuisine) values
    ('Française'),
    ('Italienne');

insert into TYPERESTAURANT (typeRestaurant) values
    ("Fast Food"),
    ("Bistrot"),
    ("Gastronomique"),
    ("Végétarien"),
    ("Pizzeria");

insert into EMPLACEMENT values
    (75, "Paris", "Paris"),
    (69, "Rhône", "Lyon"),
    (33, "Gironde", "Bordeaux"),
    (13, "Bouches du Rhône", "Marseille"),
    (31, "Haute Garonne", "Toulouse"),
    (45, "Loiret", "Orléans"),
    (18, "Cher", "Bourges");

insert into RESTAURANT (idType, nomRestaurant, horaires, siret, numTel, urlWeb, numDepartement, vegetarien, vegan, entreeFauteuilRoulant, accesInternet, marqueRestaurant, nbEtoiles, urlFacebook) values
    (2, 'Le Petit Gourmet', '08:00-22:00', '12345678901234', '0123456789', 'http://lepetitgourmet.fr', 75, false, false, true, true, 'Indépendant', 4, 'http://facebook.com/lepetitgourmet'),
    (5, 'La Bella Pizza', '11:00-23:00', '23456789012345', '0987654321', 'http://labellapizza.it', 69, true, false, true, true, 'Franchise', 5, 'http://facebook.com/labellapizza'),
    (3, 'Chez Pierre', '12:00-23:00', '34567890123456', '0678901234', 'http://chezpierre.com', 33, false, false, false, true, 'Indépendant', 5, 'http://facebook.com/chezpierre'),
    (1, 'Burger Town', '10:00-00:00', '45678901234567', '0555123456', 'http://burgertown.com', 13, false, false, true, true, 'Franchise', 3, 'http://facebook.com/burgertown'),
    (4, 'Green Eat', '09:00-21:00', '56789012345678', '0444123456', 'http://greeneat.com', 31, true, true, true, true, 'Indépendant', 4, 'http://facebook.com/greeneat');

insert into APPARTENIR values
    (1, 1),
    (2, 1),
    (3, 2),
    (4, 1),
    (5, 2);


insert into UTILISATEUR (pseudo, motDePasse, moderateur) values
('Alice123', 'passAlice', false),
('BobLeChef', 'passBob', true),
('Charlie92', 'passCharlie', false),
('AdminJoe', 'passJoe', true),
('EveGourmande', 'passEve', false);

insert into DATEAVIS (dateAvis) values
    ("2024-02-28"),
    ("2024-08-31"),
    ("2024-11-11"),
    ("2024-12-25"),
    ("2025-01-29"),
    ("2025-03-08");

insert into DONNER values
    (1, 1, 1, "Avis 1", 0),
    (2, 1, 1, "Coucou c moi", 0),
    (3, 3, 3, "Je suis un avis très utile", 2),
    (4, 5, 4, "Le serveur était pas sympa", 3),
    (4, 3, 5, "C mon premier avis", 2),
    (3, 1, 2, "Je suis très gentil", 1),
    (2, 2, 1, "C le dernier insert des avis", 5);