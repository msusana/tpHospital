<?php 
require_once(__DIR__."/../connexion.php");

if (empty($_POST['idPatients']) ){
  die('veuillez remplir toutes les cases');  
}
$dateTime=$_POST["date"]."  ".$_POST["Hour"];

$insertStatement = $pdo->prepare(
'UPDATE appointments
  SET
  idPatients = ?, 
  dateHour = ?
  WHERE id=?
');

$insertStatement->execute([ 
  $_POST['idPatients'],
  $dateTime,
  $_POST["IdRDV"]
  
]);

header("location: /Exercice-PDO-2/index.php?message=Rendez-vous de votre patient ID ".$_POST['IdRDV']."modifié.");