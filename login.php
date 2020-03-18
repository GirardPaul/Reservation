<?php
session_start();
require_once('Connexion.php');
require_once('database.php');

$user = new Connexion();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>Connexion</title>
</head>
<body>
    <div class="wrapper fadeInDown">
    <h1>Connexion</h1>
    <?php
    if (isset($_POST['name']) && isset($_POST['password'])) {

      $query = $user->selectUser();
      // cette requête permet de récupérer l'utilisateur depuis la BD
      // $requete = "SELECT * FROM `users` WHERE `name`=? AND `password`=?";
      // $resultat = $bdd->prepare($requete);
      // $name = $_POST['name'];
      // $_POST['password'] = MD5($_POST['password']);
      // $resultat->execute([$name, $_POST['password']]);

  
      if ($query->fetch()) {
          // l'utilisateur existe dans la table
          // on ajoute ses infos en tant que variables de session
          $_SESSION['name'] = $name;
          $_SESSION['password'] = MD5($password);
          header("location: index.php");
      }
      else {
        echo "<h5>Identifiant incorrect, veuillez réessayer.</h5>";
      } 
  }
  ?>
  <div id="formContent">
    <div class="fadeIn first">
      <img src="images/users.png" id="icon" alt="User Icon"/>
    </div>

    <form method="post" action="login.php">
      <input type="text" id="login" class="fadeIn second" name="name" placeholder="Votre nom" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Votre mot de passe" required>
        <input type="submit" class="fadeIn fourth" value="Se connecter">
    </form>
  </div>
</div>

</body>
</html>