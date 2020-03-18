<?php

session_start();
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

//Créer une nouvelle instance
$ajoutMenu = new Menu();
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
                <h1 class="text-center">Ajouter un menu</h1>
                <br>
       
<!--- Création Formulaire envoi Menu  -->
<form action="traitement.php" method="post">
<?php

echo $ajoutMenu->AddDate('date');
echo $ajoutMenu->AddMenu('entree');
echo $ajoutMenu->AddMenu('plat');
echo $ajoutMenu->AddMenu('dessert');
echo $ajoutMenu->SendMenu();

?>
</form>
    </div>
    </div>
    </div>
</section>

</body>
</html>