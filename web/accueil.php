<?php
$cssFile = "../styles/accueil.css";
include 'header.php';
?>
        <div class="container">
            <h1>Le Restaurant de la semaine</h1>
        </div>
        <div class="container restau_semaine_div">
            <div class="moitie_div description_semaine">
                <h2>Nom du restaurant de la semaine</h2>
                <p class="adresse_p">Adresse</p>
                <p>Description du restaurant : Difficile de trouver meilleur emplacement. Situé au cœur de Paris devant le jardin du Luxembourg Riverains, touristes et bobos en goguette prennent déjà d’assaut sa terrasse ensoleillée pour siroter leurs cocktails.</p>
            </div>
            <div class="img_restaurant_div moitie_div">
                <img src="../img/restaurant_semaine.png" alt="Image du restaurant de la semaine">
            </div>
        </div>     
        <div class="container">
            <img src="../img/ornement_accueil.png" alt="Ornement de la page d'accueil">
            <h1>Nos restaurants</h1>
            <div class="recherche_div">
                <input type="text" class="recherche_nom" placeholder="Rechercher un restaurant...">
                <select class="tri_select">
                    <option value="nom">Trier par nom</option>
                    <option value="note">Trier par note</option>
                </select>
            </div>
        <div>
        <div class="container">
            <div class="restaurant_div">
                <div class="img_restaurant_div">
                    <img src="../img/exemple_restaurant.jpg" class="img_card" alt="Image du Restaurant">
                    <h3>Nom du Restaurant</h3>
                    <p>Adresse</p>
                </div>
                <div>
                    <a href="detail.php">Voir les informations</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>