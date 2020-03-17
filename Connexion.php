<?php

require_once('database.php');

class Connexion {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }


}