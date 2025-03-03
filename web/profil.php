<?php
$cssFile = "../styles/profil.css";
include 'header.php';
?>

    <div class="container">
        <h1><?php echo htmlspecialchars($_SESSION["pseudo"]); ?></h1>
    </div>
    <div class="container">
        <h2>Vos avis :</h2>
        <div>
            <hr />
            <div class="note_utilisateur">
                <p>Notes :</p>
                <p>1/5</p>
            </div>
            <div class="avis_utilisateur">
                <p>On a eu froid du début à la fin du repas un problème de joint mal isolé sur la porte d’entrée selon la serveuse bref pas une bonne expérience et malgré une réduction de 30 % grâce a la fourchette le prix moyen par personne reste à 35 euros ! La prochaine fois j’irai prendre entrée plat dessert dans une brasserie bocuse à ce prix là Très déçue je ne reviendrai pas</p>
            </div>
            <hr />
        </div>
    </div>
<?php
include 'footer.php';
?>