<?php 
require_once(__DIR__."/../connexion.php");

if(empty($_GET["id"])){
  die('Paramétres manquants');
}

$insertRDV = $pdo->prepare(
'DELETE 
FROM appointments
WHERE idPatients=?
');

$insertRDV->execute([ 
  $_GET['id']
  
]);

$insertPatient = $pdo->prepare(
    'DELETE 
    FROM patients
    WHERE id=?
    ');
    
    $insertPatient->execute([ 
      $_GET['id']
      
    ]);
    

header('location: /Exercice-PDO-2/patients/liste-patients.php?message=Patient suprimé.');