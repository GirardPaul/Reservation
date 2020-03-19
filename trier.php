<?php

session_start();
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

if(empty($_SESSION["name"]) && empty($_SESSION["password"])) {

    header("location: login.php");
    exit;
    }
// Créer une nouvelle instance
$ajoutMenu = new Menu();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="form.css">
    <title>Rechercher un menu</title>
</head>
<body>
<?php include 'sidebar.php';?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <h1 class="text-center">Rechercher un menu</h1>
                <br>
                <h3 class="text-center mt-3 mb-3">Pour une date précise</h3>

<form class='text-center' action="" method="post">
<?php

echo "<label style='margin-right: 10px;'>Jour :</label>";
echo $ajoutMenu->AddDate('date');
echo $ajoutMenu->SendMenu();

?>
</form>

<?php
$date = null;
if (!empty($_POST['date'])) {

    $date = $_POST['date'];
}

$req_date = $ajoutMenu->FindDate($date);

while($test = $req_date->fetch()){

  setlocale(LC_TIME, "fr_FR","French");

echo "<h2 class='text-center mt-4'> Menu du " . strftime("%A %d %B %G", strtotime($test['date'])) . "</h2>";

echo "<p class='text-center'> Entrée : " .$test['entree']. "</p>";
echo "<p class='text-center'> Plat : " .$test['plat']. "</p>";
echo "<p class='text-center'> Dessert : " .$test['dessert']. "</p>";

}

?>



<h3 class="text-center mt-5 mb-3">Pour une période</h3>

<form class='text-center' action="" method="post">
<?php

echo "<label style='margin-right: 10px;'>Début :</label>";
echo $ajoutMenu->AddDate('debut');

echo "<label style='margin-right: 10px;'>Fin :</label>";
echo $ajoutMenu->AddDate('fin');
echo $ajoutMenu->SendMenu();

$date_debut = null;
if (!empty($_POST['debut'])) {

    $date_debut = $_POST['debut'];
}


$date_fin = null;
if (!empty($_POST['fin'])) {

    $date_fin = $_POST['fin'];
}

$req_periode = $ajoutMenu->DatePeriode($date_debut, $date_fin);

if(isset($_POST['debut']) AND isset($_POST['fin'])){
    setlocale(LC_TIME, "fr_FR","French");

  $date_debut = strftime("%A %d %B %G", strtotime($_POST['debut']));
  $date_fin = strftime("%A %d %B %G", strtotime($_POST['fin']));

  echo "<h2 class='text-center mt-5'>Pour la période du " . "".$date_debut."" . " au " .  "".$date_fin."</h2>";
}

while($periode = $req_periode->fetch()){
  setlocale(LC_TIME, "fr_FR","French");

echo "<h4 class='mt-5'> Menu du " . strftime("%A %d %B %G", strtotime($periode['date'])) .  "</h4>";

echo "<p class='text-center'> Entrée : " .$periode['entree']. "</p>";
echo "<p class='text-center'> Plat : " .$periode['plat']. "</p>";
echo "<p class='text-center'> Dessert : " .$periode['dessert']. "</p>";
}

?>
</form>
            </div>
        </div>
    </div>

</body>
</html>