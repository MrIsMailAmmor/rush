<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/rush/includes/header.php";
include_once($path);

?>


<!--  fin du menu   -->
<!--  Debut du contenu    -->
<!-- début section accueil -->
<?php  include_once 'includes/database.php';?>
<div class="accueil">
    <div class="bgAccueil">
        <div class="textAccueil">
            <h1>Bienvenu Chez l'Assocation RUSH</h1>
            <p> un mini text ici pour parler de l'assoc rapidement</p>
            <img src="/rush/img/logo.gif" alt="Grand Logo de l'association Rush">
        </div>
    </div>
    <div class="imageAccueil">
        <img src="/rush/img/logo.gif" alt="Grand Logo de l'association Rush">
    </div>

</div>

<!-- fin section accueil -->
<!-- Début section d'actualité -->
<div class="bigcontent">
    <h1>Actualités et Informations</h1>

    <div class="content">
        <div class="contentbox1">
            <div class="content1"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
            <div class="content1"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
            <div class="content1"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
        </div>
        <div class="contentbox2">
            <div class="content2"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
            <div class="content2"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
            <div class="content2"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
        </div>

    </div>
</div>
<!-- fin section d'actualité -->

<!-- début Evenemment -->
<div class="event">
    <div class="titreEvenement">
        <h1>Nos Événement </h1>
    </div>
    <div class="grandEvenement">
        <div class="evenement"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
        <div class="evenement"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
        <div class="evenement"><a href=""><img src="img/imgCouverture1.jpg" alt=""></a></div>
    </div>



</div>
<!-- fin evenement -->
<!--  fin du contenu    -->
<!-- footer -->


<?php $path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/rush/includes/footer.php";
include_once($path); ?>
<!-- footer end -->
</body>

</html>