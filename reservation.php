<?php

require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

// Nouvelle instance de Menu
$ajoutMenu = new Menu();

?>


<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Réservation repas</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Pacifico&display=swap" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reservation.css">
  <link rel="stylesheet" href="css/selectbox.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="burger.css">
	<script src="js/selectbox.min.js"></script>
  </head>

  <body style="background-color: #eddec3;">

  <section>
        <!--  NavBar   -->
        <div class="navbar bg-dark">
            <a href="index.php">Accueil</a>
            <a href="index.php#presentation">La Chef</a>
            <a href="index.php#menu">Menu</a>
            <a href="index.php#offres">Offres</a>
            <a href="#">Réservation</a>
            <a href="index.php#contact">Contact</a>
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
                    <li><a class="menu-b-link" href="index.php">ACCUEIL</a></li>
                    <li><a class="menu-b-link" href="index.php#presentation">LA CHEF</a></li>
                    <li><a class="menu-b-link" href="index.php#menu">MENU</a></li>
                    <li><a class="menu-b-link" href="index.php#offres">OFFRES</a></li>
                    <li><a class="menu-b-link" href="#">RESERVATION</a></li>
                    <li><a class="menu-b-link" href="index.php#contact">CONTACT</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
    </section>
    <div class="container mt-resa">


      <!-- Section: Block Content -->
      <section class="dark-grey-text">

        <h3 class="text-center font-weight-bold mb-4 pb-2">Réservez vos repas !</h3>
        <!-- <p class="text-center text-muted w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p> -->

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-5 mb-lg-0 mb-5 text-center">

            <img src="img/cuisine.jpg" class="img-media" alt="">

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-7 d-flex">
            <form action="traitement_resa.php" method="post">

		<?php
		  	$today = strftime("%Y-%m-%d", strtotime("now"));
			  $endDate = strftime("%Y-%m-%d", strtotime("+12 day"));

			$resa = $ajoutMenu->DatePeriode($today, $endDate);

			setlocale(LC_TIME, "fr_FR","French");

			while ($row = $resa->fetch()) {

			$date = strftime("%A %d %B %G", strtotime($row['date']));
			
			echo "<div class='form-flex-1'>";
			echo "<ul class='ks-cboxtags'> <li class=''>";
			echo "<input class='form-control w-35' type='checkbox' name='azer[]' value='".$date."'>";
			echo "<label class='' for='azer[]'>".$date."</label>";
			echo "</li></ul>";

			echo "<select id='' class='justselect' name='select_menu[]'>";

			echo "<option value='Choississez un menu' selected disabled>Choississez un menu</option>";
			echo "<option value='Entrée / Plat'>Entrée / Plat</option>";
			echo "<option value='Plat / Dessert'>Plat / Dessert</option>";
			echo "<option value='Menu complet'>Menu complet</option>";
			echo "</select>";
			echo "</div>";
			}
      ?>
      <div class="form-flex-2">

        <select name="formule" class="justselect">
          <option value="Choix de l'offre" disabled selected>Choix de l'offre</option>
          <option value="Formule étudiant">Formule étudiant</option>
          <option value="Formule standard">Formule standard</option>
        </select>

        <?php
        echo $ajoutMenu->AddMenu('nom');
        echo $ajoutMenu->AddMenu('prenom');
        echo $ajoutMenu->AddMenu('mail');
        ?>
        
        <input class="w-auto form-control btn btn-elegant" type="submit" value="Réserver">
        </form>
      </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Block Content -->

    </div>
  </body>

</html>