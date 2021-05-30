<?php

define('HOSTNAME', "localhost");
define('DBNAME', "p22_ismail");
// define('DBNAME', "rusharticles");
// define('USER', "root");
// define('PASSWD', "");
define('USER', "ismail");
define('PASSWD', "rifwibhywetfid8");


function connection($HOSTNAME, $DBNAME, $USER, $PASSWD){
    $pdo = null;
    try{
      $pdo = new PDO("mysql:host=$HOSTNAME;dbname=$DBNAME",$USER,$PASSWD);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }
    return $pdo;
  }
 
//dsn





// $dsn = 'mysql:host=' . $dbHost . ';dbName=' . $dbName;

// //creat PDO

// $pdo = new PDO($dsn, $dbUser, $dbPass);
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Check Connection
// if (!$pdo) {
//     echo "error couldn't connect TO DATABASE";
// }else{
//     echo " connected";
// }
   