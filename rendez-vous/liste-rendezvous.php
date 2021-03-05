<?php
require_once(__DIR__."/../connexion.php");
$selectStatement =$pdo->prepare( 'SELECT * FROM patients, appointments WHERE appointments.idPatients = patients.id ');
$selectStatement ->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/Exercice-PDO-2/custom2.css">
    <title>Hospital E2N</title>
    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center ">
        <a class="nav-link active" href="../index.php">Accueil</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/liste-patients.php"> Liste des patients</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/profil-patient.php">Profil patient</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/ajout-patient.php"> Ajout un nouveau patient</a>
        <a class="nav-link" href="ajout-rendezvous.php"> Ajout un nouveau rendez-vous</a>
        <a class="nav-link" href="../ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
    </nav>
</head>
<body>
    <h1>Liste des Rendez-vous</h1>
<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date et Heure</th>
                <th>Afficher</th>
                <th>Modifier</th>
                <th>Suprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($selectStatement->fetchAll()as $patient)
       
        { 
            $patientId= $patient['idPatients'];
            echo '<tr>';
            echo '<td>' .$patientId. '</td>';
            echo '<td>' .$patient['lastname']. '</td>';
            echo '<td>' .$patient['firstname']. '</td>';
            echo '<td>' .$patient['dateHour']. '</td>';
            echo '<td> <a href="rendezvous.php?id='.$patientId.'">👁 </a> </td>';
            echo '<td> <a href="modificationRDV.php?id='.$patient['id'].'">🖋  </a> </td>';
            echo '<td> <a href="/../Exercice-PDO-2/recuperation_donnees/delete-rendezvous.php?id='.$patient['id'].'">🗑  </a> </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js' integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>