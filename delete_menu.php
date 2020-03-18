<?php

require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');
if(empty($_SESSION["name"]) && empty($_SESSION["password"])) {

    header("location: login.php");
    exit;
    }

$delete = new Menu();

$menuid = $_GET['dataid'];

$delete->Delete($menuid);

header('Location: admin.php');
