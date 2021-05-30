<?php
include "./header.php";


?>

</div>

<body class="bg-dark">
    <div class="contenair">
        <div class="formAdmin bg-primary text-white">

            <h2>Rajouter un membre</h2>

            <form action="Membre.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <label for="nom">Nom</label>
                <input type="text" name="nom" required="required">

                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" required="required">

                <label for="role">Rôle</label>
                <select name="role" id="role">
                    <option value="" selected disabled>...</option>
                    <option value="Président">Président</option>
                    <option value="Chef">Chef</option>
                    <option value="Membre">Membre</option>
                </select>

                <label for="Description"> Description </label>
                <textarea type="text" name="Description" required="required"></textarea>

                <label for="file">Image</label>
                <input type="file" name="file">

                <button type="submit" name="ajouter">Ajouter</button>
            </form>
            <?php


            if (isset($_POST['ajouter'])) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $description = $_POST['Description'];
                $role = $_POST['role'];
                $file = rand(1000, 100000) . "-" . $_FILES['file']["name"];

                $fileName = $_FILES["file"]['name'];
                $filetype = $_FILES["file"]['type'];
                $filetmp_name = $_FILES["file"]['tmp_name'];
                $fileError = $_FILES["file"]['error'];
                $fileSize = $_FILES["file"]['size'];

                $directory = "../img/membre/";

                $new_size = $fileSize / 1024;
                $new_file_name = strtolower($file);
                $final_file = str_replace(' ', '-', $new_file_name);

                if (move_uploaded_file($filetmp_name, $directory . $final_file)) {
                    $insert = $pdo->prepare('INSERT INTO p22_ismail.membre (Nom,Prenom,Role,Description,Img)
                    Values(?,?,?,?,?)')->execute([
                        $nom,
                        $prenom,
                        $role,
                        $description,
                        $final_file,
                    ]);
                    header('Location: Membre.php');
                }
            }

            ?>
        </div>

        <?php

        ?>
    </div>



    <?php

    $sql = $pdo->query("SELECT * FROM p22_ismail.membre ");
    $rusharticles = $sql->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table class="table table-danger w-50 m-auto mt-2">
        <thead>
            <tr>
                <th scope="col"> ID</th>
                <th> Nom</th>
                <th> Prenom </th>
                <th> Rôle </th>
                <th> Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $pdo->query("SELECT * FROM p22_ismail.membre ");
            while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <td><?php echo $rows->Id ?></td>
                    <td><?php echo $rows->Nom ?></td>
                    <td><?php echo $rows->Prenom ?></td>
                    <td><?php echo $rows->Role ?></td>
                    <td><a href="?del_id=<?php echo $rows->Id; ?>" class="btn btn-danger" name="delete">Supprimez cette Personne</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php


    if (isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        $delete = $pdo->prepare("DELETE FROM p22_ismail.membre WHERE Id=?");
        $delete->execute([$id]);
        header('Location: Membre.php');
    }

    // foreach($membre as $key => $value){
    //     echo $membre[$key]['Title'] .'<br>';
    //     echo $membre[$key]['Body'] .'<br>';
    //     echo $membre[$key]['Author'] .'<br>';
    // }

    //OBJ METHODE
    // echo '<br>';
    // echo $membre[0]->id;
    // echo '<br>';


    ?>
    </div>