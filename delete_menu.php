<?php

require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

$delete = new Menu();

$menuid = $_GET['dataid'];

$delete->Delete($menuid);

header('Location: index.php');
