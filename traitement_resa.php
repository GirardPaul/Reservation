<?php
session_start();
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');


echo "Vous avez réservé un repas pour les jours suivants :";

$formule = $_POST['formule'];
$jour = $_POST['azer']; $choix = $_POST['select_menu']; 
$test = array_combine($jour, $choix); 
$reservation = ""; 
foreach ($test as $key => $value) {
  
  $reservation .= $key.' : '.$value."\n"; 
} 
echo($reservation);

$mail_magellan = 'girard.paul39@gmail.com';

if($_POST) {

   $nom = trim(stripslashes($_POST['nom']));
   $prenom = trim(stripslashes($_POST['prenom']));
   $mail_client = trim(stripslashes($_POST['mail']));
   $subject = "Réservation repas";
   $message = "";

   // Check Nom
	if ((strlen($nom) < 2) || (!preg_match("#^[a-zA-Z]+$#", $nom))) {
		$error['nom'] = "Veuillez renseigner votre nom.";
    }
    
    // Check Prénom
	if ((strlen($prenom) < 2) || (!preg_match("#^[a-zA-Z]+$#", $prenom))) {
		$error['prenom'] = "Veuillez renseigner votre nom.";
    }
    
	// Check Mail
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $mail_client)) {
		$error['mail_client'] = "Veuillez renseigner une adresse mail valide.";
	}


   // Set Message
   $message .= "Réservation de : " . $prenom . " " . $nom . "\r\n";
      $message .= "Adresse mail : " . $mail_client . "\r\n";
   $message .= "Jour(s) de réservé(s) : " . "\r\n";
   $message .= $reservation;
   $message .= "La formule choisi est la : ".$formule;
   //    $message .= "<br /> ----- <br /> Cet e-mail à été envoyé depuis le formulaire de contact. <br />";

   $confirmation = "Bonjour et merci pour votre réservation de repas. " . "\r\n" . "Voici le récapitulatif de votre commande :" . "\r\n";
   $confirmation .= "Jour(s) de réservé(s) :" . "\r\n";
   $confirmation .= $reservation;
   $confirmation .= "Vous avez choisi la : ".$formule;
   $confirmation .= "\r\n" . "Un mail de confirmation vous sera envoyé prochainement. À bientôt !";

   // Set From: header
   $from =  $nom . $prenom . " <" . $mail_client . ">";

   // Email pour magellan
	$headers = "De: " . $from . "\r\n";
	$headers .= "Répondre à: ". $mail_client . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   
   // Email confirmation client 
   $headers_client = "De: 'magellan_resa@magellan.com'\r\n";
	$headers_client .= "Répondre à: 'noreply@magellan.com' \r\n";
 	$headers_client .= "MIME-Version: 1.0\r\n";
   $headers_client .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   if (!$error) {

      // ini_set("sendmail_from", $mail_magellan); // for windows server
      $mail_magellan = mail($mail_magellan, $subject, $message);

      $client = mail($mail_client, $subject, $confirmation);

		if ($mail_magellan) { echo "Votre message a été envoyé avec succès !"; }
      else { echo "Une erreur est survenue, veuillez réessayer s'il vous plaît."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['nom'])) ? $error['nom'] . "<br /> \n" : null;
		$response = (isset($error['prenom'])) ? $error['prenom'] . "<br /> \n" : null;
		$response .= (isset($error['mail_client'])) ? $error['mail_client'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error
}