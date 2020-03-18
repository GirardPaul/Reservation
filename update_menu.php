<?php

session_start();

$_SESSION['menuid'] = $_GET['dataid'];


require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

if(empty($_SESSION["name"]) && empty($_SESSION["password"])) {

    header("location: login.php");
    exit;
    }

$updateMenu = new Menu();

$menu_id = $_GET['dataid'];

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="form.css">
<title>Modifier un menu</title>
</head>
<body>
<?php include 'sidebar.php';?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <br>
                <h1 class="text-center">Modifier le menu</h1>
                <br>
        <!-- <form class="text-center" action="" method="post">
        <?php

        // $sql = "SELECT * FROM films WHERE id=".$_GET['id_film']." ";
        // $req = $bdd->query($sql);

        // while ($row = $req->fetch()) {
        //     echo "<input class='text-center border border-dark' type='text' name='nom_film' value='".$row['nom_film']."' >";
        // }
        ?>
            <input class="btn-dark rounded" type="submit" value="Modifier">
        </form> -->

<form class='text-center' action="traitement_update_menu.php" method="post">
<?php

$req = $updateMenu->SelectMenu($menu_id);

$menu = $req->fetch();

// echo "<label>Date :</label>";
echo $updateMenu->AddDate('date', $menu['date']);
// echo "<label>Entrée :</label>";

echo $updateMenu->AddMenu('entree', $menu['entree']);
// echo "<label>Plat :</label>";

echo $updateMenu->AddMenu('plat', $menu['plat']);
// echo "<label>Dessert :</label>";

echo $updateMenu->AddMenu('dessert', $menu['dessert']);
echo $updateMenu->SendMenu();
?>
</form>
    </div>
    </div>
    </div>
</section>

</body>
</html>

