<?php
                                                // PAGE DETAIL DES RESTAURANTS
// Publication de l'avis de L'utilisateur
function publierAvis($connexion, $idUtilisateur, $dateAvis, $idResto, $avis, $note) {
    $sql = "INSERT INTO DONNER values (:idUtilisateur, :dateAvis, :idRestaurant, :avis, :note)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
    $stmt->bindParam(':dateAvis', $dateAvis, PDO::PARAM_STR);
    $stmt->bindParam(':idRestaurant', $idResto, PDO::PARAM_INT);
    $stmt->bindParam(':avis', $avis, PDO::PARAM_STR);
    $stmt->bindParam(':note', $note, PDO::PARAM_INT);
    $stmt->execute();
}

// Récupère le restaurant avec son id
function getRestaurant($connexion, $id) {
    $sql = "SELECT * FROM RESTAURANT WHERE idRestaurant = :idR ";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère l'emplacement avec le nom de la commune
function getEmplacement($connexion, $commune){
    $sql = "SELECT * FROM EMPLACEMENT WHERE commune = :commune";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':commune', $commune, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère le nom du (des) type(s) de cuisine du restaurant à partir de l'id du restaurant
function getNomCuisine($connexion, $idR) {
    $sql = "SELECT C.typeCuisine FROM CUISINE C JOIN APPARTENIR A ON C.idCuisine = A.idCuisine WHERE A.idRestaurant = :idR";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère les avis sur un restaurant à partir de l'id du restaurant
function getAvisRestaurant($connexion, $idR) {
    $sql = "SELECT U.pseudo, U.idUtilisateur, D.dateAvis, D.avis, D.note FROM DONNER D JOIN UTILISATEUR U ON D.idUtilisateur = U.idUtilisateur WHERE D.idRestaurant = :idR ORDER BY D.dateAvis DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Supprime l'avis d'un utilisateur sur un restaurant à partir de l'id du restaurant, l'id de l'utilisateur et la date de l'avis
function supprimerAvis($connexion, $idUtilisateur, $dateAvis, $idRestaurant) {
    $sql = "DELETE FROM DONNER WHERE idUtilisateur = :idUtilisateur AND dateAvis = :dateAvis AND idRestaurant = :idRestaurant";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
    $stmt->bindParam(':dateAvis', $dateAvis, PDO::PARAM_STR);
    $stmt->bindParam(':idRestaurant', $idRestaurant, PDO::PARAM_INT);
    $stmt->execute();
}


                                                // PAGE PAGE D'ACCUEIL

// Récupère les restaurants de la base de données par ordre croissant de leur id
function getRestaurants($connexion) {
    $sql = "SELECT R.idRestaurant AS idResto, R.nomRestaurant AS nomResto, R.commune AS ville, E.numDepartement AS dep FROM RESTAURANT R JOIN EMPLACEMENT E ON R.commune = E.commune";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Récupère les restaurants de la base de données par ordre croissant de leur nom
function getRestaurantsByName($connexion) {
    $sql = "SELECT R.idRestaurant AS idResto, R.nomRestaurant AS nomResto, R.commune AS ville, E.numDepartement AS dep FROM RESTAURANT R JOIN EMPLACEMENT E ON R.commune = E.commune ORDER BY nomResto ASC";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Récupère les restaurants de la base de données par ordre croissant de leur note
function getRestaurantsByNote($connexion) {
    $sql = "SELECT R.idRestaurant AS idResto, R.nomRestaurant AS nomResto, R.commune AS ville, E.numDepartement AS dep FROM RESTAURANT R JOIN EMPLACEMENT E ON R.commune = E.commune ORDER BY nbEtoiles DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

                                                // PAGE PROFIL DES UTILISATEURS

// Récupère les avis de l'utilisateurs à partir de l'id de l'utilisateur
function getAvisUtilisateur($connexion, $idU) {
    $sql = "SELECT D.dateAvis, D.avis, D.note, R.idRestaurant, R.nomRestaurant FROM DONNER D JOIN RESTAURANT R ON D.idRestaurant = R.idRestaurant WHERE D.idUtilisateur = :idU ORDER BY D.dateAvis DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

                                                // PAGE LOGIN

// Récupère l'utilisateur à partir de son pseudo
function getUtilisateurByPseudo($pseudo, $connexion) {
    $sql = "SELECT * FROM UTILISATEUR WHERE pseudo = :pseudo";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>