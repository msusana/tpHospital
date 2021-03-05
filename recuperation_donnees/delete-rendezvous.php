<?php 
require_once(__DIR__."/../connexion.php");

if(empty($_GET["id"])){
  die('Paramétres manquants');
}

$insertStatement = $pdo->prepare(
'DELETE 
FROM appointments
WHERE id=?
');

$insertStatement->execute([ 
  $_GET['id']
  
]);

header('location: /Exercice-PDO-2/index.php?message=Rendez-vous suprimé.');