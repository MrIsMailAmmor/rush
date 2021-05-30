<?php

include "includes/database.php";
$pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
if (!$pdo) {
    echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
}

$path = "includes/header.php";
include_once($path); ?>



<div class="containerAssoc">
    <div class="colonne1">
        <div class="textAssoc1">
            <h1>L'ASSO</h1>
        </div>
        <div class="textAssoc2">
            <h2>Où        SOMMES-NOUS ? </h2>
        </div>
    </div>
    <div class="colonne2">
        <div class="presentationAssoc">
            <p><span>RUSH</span> a pour objectif de faciliter et d'animer la vie universitaire
                des étudiants en Sciences Humaines, en passant par des activités
                festives ou ludiques rattachant des objectifs de partage de culture,
                d'ouverture à la prévention pour la santé des étudiants.
                Y sont rassemblés les départements d'Anglais,
                Allemand, Lettres Romanes, Histoire, Géographie, Philosophie,
                Lettres, Communication et Langues Etrangères Appliquées.
                Mais RUSH reste à la disposition de tous les étudiants de l'UPEC.</p>
        </div>
        <div class="googleMap">
            <h3>Notre Localisation</h3>
            <img class="loca1" src="./img/Localisation.png" alt="Adresse de Rush Créteil">
            <img class="loca2" src="./img/Localisation2.png" alt="Adresse de Rush Créteil">
        </div>
    </div>
</div>


<?php $data = $pdo->query('SELECT * FROM p22_ismail.membre where Role="Président"');
?>
<div class="grpCadre">
    <h1>Président</h1>
    <div class="lesCadres">

        <?php while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <div class="cadreMembre">
                <img src=<?php echo "./img/membre/" . $rows->Img ?> alt="image de <?php echo $rows->Nom . " " . $rows->Prenom ?>">
                <p class=""><?php echo $rows->Nom . " " . $rows->Prenom ?></p>
                <p><?php echo $rows->Role ?></p>
                <p class="membreDesc"><?php echo $rows->Description ?></p>
            </div>
        <?php endwhile ?>
    </div>
</div>



<?php $data = $pdo->query('SELECT * FROM p22_ismail.membre where Role="Chef"');
?>
<div class="grpCadre">
    <h1>Chef de pôle</h1>
    <div class="lesCadres">

        <?php while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <div class="cadreMembre">
                <img src=<?php echo "./img/membre/" . $rows->Img ?> alt="image de <?php echo $rows->Nom . " " . $rows->Prenom ?>">
                <p class=""><?php echo $rows->Nom . " " . $rows->Prenom ?></p>
                <p><?php echo $rows->Role ?></p>
                <p class="membreDesc"><?php echo $rows->Description ?></p>
            </div>
        <?php endwhile ?>
    </div>
</div>



<?php $data = $pdo->query('SELECT * FROM p22_ismail.membre where Role="Membre"');
?>
<div class="grpCadre">
    <h1>Membres</h1>
    <div class="lesCadres">

        <?php while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <div class="cadreMembre">
                <img src=<?php echo "./img/membre/" . $rows->Img ?> alt="image de <?php echo $rows->Nom . " " . $rows->Prenom ?> ">
                <p class=""><?php echo $rows->Nom . " " . $rows->Prenom ?></p>
                <p><?php echo $rows->Role ?></p>
                <p class="membreDesc"><?php echo $rows->Description ?></p>
            </div>
        <?php endwhile ?>
    </div>
</div>




<?php
$path = "includes/footer.php";
include_once($path); ?>