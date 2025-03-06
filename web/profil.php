<?php
$cssFile = "../styles/profil.css";
include 'header.php';


function connexionBd(){
    $serverName = "servinfo-maria";
    $dbName="DBdelahaye";
    $username = "delahaye";
    $password = "delahaye";

    $dsn="mysql:dbname=$dbName;host=$serverName";
    try {
      $connexion = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
      return $connexion;
    } catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage().PHP_EOL;
    }
}

function getAvisUtilisateur($connexion, $idU) {
    $sql = "SELECT D.dateAvis, D.avis, D.note, R.nomRestaurant FROM DONNER D JOIN RESTAURANT R ON D.idRestaurant = R.idRestaurant WHERE D.idUtilisateur = :idU ORDER BY D.dateAvis DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$idUtilisateur = $_SESSION["idUtilisateur"];

$connexion= connexionBd();
$avisUtilisateur = getAvisUtilisateur($connexion, $idUtilisateur);

?>

    <div class="container">
        <h1><?php echo htmlspecialchars($_SESSION["pseudo"]); ?></h1>
    </div>
    <div class="container">
        <h2>Vos avis :</h2>
        <ul>
            <?php if (!empty($avisUtilisateur)) : ?>
                <?php foreach ($avisUtilisateur as $avis) : ?>
                    <li>
                        <div>
                            <h4><?php echo htmlspecialchars($avis['nomRestaurant'])?></h4>
                        </div>
                        <div class="note_utilisateur">
                            <p>Notes :</p>
                            <p><?php echo htmlspecialchars($avis['note'])?>/5</p>
                            <div class="date_avis">
                                <p><?php echo htmlspecialchars($avis['dateAvis'])?></p>
                            </div>
                        </div>
                        <div class="avis_utilisateur">
                            <p><?php echo htmlspecialchars($avis['avis']); ?></p></p>
                        </div>
                        <hr />
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php
include 'footer.php';
?>