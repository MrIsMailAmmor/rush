<link rel="stylesheet" href='/rush/style/admin.css' />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<h1> Administrateur Bonjour !</h1>


<div class="contenair">
    <div class="formAdmin form-group">

        <h2>Rajouter un article</h2>
        <form action="index.php" method="post" autocomplete="off">
            <label for="title">Titre</label>
            <input type="text" name="title" required="required">

            <label for="Body"> Text Body </label>
            <textarea type="text" name="Body" required="required"></textarea>

            <label for="Author">Auteur</label>
            <input type="text" name="Author" required="required">

            <button type="submit" name="ajouter">Ajouter</button>
        </form>
        <?php
        include "../includes/database.php";

        if (isset($_POST['ajouter'])) {
            $title = $_POST['title'];
            $body = $_POST['Body'];
            $auteur = $_POST['Author'];
            $published = true;

            $insert = $pdo->prepare('INSERT INTO rusharticles.postes (Title,Body,Author,Is_Published)
        Values(?,?,?,?)');
            $insert->execute([
                $title,
                $body,
                $auteur,
                $published,
            ]);
            header('Location: index.php');
        }

        ?>
    </div>


    <div class="formAdmin">

        <h2>Modifier un article</h2>
        <form action="index.php" method="post" autocomplete="off">

            <label for="id">ID de l'article</label>
            <input type="text" name="id" required="required" placeholder="id de l'article">

            <label for="title">Titre</label>
            <input type="text" name="title" required="required" placeholder="Titre">

            <label for="body">Body </label>
            <textarea type="text" name="body" required="required" placeholder="Ecrire quelque chose"></textarea>

            <button type="submit" name="Modifier">Modifier</button>
        </form>
        <?php



        if (isset($_POST['Modifier'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $body = $_POST['body'];

            $sql = $pdo->prepare('UPDATE rusharticles.postes SET Title=?, Body=? WHERE id=?');
            $sql->execute([
                $title,
                $body,
                $id,
            ]);
            header('Location: index.php');
        }


        ?>
    </div>

   
</div>

<?php

$sql = $pdo->query("SELECT * FROM rusharticles.postes ORDER BY Created_at DESC");
$postes = $sql->fetchAll(PDO::FETCH_ASSOC);


//Nombre de ligne
// $rowNumber=$sql->rowcount();
// echo $rowNumber;
// ASSOC methode
// echo '<pre>';
// print_r($postes);
// echo '</pre>';

?>

<table class="table table-danger w-50 m-auto mt-2">
    <thead>
        <tr>
            <th scope="col"> ID</th>
            <th> Nom d'article</th>
            <th> Auteur </th>
            <th> Supprimer</th>
        </tr>

    </thead>
    <tbody>

        <?php
        $data = $pdo->query("SELECT * FROM rusharticles.postes");
        while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
            <tr>
                <td ><?php echo $rows->id ?></td>
                <td><?php echo $rows->Title ?></td>
                <td><?php echo $rows->Author ?></td>
                <td><a href="?del_id=<?php echo $rows->id; ?>" class="btn btn-danger" name="delete">Supprimez cette Article</a></td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>
<?php


    if(isset($_GET['del_id'])){
        $id =$_GET['del_id'];
        $delete = $pdo->prepare("DELETE FROM rusharticles.postes WHERE id=?");
        $delete->execute([$id]);
        header('Location: index.php');
    }

// foreach($postes as $key => $value){
//     echo $postes[$key]['Title'] .'<br>';
//     echo $postes[$key]['Body'] .'<br>';
//     echo $postes[$key]['Author'] .'<br>';
// }

//OBJ METHODE
// echo '<br>';
// echo $postes[0]->id;
// echo '<br>';


?>