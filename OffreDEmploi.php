<?php

$path = "./includes/header.php";

include_once($path);
include "includes/database.php";
$pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
if (!$pdo) {
    echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
}
?>
<div class="offreTitle">
    <h1> Offre d'emploi</h1>
</div>
<div class="offres">

    <?php $data = $pdo->query("SELECT * FROM p22_ismail.postes ORDER BY Created_at DESC");
    while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
        <div class="card">
            <img src="<?php echo "./img/offreEmploi/" . $rows->Img ?>" class="cardImg" alt="...">
            <div class="cardBody">
                <h5 class="cardTitle"><?php echo $rows->Description ?></h5>
                <a class="cardBtn" href="Detail.php?ID=<?php echo $rows->id ?>">Plus de détails</a>
                <p class="cardDate"><?php echo $rows->Created_at ?></p>
            </div>
        </div>

    <?php endwhile ?>
</div>
<?php
$path = "./includes/footer.php";
include_once($path); ?>