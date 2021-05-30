<!DOCTYPE html>
<html lang="fr">

<?php

// echo realpath('index.php') . PHP_EOL;


$pathBase = "/rush/style/";
$pathDebut = "/rush/";

?>

<head>
    <meta charset="utf-8">
    <title>Rush Association</title>
    <link rel="stylesheet" href='./style/style.css' />
    <link rel="stylesheet" href='./style/carousel.css' />
    <link rel="stylesheet" href='./style/AssociationStyle.css' />
    <link rel="stylesheet" href='./style/peterPan.css' />
    <link rel="stylesheet" href='./style/offreEmploi.css' />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Righteous&display=swap" rel="stylesheet">
    <link rel=" preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
</head>


<body onload="start()">

    <div class="up">
        <a href="#top" tabindex="0" title="monter vers le haut"><img src="./img/iconPng/upSigne.png" alt="montez"></a>
    </div>

    <nav class="nav" id="top">
        <div class="police">
            <label for="police"> Police </label>
            <select tabindex="0" class="choix" id="police" name="police" onchange="changerPolice();">
                <option class="choix">Classique</option>
                <option class="choix">OpenDyslexic</option>
                <option class="choix">Luciole</option>
            </select>
        </div>
        <div class="navAccess">
            <div class="accessibilitySigne">
                <ul>
                    <li><img onclick="show()" tabindex="0" class="imgacess" src="./img/accessibility.png" alt="signe d'accessibilité">
                        <ul class="SousMenuAccessible" id="SousMenuAccessible">
                            <li tabindex="0" onclick="changerContrast()"> <img src="./img/iconPng/Contrast.png" alt="agrandir"></li>
                            <li tabindex="0" onclick="changerTaille(+0.3)"> <img src="./img/iconPng/A+.png" alt="agrandir"></li>
                            <li tabindex="0" onclick="tailleParDefaut()"> <img src="./img/iconPng/A.png" alt="retourner au normal"></li>
                            <li tabindex="0" onclick="changerTaille(-0.3)"> <img src="./img/iconPng/A-.png" alt="agrandir"></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <div class="logo">
            <a href="./index.php"><img src="./img/logo.png" alt="logo" style="width: 50px; height : 50px;"></a>
            <p><a href="">RUSH</a> </p>
        </div>
        <div class="menudiv" id="menuli">
            <ul class="menu" id="menu">
                <li><a href="./">Accueil</a> </li>
                <li><a href="./Association.php">L'Association</a> </li>
                <li><a href="./PeterPan.php"> Peter Pan</a></li>
                <li><a href="#">Pôles <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
                    <ul class="submenu" onclick="dropDownMenu()">
                        <li><a href="./Lykeion.php">Lykeion</a> </li>
                        <li><a href="./U-JAM.php">U-JAM</a></li>
                        <li><a href="./ChessClub.php">Chess Club</a></li>
                        <li><a href="./GN.php">GN</a></li>
                    </ul>
                </li>
                <li><a href="#">InterPôles <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
                    <ul class="submenu">
                        <!-- <li><a href="/interPoles/PolitiqueEtudiante.php">Politique Etudiante</a> </li> -->
                        <li><a href="./Evenementielle.php">Evénementielle</a></li>
                        <li><a href="./Partenariats.php">Partenariats</a></li>
                        <!-- <li><a href="/interPoles/Communication.php">Communication</a></li> -->
                    </ul>
                </li>
                <li><a href="#">UPEC <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
                    <ul class="submenu">
                        <li><a href="./UPECTualités.php">UPECtualités</a> </li>
                        <li><a href="./OffreDEmploi.php">Offre d'emploi</a></li>
                    </ul>
                </li>
            </ul>
            

            <?php


            function arialLink()
            {
                $index = "index";
                $chemin_page = $_SERVER['PHP_SELF'];

                $chemin_decoupe = explode("/", $chemin_page);
                for ($i = 1; $i < count($chemin_decoupe); $i++) {
                    echo ('<a href="/');
                    for ($j = 1; $j <= $i; $j++) {
                        echo ($chemin_decoupe[$j]);
                        if ($j != count($chemin_decoupe) - 1) {
                            echo ("/");
                        }
                    }
                    if ($i == count($chemin_decoupe) - 1) {
                        $chemin_prec = explode(".", $chemin_decoupe[$i]);
                        if ($chemin_prec[0] == $index) $chemin_prec[0] = "";
                        $chemin_prec[0] = $chemin_prec[0] . "</a>";
                    } else $chemin_prec[0] = $chemin_decoupe[$i] . '</a> > ';
                    echo ('">');
                    echo (str_replace("_", " ", $chemin_prec[0]));
                }
            }
            ?>
        </div>
        <div tabindex="0" onclick="openMenu()" class="buttonMenu"><em class="fas fa-bars fa-2x"></em></div>
    </nav>
    <ul class="menu2">
        <li><a href="./">Accueil</a> </li>
        <li><a href="./Association.php">L'Association</a> </li>
        <li><a href="./PeterPan.php"> Peter Pan</a></li>
        <li><a href="#">Pôles <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
            <ul class="submenu">
                <li><a href="./Lykeion.php">Lykeion</a> </li>
                <li><a href="./U-JAM.php">U-JAM</a></li>
                <li><a href="./ChessClub.php">Chess Club</a></li>
                <li><a href="./GN.php">GN</a></li>
            </ul>
        </li>
        <li><a href="#">InterPôles <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
            <ul class="submenu">
                <!-- <li><a href="/interPoles/PolitiqueEtudiante.php">Politique Etudiante</a> </li> -->
                <li><a href="./Evenementielle.php">Evénementielle</a></li>
                <li><a href="./Partenariats.php">Partenariats</a></li>
                <!-- <li><a href="/interPoles/Communication.php">Communication</a></li> -->
            </ul>
        </li>
        <li><a href="#">UPEC <img src="./img/iconPng/flecheBas.png" alt="fleche Bas"></a>
            <ul class="submenu">
                <li><a href="./UPECTualités.php">UPECtualités</a> </li>
                <li><a href="./OffreDEmploi.php">Offre d'emploi</a></li>
            </ul>
        </li>
    </ul>

    <div class="cookieConsent">
        <button onclick="allowCookies()" name="closeCookies" id="closeCookies"><span>X</span></button>
        <p><span>Nous utilisons des cookies !</span> <br>
            En poursuivant votre navigation, vous acceptez l’utilisation de cookies pour vous offrir une meilleure expérience utilisateur
        </p>

    </div>
    <script src="./includes/script.js">

    </script>