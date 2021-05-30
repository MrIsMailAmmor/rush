<?php
$path = "includes/header.php";
include_once($path);
?>


<!--  fin du menu   -->
<!--  Debut du contenu    -->
<!-- début section accueil -->

<div class="accueil">
    <div class="bgAccueil">
        <div class="textAccueil">
            <h1>Bienvenue Chez RUSH Créteil</h1>
            <p> On vous accompagne dans votre vie universitaire </p>
            <img src="./img/logo.gif" alt="Grand Logo de l'association Rush">
        </div>
    </div>
    <div class="imageAccueil">
        <img src="./img/logo.gif" alt="Grand Logo de l'association Rush">
    </div>

</div>

<!-- fin section accueil -->
<!-- Début section d'actualité -->
<div class="bigcontent">
    <h1>Actualités et Informations</h1>

    <div class="content">
        <div class="contentbox1">
            <div class="content1"><p>Titre 1</p><a href=""><img src="./img/CoverArticle6.jpg" alt="t"></a></div>
            <div class="content1"><p>Titre 2</p><a href=""><img src="./img/CoverArticle5.jpg" alt="t"></a></div>
            <div class="content1"><p>Titre 3</p><a href=""><img src="./img/CoverArticle4.jpg" alt="t"></a></div>
        </div>
    </div>
</div>
<!-- fin section d'actualité -->

<!-- début Evenemment -->
<div class="event">
    <div class="titreEvenement">
        <h1>Nos Événements </h1>
    </div>

    <?php

    include "includes/database.php";
    $pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
    if (!$pdo) {
        echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
    }
    ?>
    <div class="grandEvenement">
        <?php $data = $pdo->query("SELECT * FROM p22_ismail.Evenement ORDER BY id desc Limit 3");
        while ($rows = $data->fetch(PDO::FETCH_OBJ)) :
        ?>

            <div class="evenement"><a href="./Evenementielle.php">
                    <p><?php echo $rows->Title ?></p>
                    <img src="./img/evenement/<?php echo $rows->Img ?>" alt="<?php echo $rows->Title ?>">
                </a>
            </div>
        <?php endwhile ?>
    </div>
</div>
<!-- fin evenement -->
<!--  fin du contenu    -->
<!-- footer -->


<?php
$path = "includes/footer.php";
include($path); ?>
<!-- footer end -->