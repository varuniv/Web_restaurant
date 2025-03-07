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