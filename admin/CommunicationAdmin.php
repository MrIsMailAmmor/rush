<?php

include "./header.php";

?>


<div class="formAdmin bg-primary text-white">

    <h2>Ajouter un Message Pour l'équipe </h2>

    <form action="CommunicationAdmin.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="title">Titre</label>
        <input type="text" name="title" required="required">

        <label for="message"> Message </label>
        <textarea type="text" name="message" required="required"></textarea>

        <label for="Author">Auteur</label>
        <input type="text" name="Author" required="required">


        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>
<?php


if (isset($_POST['ajouter'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $auteur = $_POST['Author'];

    $insert = $pdo->prepare('INSERT INTO p22_ismail.Communication (Title,Body,Author)
        Values(?,?,?)')->execute([
        $title,
        $message,
        $auteur,
    ]);
    header('Location: CommunicationAdmin.php');
}
?>
<?php
$sql = $pdo->query("SELECT * FROM p22_ismail.Communication");
$rusharticles = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table table-danger w-50 m-auto mt-2">
    <thead>
        <tr>
            <th scope="col"> ID</th>
            <th> Nom de message</th>
            <th> Auteur </th>
            <th> Date </th>
            <th> Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = $pdo->query("SELECT * FROM p22_ismail.Communication");
        while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <tr>
                <td><?php echo $rows->id ?></td>
                <td><?php echo $rows->Title ?></td>
                <td><?php echo $rows->Author ?></td>
                <td><?php echo $rows->Published_at ?></td>
                <td><a href="?del_id=<?php echo $rows->id; ?>" class="btn btn-danger" name="delete">Supprimez cette Article</a></td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>
<?php


if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $delete = $pdo->prepare("DELETE FROM p22_ismail.postes WHERE id=?");
    $delete->execute([$id]);
    header('Location: CommunicationAdmin.php');
}
