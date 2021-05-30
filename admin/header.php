<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href='../style/admin.css' />
<?php

include "../includes/database.php";
$pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
if (!$pdo) {
    echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
}
?>
<html>

<head>
    <title>Administrateur</title>
</head>

<body>
    <div class="menu">
        <div></div>
        <h1> Administrateur Bonjour !</h1>
        <nav>
            <ul class="menu">
                <li>menu
                    <ul class="sousMenu">
                        <li><a href="./index.php">Offre D'emploi</a></li>
                        <li><a href="./EventAdmin.php">Evénement</a></li>
                        <li><a href="./Membre.php">Membre</a></li>
                        <li><a href="./CommunicationAdmin.php">Communication d'équipe</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>


</body>

</html>