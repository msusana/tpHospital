<?php
require_once(__DIR__."/../connexion.php");
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
        <a class="nav-link" href="liste-patients.php"> Liste patient</a>
        <a class="nav-link" href="ajout-patient.php"> Ajout un nouveau patient</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/liste-rendezvous.php"> Liste des Rendez Vous</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/ajout-rendezvous.php"> Ajout un nouveau rendez-vous</a>
        <a class="nav-link" href="../ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
    </nav>
</head>
<body>
    <h1>Profil Patient</h1>
    <form action='profil-patient.php' method='post'>
        <label for='lastname' class='form-label'>Nom</label>
        <input type='text' class='form-control' name='lastname' id='validationCustom02' required>
        <button class='btn btn-primary' type='submit'>Submit form</button>
    </form>
    
        <?php
        if(!empty($_POST['lastname'])){
        $sql1 = "SELECT * FROM patients WHERE lastname = ?";  
        $stmt = $pdo->prepare($sql1);
        $stmt ->execute([
        $_POST['lastname']
        ]);
        $arrDatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($arrDatos){
            echo 
        '<table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Téléphone</th>
                <th>Émail</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>';
            foreach ($arrDatos as $patient) {
        if ($_POST['lastname'] = $patient['lastname']) {
            echo '<tr>';
            echo '<td>' .$patient['lastname']. '</td>';
            echo '<td> '.$patient['firstname']. '</td>';
            echo '<td>' .$patient['birthdate']. '</td>';
            echo '<td>' .$patient['phone']. ' </td>';
            echo '<td>' .$patient['mail']. ' </td>';
            echo '<td> <a href="modification-patient.php?id='.$patient["id"].'">Modifer patient</button> </td>';  
            echo '</tr>';     
        }  
            }
          } 

        else 
        {
            echo "Le patient n'existe pas";
        }
    }
?>
        </tbody>
    </table>

<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js'
    integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
    crossorigin="anonymous"></script>
</body>
</html>