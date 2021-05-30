<?php
$path = "includes/header.php";
include_once($path);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">




<div class="peterSection">

    <div class="sectionUn">
        <img src="./img/logoPeterPan.png" alt="">
        <h1> Peter Pan </h1>
    </div>
    <!-- <p><a href="">projetpeterpan.rush@gmail.com</a> </p> -->
</div>

<div class="sectionDeux">
    <!-- <img src="/rush/img/aideSocial.png" alt="image d'aide sociale"> -->
    <p>Nous sommes joignables par mail: projetpeterpan.rush@gmail.com mais aussi sur Instagram.
        Peter Pan c'est l'entraide, le partage et l'humanité. Nous sommes présent pour discuter avec vous.
        Peter Pan, c’est le pôle solidarité de Rush, créé il y a un an par l’actuel président de Rush Sid Ahmed Bekhti.
        Peter Pan avait pour objectif de lutter contre l’isolement lors du premier confinement.
        A la suite des séquelles du premier confinement, Peter Pan à pris en importance et a élargi son champ d’action.
        Désormais nous faisons de l’accompagnement étudiant, de l’aide pour les démarches administratives, de la
        distribution alimentaire ou encore grâce à nos partenaires tel que la Croix Rouge ou encore l’Escale Étudiante.
        Nous parvenons grâce à eux à aider et à faire toujours mieux pour continuer à aider les étudiants. </p>
    <!-- <img src="/rush/img/nourriture.jpg" alt="image de nourriture"> -->

    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php
            for ($i = 1; $i < 13; $i++) {
                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" aria-label="Slide' . $i . '"></button>';
            }
            ?>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/rushimage/1.jpg" class="d-block w-100 " alt="...">
            </div>
            <?php for ($i = 2; $i < 13; $i++) {
                echo '<div class="carousel-item ">';
                echo '<img src="./img/rushimage/' . $i . '.jpg" class="d-block w-100 " alt="image ' . $i . ' de l\'association rush">';
                echo '</div>';
            }
            ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<?php
$path = "./includes/footer.php";
include_once($path); ?>

