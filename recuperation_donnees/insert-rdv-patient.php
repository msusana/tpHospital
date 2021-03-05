<?php 
require_once(__DIR__."/../connexion.php");


$dateEnParts = explode('/', $_POST['birthdate']);
$dateFormatted = $dateEnParts[2].'-'.$dateEnParts[1].'-'.$dateEnParts[0];


$insertPatient = $pdo->prepare(
    'INSERT INTO patients
  (lastname, firstname, birthdate, phone, mail)
  VALUES
  (?,?,?,?,?);
');

$insertPatient->execute([ 
  $_POST["lastname"],
  $_POST["firstname"],
  $dateFormatted,
  $_POST["phone"],
  $_POST["mail"]
]);

$lastId= $pdo->lastInsertId();


$insertRDV = $pdo->prepare(
'INSERT INTO appointments
(dateHour, idPatients)
VALUES
(?,?);
');

$insertRDV->execute([ 
  $_POST["date"]."  ".$_POST["Hour"],
  $lastId
]);

header('location: /Exercice-PDO-2/index.php?message=Patient et rendez-vous créé.');