<?php
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

//On créer une nouvelle instance
$ajoutMenu = new Menu();

//On récupère les valeurs saisis et on vérifie que les variables ne sont pas nulles
$entree = null;
if (!empty($_POST['entree'])) {

    $entree = $_POST['entree'];
}

$plat = null;
if (!empty($_POST['plat'])) {

    $plat = $_POST['plat'];
}

$dessert = null;
if (!empty($_POST['dessert'])) {

    $dessert = $_POST['dessert'];
}

$date = null;
if (!empty($_POST['date'])) {

    $date = $_POST['date'];
}
    //On insert les valeurs dans la base de données
    $ajoutMenu->addAll($entree, $plat, $dessert, $date);

    //On précise que la date doit être en français
    setlocale(LC_TIME, "fr_FR","French");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="form.css">
<title>Ajouter un menu</title>
</head>
<body>
<?php include 'sidebar.php';?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <br>
                <h1 class="text-center">Menu ajouté : </h1>
                <br>
            <?php
            echo "<h4> Menu du " . strftime("%A %d %B %G", strtotime($date)) . "</h4>";

            echo "<p> Entrée : " .$entree. "</p>";
            echo "<p> Plat : " .$plat. "</p>";
            echo "<p> Dessert : " .$dessert. "</p>";
            ?>
            </div>
    </div>
    </div>
</section>

</body>
</html>