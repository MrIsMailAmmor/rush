<?php

$path = "includes/header.php";

include_once($path);
include('includes/database.php');
$pdo = connection(HOSTNAME, DBNAME, USER, PASSWD);
if (!$pdo) {
    echo "<p>La connexion à la base de données n'a pas pu être effectuée.</p>\n";
}
?>



<?php

$id = $_GET['ID'];
$data = $pdo->query("SELECT * FROM p22_ismail.postes WHERE id='$id' ");
$row = $data->fetch(PDO::FETCH_OBJ);

?>

<div class="cadre">
    <h1><?php echo $row->Title ?></h1>
    <img src="<?php echo "./img/offreEmploi/" . $row->Img ?>" alt="">
    <p><?php echo $row->Body ?></p>
</div>