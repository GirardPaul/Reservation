<?php
session_start();
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');


echo "Vous avez réservé un repas pour les jours suivants :";


$jour = $_POST['azer']; $choix = $_POST['select_menu']; 
$test = array_combine($jour, $choix); 
$reservation = ""; 
foreach ($test as $key => $value) {
  
  $reservation .= $key.$value; 
} 
echo($reservation);