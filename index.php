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
</head>
<body>
<?php 
if(!empty($_GET['message'])){
   echo '<div> <p>'.$_GET['message'].'</p></div>'; 
}
?>
    <div class="container">

        <div class="un">
            <a class="nav-link" href="./patients/liste-patients.php"> Liste des patients</a>
                <p>📃</p>
        </div>

        <div class="deux">
            <a class="nav-link" href="./patients/profil-patient.php">Profil patient</a>
                <p>👤</p>
        </div>

        <div class="trois">
            <a class="nav-link" href="./patients/ajout-patient.php"> Ajout un nouveau patient</a>
                <p>➕ 👥</p>
        </div>

        <div class="quatre">
            <a class="nav-link" href="./rendez-vous/liste-rendezvous.php"> Liste des Rendez Vous</a>
                <p> 📑 </p>
        </div>

        <div class="cinq">
            <a class="nav-link" href="./rendez-vous/ajout-rendezvous.php"> Ajout un nouveau rendez-vous</a>
                <p>➕ 📑</p>
        </div>

        <div class="six">
            <a class="nav-link" href="ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
                <p>➕ 👤 📑</p>
        </div>

    </div>


    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js'
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>
</body>

</html>