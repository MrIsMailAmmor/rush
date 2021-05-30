<html>


<head>
    <title>Communication d'équipe</title>
    <link rel="stylesheet" href='./style.css' />
</head>

<body>

    <?php

    include "../includes/database.php";
    $pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
    if (!$pdo) {
        echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
    }
    ?>
    <h1>Zone de Communication d'association</h1>

    <?php $data = $pdo->query('SELECT * FROM p22_ismail.Communication');
    ?>

    <div class="zone">
        <?php while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <div class="message">
                <h1><?php echo $rows->Title ?></h1>
                <p><?php echo $rows->Body ?></p>
                <i>Auteur : <?php echo $rows->Author ?></i><br>
                <i>Publié le "<?php echo $rows->Published_at ?>"</i>
            </div>
        <?php endwhile ?>
    </div>

</body>

</html>