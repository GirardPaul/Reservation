<?php


//Retourne une connexion à la base de donnée

function getPdo(){
    $pdo = new PDO('mysql:host=localhost;dbname=paulg_magellan;charset=utf8', 'paulg', 'gGfyw5JV9DzVvg==', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}
