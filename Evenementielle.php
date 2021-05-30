<?php

$path = "./includes/header.php";
include_once($path); ?>
<link rel="stylesheet" href='./style/evenementielle.css' />
<?php

include "includes/database.php";
$pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
if (!$pdo) {
    echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
}
?>

<div class="grandBoxEvent">
    <?php $data = $pdo->query("SELECT * FROM p22_ismail.Evenement ORDER BY id desc");
    while ($rows = $data->fetch(PDO::FETCH_OBJ)) :
    ?>
        <div class="lesEvents">
            <h1><?php echo $rows->Title ?> Date : <?php echo $rows->Date ?></h1>
            <div class="textZone">
                <img src="./img/evenement/<?php echo $rows->Img ?>" alt="<?php echo $rows->Title ?>">
                <p><?php echo $rows->Body ?></p>

            </div>
            <div class="span">
                <span><?php echo $rows->Author ?></span><br>
                <span><?php echo $rows->Published_at ?></span>
            </div>
        </div>
    <?php endwhile ?>

</div>

<?php

$path = "./includes/footer.php";
include_once($path); ?>