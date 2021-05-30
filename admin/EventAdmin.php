<?php

include "./header.php";

?>


<div class="formAdmin bg-primary text-white">

    <h2>Ajouter un Evenement</h2>

    <form action="EventAdmin.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="title">Titre</label>
        <input type="text" name="title" required="required">

        <label for="Evenement"> Evenement </label>
        <textarea type="text" name="Evenement" required="required"></textarea>

        <label for="Author">Auteur</label>
        <input type="text" name="Author" required="required">

        <label for="Date">Date</label>
        <input type="text" name="Date" required="required">

        <label for="file">Image de couverture</label>
        <input type="file" name="file">

        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>
<?php


if (isset($_POST['ajouter'])) {
    $title = $_POST['title'];
    $Evenement = $_POST['Evenement'];
    $auteur = $_POST['Author'];
    $Date = $_POST['Date'];

    $file = rand(1000, 100000) . "-" . $_FILES['file']["name"];

    $fileName = $_FILES["file"]['name'];
    $filetype = $_FILES["file"]['type'];
    $filetmp_name = $_FILES["file"]['tmp_name'];
    $fileError = $_FILES["file"]['error'];
    $fileSize = $_FILES["file"]['size'];

    $directory = "../img/evenement/";

    $new_size = $fileSize / 1024;
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($filetmp_name, $directory . $final_file)) {
        $insert = $pdo->prepare('INSERT INTO p22_ismail.Evenement (Title,Body,Author,Date,Img)
        Values(?,?,?,?,?)')->execute([
            $title,
            $Evenement,
            $auteur,
            $Date,
            $final_file,
        ]);
        header('Location: EventAdmin.php');
    };
}

?>



<?php

$sql = $pdo->query("SELECT * FROM p22_ismail.Evenement");
$rusharticles = $sql->fetchAll(PDO::FETCH_ASSOC);


//Nombre de ligne
// $rowNumber=$sql->rowcount();
// echo $rowNumber;
// ASSOC methode
// echo '<pre>';
// print_r($rusharticles);
// echo '</pre>';

?>

<table class="table table-danger w-50 m-auto mt-2">
    <thead>
        <tr>
            <th scope="col"> ID</th>
            <th> Nom d'article</th>
            <th> Auteur </th>
            <th> Date </th>
            <th> Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = $pdo->query("SELECT * FROM p22_ismail.Evenement");
        while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <tr>
                <td><?php echo $rows->id ?></td>
                <td><?php echo $rows->Title ?></td>
                <td><?php echo $rows->Author ?></td>
                <td><?php echo $rows->Date ?></td>
                <td><a href="?del_id=<?php echo $rows->id; ?>" class="btn btn-danger" name="delete">Supprimez cette Article</a></td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>
<?php


if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $delete = $pdo->prepare("DELETE FROM p22_ismail.Evenement WHERE id=?");
    $delete->execute([$id]);
    header('Location: EventAdmin.php');
}
