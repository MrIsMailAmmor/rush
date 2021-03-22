<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "ss";
$dbName = "rusharticles";

//dsn

$dsn = 'mysql:host=' . $dbHost . ';dbName=' . $dbName;

//creat PDO

$pdo = new PDO($dsn, $dbUser, $dbPass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$pdo) {
    echo "error couldn't connect TO DATABASE";
}
   
    // $stmt = $pdo->query('SELECT * FROM postes');

    // while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
    //     echo $row->Title. '<br>';
    // }



//    foreach($posts as $post){
//        echo '<h1>'.$post["Title"] .'</h1>' ;
//        echo '<p>'. $post["Body"] .'<p>';
//        echo '<em>'. $post["Author"] .'<em>';

//    }
// for($i=0; $i<3; $i++){
//     echo '<h1>'.$posts[$i]->Title.'</h1>';
//     echo '<p>'.$posts[$i]->Body.'</p>';
//     echo  '<em>'.$posts[$i]->Author.'</em>';
//     echo  '<em>'.$posts[$i]->Created_at.'</em>';
// }






    // $sql = "SELECT * FROM login";
    // $result= mysqli_query($conn, $sql);
    // $rowCount = mysqli_num_rows($result);

    // if ($rowCount>0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
           
    //     }
    // } else {
    //     echo "no result found";
    // }
