<?php 
require_once(__DIR__."/../connexion.php");

$selectStatement=$pdo->prepare('SELECT * FROM patients');
$selectStatement->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <title>Hospital E2N</title>
    
    <style>
        h1 {text-align: center;margin-top: 2%;}
        div{width: 50%; margin: 2% 10%;}
        select{width: 300px;}
        body{background-color: lightcyan;}
    </style>
    
    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center ">
        <a class="nav-link active" href="../index.php">Accueil</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/liste-patients.php"> Liste des patients</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/profil-patient.php">Profil patient</a>
        <a class="nav-link" href="/../Exercice-PDO-2/patients/ajout-patient.php"> Ajout un nouveau patient</a>
        <a class="nav-link" href="liste-rendezvous.php"> Liste des Rendez Vous</a>
        <a class="nav-link" href="../ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
    </nav>

</head>

<body>
    <h1>Formulaire rendez-vous</h1>
    <form action='/Exercice-PDO-2/recuperation_donnees/insert-rendezvous.php' method='post'>

        <div>
            <label for='date' class='form-label'>Date</label>
            <input type='date' class='form-control' name='date' required >
        </div>
        <div>
            <label for='Hour' class='form-label'>Heure</label>
            <input type='time' class='form-control' name='Hour' required >
        </div>
        
        <div>
        <select name='idPatients'>
        <option></option>
        <?php foreach($selectStatement->fetchAll()as $patient){ ?>
        <option value ="<?=$patient["id"]?>"><?=$patient["firstname"]?>&nbsp&nbsp<?=$patient["lastname"]?></option>
        <?php  } ?>
        </select>
        </div>
        
        <div class='col-12'>
            <button class='btn btn-primary' type='submit'>Submit form</button>
        </div>
    </form>


    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js' integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>

</html>