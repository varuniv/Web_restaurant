<?php
$cssFile = "../styles/inscription.css";
include 'header.php';
?>
<div class="container">
    <h1>Formulaire d'inscription</h1>
</div>
<div class="inscription_div">
        <form action="inscription.php" method="POST">
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required value="">
                <label for="adresseMail">Votre adresse e-mail :</label>
                <input type="text" id="adresseMail" name="adresseMail" required value="">
                <label for="motDePasse">Votre mot de passe :</label>
                <input type="password" id="motDePasse" name="motDePasse" required value="">
            <div class="inscription_div">
                <button type="submit" name="inscription" class="btn_inscription">Ajouter</button>
            </div>
        </form>
</div>

<?php
include 'footer.php';
?>