<?php
// pagination
if (isset ($_GET['page'])&& !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}
else{
    $currentPage=1;
}
require_once(__DIR__."/../connexion.php");

$sql1='SELECT COUNT(*) AS firstname FROM patients';
$query1=$pdo->prepare($sql1);
$query1->execute();
$result = $query1->fetch();
$totalResult= (int) $result['firstname'];


$parPage = 2;
$pages = ceil($totalResult / $parPage);



$premier = ($currentPage*$parPage)-$parPage;
//liste patients
$sql1 = 'SELECT * FROM patients ORDER BY firstname ASC LIMIT :premier, :parPage;';
$query1 = $pdo-> prepare($sql1);
$query1-> bindValue(':premier', $premier, PDO :: PARAM_INT);
$query1-> bindValue(':parPage', $parPage, PDO :: PARAM_INT);
$query1-> execute();
$clients= $query1->fetchAll(PDO::FETCH_ASSOC);
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
        <a class="nav-link" href="profil-patient.php">Profil patient</a>
        <a class="nav-link" href="ajout-patient.php"> Ajout un nouveau patient</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/liste-rendezvous.php"> Liste des Rendez Vous</a>
        <a class="nav-link" href="/../Exercice-PDO-2/rendez-vous/ajout-rendezvous.php"> Ajout un nouveau rendez-vous</a>
        <a class="nav-link" href="../ajout-patient-rendez-vous.php"> Ajout un nouveau patient et rendez-vous</a>
    </nav>

</head>
<body>
<h1>Liste Patients</h1>
<div class="look">
<h2>Rechercher de Patient</h2>
    <form action='liste-patients.php' method='post'>
        <label for='lastname' class='form-label'>Nom</label>
            <input type='text' name='lastname' id='validationCustom01' required>
        
        <label for='firstname' class='form-label'>Prénom</label>
            <input type='text'  name='firstname' id='validationCustom02' required>
        
        <button class='btn btn-primary' type='submit'>🔍</button>
    
    </form>
</div>    
        <?php
        if(!empty($_POST['lastname'])&& !empty($_POST['firstname']) ){
        $sql2 = "SELECT * FROM patients WHERE lastname=? AND firstname=?";  
        $stmt = $pdo->prepare($sql2);
        $stmt ->execute([
        $_POST['lastname'],
        $_POST['firstname']
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
            </tr>
        </thead>
        <tbody>';
            foreach ($arrDatos as $patient) {
        if ($_POST['lastname'] = $patient['lastname']&& $_POST['firstname'] = $patient['firstname']) {
            echo '<tr>';
            echo '<td>' .$patient['lastname']. '</td>';
            echo '<td> '.$patient['firstname']. '</td>';
            echo '<td>' .$patient['birthdate']. '</td>';
            echo '<td>' .$patient['phone']. ' </td>';
            echo '<td>' .$patient['mail']. ' </td>';
            echo '</tr>';  
             }  
            }
          } 

        else 
        {
            echo "Le patient n'existe pas";
        }
    }
   

if(!empty($_GET['message'])){
   echo '<div> <p>'.$_GET['message'].'</p></div>'; 
}
?> 

<table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Téléphone</th>
                <th>Émail</th>
                <th>Profil</th>
                <th>Modifier</th>
                <th>Élimener</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($clients as $client)
        { 
        ?>
            <tr>
            <td><?=$client['lastname']?></td>
            <td><?=$client['firstname']?></td>
            <td><?=$client['birthdate']?></td>
            <td><?=$client['phone']?> </td>
            <td><?=$client['mail']?> </td>
            <td> <a href="/../Exercice-PDO-2/rendez-vous/rendezvous.php?id=<?=$client['id']?>">👁 </a> </td>
            <td> <a href="modification-patient.php?id=<?=$client["id"]?>">🖋  </a> </td>
            <td><form> <input type="button" onclick="ConfirmMessage(<?=$client['id']?>)" value="🖋"> </form></td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <div>
    <nav>
        <ul class="pagination justify-content-center ">
            <!-- Lien vers la page précédente-->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="liste-patients.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
            
            <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="liste-patients.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            
            <?php endfor ?>
            <!-- Lien vers la page suivante -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="liste-patients.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
        </ul>
    </nav>
</div>
<script> 
            
   function ConfirmMessage(id) {
       if (confirm("Voulez-vous suprimer le patient ?")) {
           return window.location.href = "/../Exercice-PDO-2/recuperation_donnees/delete-patient.php?id="+id;
       }
   }
</script>
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js' integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>