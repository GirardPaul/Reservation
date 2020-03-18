<?php
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');
$img = new Menu();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="burger.css">
    <title>Magellan</title>
</head>

<body>

    <header id="header">
        <!--  NavBar   -->
        <div class="navbar bg-dark">
            <a href="#header">Accueil</a>
            <a href="#presentation">La Chef</a>
            <a href="#menu">Menu</a>
            <a href="#offres">Offres</a>
            <a href="reservation.php">Réservation</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="outer-menu">
            <input class="checkbox-toggle" type="checkbox" />
            <div class="hamburger">
                <div></div>
            </div>
            <div class="menu-b">
                <div>
                    <div>
                        <ul>
                            <li><a class="menu-b-link" href="#header">ACCUEIL</a></li>
                            <li><a class="menu-b-link" href="#presentation">LA CHEF</a></li>
                            <li><a class="menu-b-link" href="#menu">MENU</a></li>
                            <li><a class="menu-b-link" href="#offres">OFFRES</a></li>
                            <li><a class="menu-b-link" href="reservation.php">RESERVATION</a></li>
                            <li><a class="menu-b-link" href="#contact">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container h-100">

            <div class="row h-100 flex-column justify-content-around align-items-center">

                <div class="text-white margin_header pt-3 fs-42 font-w-700 text-center">
                    <a href="#home">
                        <span class="color-red">.</span>
                        <img src="images/logo.png" alt="logo" class="w-50"> <span class="color-red">.</span></a>
                </div>


                <div class="header_title d-flex flex-column justify-content-between align-items-center text-white">

                    <h2 class="fs-80 text-center text-lg-left">Une restauration rapide</h2c>
                        <h2 class="fs-80">&</h2>
                        <h2 class="fs-80">Conviviale</h2>

                        <h3 class="fs-30 font-italic">Cuisinée par Sylviane</h3>



                </div>

                <div class="header_button">

                    <a class="btn btn-danger fs-2" href="reservation.php">Réservation</a>

                </div>




            </div>

        </div>

    </header>

    <section id="presentation" class="presentation pt-5 pb-5">

        <div class="container">



            <div class="row">

                <div class="col-12 col-lg-6 d-flex flex-column justify-content-between align-items-start">

                    <h2 class="title-chef mb-3 mb-lg-0 text-secondary">EN QUELQUES MOTS</h2>

                    <h2 class="color-red font_visiteurs">"Bonjour <br />Chers Visiteurs,"</h2>
                    <p class="text-dark padding_media text_chef">"Votre Campus Numérique de Lons Le Saunier est heureux de vous
                        proposer son Service
                        Restauration.<br> Le Restaurant MAGELLAN vous offrira une cuisine de qualité, rapide et bon
                        marché tous les jours de la semaine, du Lundi au Vendredi.<br> Plusieurs formule disponible dès
                        10h avec nos offres Petits Déjeuner et dès midi pour nos offres repas. Ne perdez pas une minute
                        pour réserver.<br> A Bientôt."<br> Sylviane,<br>Chef Cuisinère.</p>

                    <a class="btn_presentation mb-5 mb-lg-0 w-50 w-lg-25 btn btn-lg color-red" href="#info">INFO CAMPUS</a>

                </div>

                <div class="col-12 col-lg-6">

                    <img src="images/chef.jpg" class="img_presentation" alt="chef">

                </div>
            </div>
        </div>
    </section>


    <section id="menu" class="menu pt-5 pb-5">

        <div class="container">
            <div class="row">

                <div class="col-12 text-center">

                    <h3 class="font_visiteurs color-red mb-5">Menu</h3>
                    <h4 class="color-red text_chef">Des menus sains et équilibrés vous attendent chaque jours, chaque
                        semaine.<br>Possibilité
                        de faire des menus végétariens sur demande.</h4>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center align-items-center col-5 col-sm-8 col-md-6 col-lg-10 col-xl-9 partie-card">
                    <div class=" d-flex flex-wrap mt-5 mb-5">

                        <?php
                      $debut = strftime("%Y-%m-%d", strtotime("now"));
                      $fin = strftime("%Y-%m-%d", strtotime("+12 day"));


                            $query_img = $img->DatePeriode($debut, $fin);

                            while($req_img = $query_img->fetch()){

                                $date = strftime("%A %d %B %G", strtotime($req_img['date']));

                                echo '<div class="card-menu">';
                                echo '<h3 class="title">Bon appétit !</h3>';
                                echo '<p class="lead date text-light">'.$date.'</p>';
                                echo '<div class="bar">';
                                echo '<div class="emptybar"></div>';
                                echo ' <div class="filledbar"></div>';
                                echo '</div>';
                                echo '<div class="circle">';

                                echo '<h4 class="fs-title-menu mt-3 color-red ">Entrée</h4>';
                                echo ' <p class="lead v text-light">'.$req_img['entree'].'</p>';
                                echo '<h4 class="fs-title-menu color-red">Plat</h4>';
                                echo '<p class="lead v text-light">'.$req_img['plat'].'</p>';
                                echo '<h4 class="fs-title-menu color-red">Dessert</h4>';
                                echo '<p class="lead v text-light">'.$req_img['dessert'].'</p>';
                                echo '</div>';
                                echo '</div>';


                            }

                            ?>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section id="offres" class="offres pt-5 pb-5">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center d-flex flex-column">

                    <h4 class="offres-title">NOS OFFRES</h4>

                    <h4 class="font_offres mt-3 mb-3">Une Envie = une Formule !</h4>

                    <h5 class="lead">Vous trouverez dans cette partie toutes nos formules disponible.</h5>
                </div>

            </div>

            <div class="row mt-5 mb-5">

                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/petitdej1.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">1€50</h2>
                            <h5 class="contenu_menu">Formule Café<br> +<br> Viennoiserie</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/thecroissant.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">2€</h2>
                            <h5 class="contenu_menu">Formule Thé<br> +<br> Viennoiserie</h5>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/full.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">3€50</h2>
                            <h5 class="contenu_menu">Formule Café<br> +<br> Jus de Fruits Frais<br> +<br>
                                Viennoiserie </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 mb-5">

                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/jusfruits.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">2€</h2>
                            <h5 class="contenu_menu">Jus de Fruits<br> Frais</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/cafe-boisson.png" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">1€</h2>
                            <h5 class="contenu_menu">Café<br>OU<br>Boisson</h5>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/cafe-choc.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">1€50</h2>
                            <h5 class="contenu_menu">Thé<br>OU<br>Chocolat</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 mb-5">

                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/vienoiseries.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">0.5€</h2>
                            <h5 class="contenu_menu">Viennoiserie<br>Croissant<br>OU<br>Pain Chocolat</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/formule2.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">8€/<span class="student">5€ Etudiant</span></h2>
                            <h5 class="contenu_menu">Formule <br> Entrée + Plat <br> OU <br> Plat + Dessert</h5>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center">
                    <div class="card h-100" style="background-color: white;">
                        <img src="images/formule2.jpg" alt="repas" class="img-fluid">
                        <div class="card-body text-center">
                            <h2 class="price">10€/<span class="student">8€ Etudiant</span></h2>
                            <h5 class="contenu_menu">Formule Entrée<br> +<br> Plat<br> +<br> Dessert</h5>
                        </div>
                    </div>
                </div>
            </div>




        </div>


        </div>

    </section>

    <section id="realisation" class="realisation pt-5 pb-5">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center d-flex flex-column mb-5">

                    <h4 class="font_offres mt-3 mb-3">Nos Réalisations</h4>

                    <h5 class="lead">Pour vous faire une idée sur notre savoir faire.</h5>

                </div>

                <?php

                $query = $img->selectBy();

                while ($row = $query->fetch()) {

                    $filename = $row['name'];
                    echo '<div class="col-12 col-sm-4 pb-5">';
                    echo '<a href="upload/' . $filename . '" class="w-100 site-thumbnail image-popup rounded">';
                    echo '<img src="upload/' . $filename . '" alt="Free Template by colorlib.com" width="350px" height="350px" class="w-100 img-fluid rounded">';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

    </section>

    <section id="contact" class="contact pt-5 pb-5">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center d-flex flex-column mb-5">

                    <h4 class="font_offres color-red mt-3 mb-3">Nous Contacter</h4>

                    <h5 class="lead color-red">Si vous souhaitez plus d'informations, faites nous parvenir votre demande.</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="d-none d-sm-flex col-12 col-sm-4 pb-5 justify-content-center ">
                    <img src="images/chef.jpg" alt="photo-chef" class="shadow-lg img_presentation rounded">
                </div>
                <div class="col-12 col-sm-4 mb-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger btn-lg" value="Contactez Moi">
                        </div>
                    </form>
                    <p class="lead text-black">
                        Adresse: <br> 2 Rte de Montaigu <br> 39000 Lons-le-Saunier <br> <br>
                        Téléphone: <br><a class="text-danger" href="tel:0681890037">
                            06-81-89-00-37</a><br>
                        Email: <br> <a class="text-danger" href="mailto:jecontacte@campus-numerique-lons.fr?subject=Demande de Renseignement Restaurant&body=Bonjour Sylviane,">jecontacte@campus-numerique-lons.fr</a>
                    </p>
                </div>
            </div>

        </div>


        </div>

    </section>

    <footer id="footer" class="bg-secondary pt-5 pb-5">

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <p class="lead text-center pt-4">
                        <small class="text-light">&copy; 2020 tout droit réservé. Crée par Team POO</small>

                    </p>
                </div>

            </div>
        </div>


    </footer>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>