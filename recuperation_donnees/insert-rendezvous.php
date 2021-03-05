<?php 
require_once(__DIR__."/../connexion.php");

if (empty($_POST['idPatients'])){
  die('veuillez remplir toutes les cases');  
}

//var_dump($_POST);exit;

$insertStatement = $pdo->prepare(
'INSERT INTO appointments
(dateHour, idPatients)
VALUES
(?,?);
');

$insertStatement->execute([ 
  $_POST["date"]."  ".$_POST["Hour"],
  $_POST["idPatients"],
]);

header('location: /Exercice-PDO-2/index.php?message=Rendez-vous créé.');