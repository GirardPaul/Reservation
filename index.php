<?php

session_start();
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

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
    <title>Accueil</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section class="container-fluid">
    <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12">
                <br>
                <h1 class="text-center mb-5">Liste des menus</h1>
                <table class="table table-hover">
                <thead class="thead-info">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Entrée</th>
                        <th scope="col">PLat</th>
                        <th scope="col">Dessert</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $req = $ajoutMenu->Find();

                    while ($data=$req->fetch()){

                        setlocale(LC_TIME, "fr_FR","French");
                
                        $jour = strftime("%A %d %B %G", strtotime($data['date']));
                
                         echo "<tr><td>".$jour."</td><td>".$data['entree']."</td><td>".$data['plat']."</td><td>".$data['dessert']."</td><td>"."<a class='badge badge-success' href=update_menu.php?dataid=".$data['id'].">Modifier</a></td><td><a class='badge badge-danger' href=delete_menu.php?dataid=".$data['id'].">Supprimer</a>"."</td></tr>";
                    }
?>
</body>
</html>