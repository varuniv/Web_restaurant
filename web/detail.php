<?php
$cssFile = "../styles/detail.css";
include 'header.php';
?>
    <div class="container container_background">
        <div class="description_div">
            <div class="notes_div">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
                <img class="icon_notes" src="../img/fourchette_dorée.jpg" alt="Note du restaurant">
            </div>
            <h2>Au bon chico</h2>
            <p class="adresse_p">12 rue de Disney, 93000 Disneyland</p>
            <div class="categorie_div">
                <p>Fast Food</p>
                <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                <p>Salade</p>
                <img class="point_dore" src="../img/point_or.png" alt="Petit point en or">
                <p>Viandard</p>
            </div>
            <div class="histoire_div">
                <p>Au fil du temps, de la ferme familiale, des hommes et des femmes ont senti le vent du changement, et se sont adaptés aux nouveaux modes de vie. Les murs des "Etxe" ont vu la création de commerces et d’auberges aux prémices du tourisme.
                Les générations suivantes ont pris le relais, en faisant évoluer les établissements vers d’autres horizons. Des tables authentiques aux étoilées, des familles se sont impliquées dans la transmission de leur patrimoine, leur culture et leur passion.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <img src="../img/ornement_accueil.png" alt="Ornement">
    </div>
    <div class="container">
        <h3>Avis :</h3>
        <ul>
            <li>
                <hr />
                <div class="profil_utilisateur">
                    <img src="../img/icon_profil.png" alt="Icon de profil">
                    <h4>Michel Boulanger</h4>
                </div>
                <div class="note_utilisateur">
                    <p>Notes :</p>
                    <p>1/5</p>
                </div>
                <div class="avis_utilisateur">
                    <p>On a eu froid du début à la fin du repas un problème de joint mal isolé sur la porte d’entrée selon la serveuse bref pas une bonne expérience et malgré une réduction de 30 % grâce a la fourchette le prix moyen par personne reste à 35 euros ! La prochaine fois j’irai prendre entrée plat dessert dans une brasserie bocuse à ce prix là Très déçue je ne reviendrai pas</p>
                </div>
                <hr />
            </li>
        </ul>
    </div>
<?php
include 'footer.php';
?>