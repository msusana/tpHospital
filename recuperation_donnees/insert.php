<?php 
require_once(__DIR__."/../connexion.php");
$dateenparts = explode('/', $_POST['birthdate']);
$dateformatted = $dateenparts[2].'-'.$dateenparts[1].'-'.$dateenparts[0];

if (empty($_POST['firstname']) && empty($_POST['lastname'])&& empty($_POST['birthdate'])&& empty($_POST['phone'])&& empty($_POST['mail'])){
  die('veuillez remplir toutes les cases');  
}

//var_dump($_POST);exit;

$insertStatement = $pdo->prepare('
  INSERT INTO patients
  (lastname, firstname, birthdate, phone, mail)
  VALUES
  (?,?,?,?,?);
');

$insertStatement->execute([ 
  $_POST["lastname"],
  $_POST["firstname"],
  $dateformatted,
  $_POST["phone"],
  $_POST["mail"]
]);

header('location: /Exercice-PDO-2/index.php?message=Patient créé.');
