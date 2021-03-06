<?php 
require_once(__DIR__."/../connexion.php");

$selectPatient =$pdo->prepare('SELECT * FROM patients WHERE id=?');
$selectPatient ->execute([
    $_GET["id"]
    ]);
$patient=$selectPatient->fetch(); 
$dateEnParts = explode('-', $patient["birthdate"]);
$dateFormatted = $dateEnParts[2].'/'.$dateEnParts[1].'/'.$dateEnParts[0];

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
        h1 {text-align: center; padding-top: 2%;}
        div{width: 50%; margin: 2% 10%;}
        body{background-color: lightcyan;}
    </style>

     <nav class="nav nav-pills flex-column flex-sm-row justify-content-center ">
        <a class="nav-link active" href="../index.php">Accueil</a>
        <a class="nav-link" href="liste-patients.php"> Liste des patient</a>
        <a class="nav-link" href="profil-patient.php">Profil patient</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/liste-rendezvous.php"> Liste des Rendez Vous</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/ajout-rendezvous.php"> Ajout un nouveau rendez-vous</a>
        <a class="nav-link" href="../ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
    </nav>

</head>

<body>
    <h1>Formulaire patient</h1>
    <form action='../recuperation_donnees/update.php?id=<?=$patient["id"]?>' method='post'>

        <div>
            <label for='lastname' class='form-label'>Nom</label>
            <input type='text' class='form-control' name='lastname' id='validationCustom02' value="<?=$patient["lastname"]?>" required>
        </div>

        <div>
            <label for='firstname' class='form-label'>Pr??nom</label>
            <input type='text' class='form-control' name='firstname' id='validationCustom01'value="<?=$patient["firstname"]?>"  required>
        </div>

        <div>
            <label for='birthdate' class='form-label'>Date de Naissance</label>
            <input type='text' class='form-control' name='birthdate' value="<?= $dateFormatted?>"  placeholder='jj/mm/aaaa'required >
        </div>
        
        <div>
            <label for='phone' class='form-label'>T??l??phone</label>
            <input type='text' class='form-control' name='phone' value="<?=$patient["phone"]?>" placeholder='+33 0 00 00 00 00'required >
        </div>
       
        <div>
            <label for='mail' class='form-label'>Email</label>
            <input type='text' class='form-control' name='mail' value="<?=$patient["mail"]?>"  placeholder='@example.com'required>
        </div>
        
        <div class='form-check'>
            <input class='form-check-input' type='checkbox' value='' id='invalidCheck' required>
            <label class='form-check-label' for='invalidCheck'>
                Agree to terms and conditions
            </label>
            <div class='invalid-feedback'>
                You must agree before submitting.
            </div>
        </div>
        
        
        <div class='col-12'>
            <button class='btn btn-primary' type='submit'>Submit form</button>
        </div>
    </form>


    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js' integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>

</html>