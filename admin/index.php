<?php
include "./header.php";

?>
<div class="d-flex d-flex justify-content-between bg-dark text-white">

</div>

<body class="bg-dark">
    <div class="contenair">
        <div class="formAdmin bg-primary text-white">

            <h2>Ajouter une offre d'emploi</h2>

            <form action="index.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <label for="title">Titre</label>
                <input type="text" name="title" placeholder="Titre" required="required">

                <label for="description">Description</label>
                <input type="text" name="description" placeholder="Description" required="required">

                <label for="Body"> Text Body </label>
                <textarea type="text" name="Body" placeholder="Text" required="required"></textarea>

                <label for="Author">Auteur</label>
                <input type="text" name="Author" placeholder="Auteur" required="required">

                <label for="file">Image de couverture</label>
                <input type="file" name="file">

                <button type="submit" name="ajouter">Ajouter</button>
            </form>
            <?php


            if (isset($_POST['ajouter'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $body = $_POST['Body'];
                $auteur = $_POST['Author'];
                $published = true;

                $file = rand(1000, 100000) . "-" . $_FILES['file']["name"];

                $fileName = $_FILES["file"]['name'];
                $filetype = $_FILES["file"]['type'];
                $filetmp_name = $_FILES["file"]['tmp_name'];
                $fileError = $_FILES["file"]['error'];
                $fileSize = $_FILES["file"]['size'];

                $directory = "../img/offreEmploi/";

                $new_size = $fileSize / 1024;
                $new_file_name = strtolower($file);
                $final_file = str_replace(' ', '-', $new_file_name);

                if (move_uploaded_file($filetmp_name, $directory . $final_file)) {
                    $insert = $pdo->prepare('INSERT INTO p22_ismail.postes (Title,Description,Body,Author,Img)
                    Values(?,?,?,?,?)')->execute([
                        $title,
                        $description,
                        $body,
                        $auteur,
                        $final_file,
                    ]);
                    header('Location: ./index.php');
                }
            }

            ?>
        </div>


        <div class="formAdmin bg-warning text-dark">

            <h2>Modifier une offre</h2>
            <form action="index.php" method="post" autocomplete="off">

                <label for="id">ID de l'article</label>
                <input type="text" name="id" required="required" placeholder="id de l'offre">

                <label for="title">Titre</label>
                <input type="text" name="title" required="required" placeholder="Titre">

                <label for="body">Body </label>
                <textarea type="text" name="body" required="required" placeholder="Ecrire quelque chose"></textarea>

                <button type="submit" name="Modifier">Modifier</button>
            </form>
            <?php


            // regarder si on a appuyer sur le button Modifier
            if (isset($_POST['Modifier'])) {
                //récuperation des données via le formulaire
                $id = $_POST['id'];
                $title = $_POST['title'];
                $body = $_POST['body'];
                //prepartion du query
                $sql = $pdo->prepare('UPDATE p22_ismail.postes SET Title=?, Body=? WHERE id=?');
                //execution du query en rajoutant les variables
                $sql->execute([
                    $title,
                    $body,
                    $id,
                ]);
                // actualisation de la page pour eviter les problémes d'injection
                header('Location: index.php');
            }


            ?>
        </div>




        <?php

        $sql = $pdo->query("SELECT * FROM p22_ismail.postes ORDER BY Created_at DESC");
        $rusharticles = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table table-danger w-50 m-auto mt-2">
            <thead>
                <tr>
                    <th scope="col"> ID</th>
                    <th> Nom de l'offre</th>
                    <th> Auteur </th>
                    <th> Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $pdo->query("SELECT * FROM p22_ismail.postes ORDER BY Created_at DESC");
                while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
                    <tr>
                        <td><?php echo $rows->id ?></td>
                        <td><?php echo $rows->Title ?></td>
                        <td><?php echo $rows->Author ?></td>
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
    </div>
</body>