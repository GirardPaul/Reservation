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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="style.css">
  <link rel="stylesheet"  href="burger.css">
  <link rel="stylesheet" href="mb_css/bootstrap.min.css">
  <link rel="stylesheet" href="mb_css/mdb.min.css">
  <link rel="stylesheet" href="mb_css/mdb.lite.min.css">
  <link rel="stylesheet" href="mb_css/style.css">
  
  <style>

    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: absolute;
    pointer-events: initial !important;
    opacity: 0;
}
.btn-blue-grey {
    color: #fff;
    background-color: #414141 !important;
    font-size: 1.5rem !important;
}
th{
  font-size: 1.5rem !important;
}
span{
  font-size: 1.5rem !important;
}
.btn-blue-grey:hover {
    color: #fff !important;
   
}
input[type="text"]
 {
    display: block !important;
    width: 100% !important;
    height: calc(1.5em + .75rem + 2px) !important;
    padding: .375rem .75rem !important;
    font-size: 1.5rem !important;
    text-align: center !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: .25rem !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
}
.caret{
  display: none !important;
}
.md-form input:not([type]), .md-form input[type="text"]:not(.browser-default), .md-form input[type="password"]:not(.browser-default), .md-form input[type="email"]:not(.browser-default), .md-form input[type="url"]:not(.browser-default), .md-form input[type="time"]:not(.browser-default), .md-form input[type="date"]:not(.browser-default), .md-form input[type="datetime"]:not(.browser-default), .md-form input[type="datetime-local"]:not(.browser-default), .md-form input[type="tel"]:not(.browser-default), .md-form input[type="number"]:not(.browser-default), .md-form input[type="search"]:not(.browser-default), .md-form input[type="search-md"], .md-form textarea.md-textarea{
  width: 95% !important;
}
@media screen and (max-width: 768px){
    .navbar{
        display: none !important;
    }
}
  </style>

  <script src="mb_js/bootstrap.min.js"></script>
  <script src="mb_js/jquery.min.js"></script>
  <script src="mb_js/mdb.min.js"></script>
  <script src="mb_js/mdb.lite.min.js"></script>
  <script src="mb_js/popper.min.js"></script>

  <script>

// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});

  </script>

  </head>

  <body>

  <section>
        <!--  NavBar   -->
        <div class="navbar d-flex justify-content-center align-items-center bg-dark">
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










          <div class="container center-resa mt-resa">
            
            <h1 class="text-center font-weight-bold mb-4 pb-2">Réservez vos repas !</h1>

<div class="row flex-column justify-content-center align-items-center">
  <form class="d-flex flex-column justify-content-center align-items-center col-6" action="" method="POST">

<?php
    $today = strftime("%Y-%m-%d", strtotime("now"));
    $endDate = strftime("%Y-%m-%d", strtotime("+12 day"));

  $resa = $ajoutMenu->DatePeriode($today, $endDate);

  setlocale(LC_TIME, "fr_FR","French");

  echo '<select name="azer[]" class="w-100 mdb-select md-form" multiple="multiple">';
  echo '<option value="" disabled selected> Sélection dates :</option>';
  while ($row = $resa->fetch()) {

  $date = strftime("%A %d %B %G", strtotime($row['date']));
  

  echo "<option value='".$date."'>".$date."</option>";

  }



  ?>
  </select>
  <input type="submit" name="submit" class="btn-save btn btn-blue-grey" value="Save">
  </form>
                <form class="d-flex flex-column justify-content-center align-items-center col-6" action="traitement_resa.php" method="POST">
                <?php

if(isset($_POST['azer'])){
  ?>
                <table class="table">
                <thead class="thead-info">
                    <tr>
                        <th class="text-center" scope="col">Date</th>
                        <th class="text-center" scope="col">Formule</th>
                    </tr>
                </thead>
                <tbody>
                    

                      <?php

                      for ($i=0; $i < count($_POST['azer']) ; $i++) { 
                        echo "<tr><td><input class='w-100' style='border: none; outline: none;' type='text' name='day[]' readonly='readonly'
                        value='".$_POST['azer'][$i]."'></td><td><select class='w-100 form-control' name='select_menu[]'><option value='Choississez un menu' selected disabled>Choississez un menu</option><option value='Entrée / Plat'>Entrée / Plat</option><option value='Plat / Dessert'>Plat / Dessert</option><option value='Menu complet'>Menu complet</option></select></td></tr>";
                      }
                    }
                      ?>
                </tbody>
                </table>

                <?php
                if(isset($_POST['submit'])){
                ?>
                 <h2 class="text-center font-weight-bold mb-4 pb-2">Renseignez vos coordonnées</h2>

                <select name="formule" class="w-50 mb-4 form-control justselect">
                <option value="Choix de l'offre" disabled selected>Choix de l'offre</option>
                <option value="Formule étudiant">Formule étudiant</option>
                <option value="Formule standard">Formule standard</option>
                </select>

                <?php
              

                
                  echo $ajoutMenu->AddMenu('nom');
                  echo $ajoutMenu->AddMenu('prenom');
                  echo $ajoutMenu->AddMenu('mail'); 
                  echo '<input class="w-auto pb-5 form-control pb-submit btn btn-blue-grey" type="submit" value="Réserver">';
                }
        ?>
  </form>
</div>
</div>

  </body>

</html>