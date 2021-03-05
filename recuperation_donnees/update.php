<?php 
require_once(__DIR__."/../connexion.php");
$dateenparts = explode('/', $_POST['birthdate']);
$dateformatted = $dateenparts[2].'-'.$dateenparts[1].'-'.$dateenparts[0];

if (empty($_POST['firstname']) && empty($_POST['lastname'])&& empty($_POST['birthdate'])&& empty($_POST['phone'])&& empty($_POST['mail'])){
  die('veuillez remplir toutes les cases');  
}

//var_dump($_POST['birthdate']);exit;

$insertStatement = $pdo->prepare(
'UPDATE patients
  SET
  lastname = ?, 
  firstname = ?, 
  birthdate = ?, 
  phone = ?, 
  mail = ?
  WHERE id=?
');

$insertStatement->execute([ 
  $_POST['lastname'],
  $_POST['firstname'],
  $dateformatted,
  $_POST['phone'],
  $_POST['mail'],
  $_GET["id"]
  
]);

header('location: /Exercice-PDO-2/index.php?message=Patient modifié.');