<?php

require_once('database.php');

class Connexion {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }
    public function selectUser() {

        $query = $this->pdo->prepare("SELECT * FROM users WHERE name =? AND password =? ");
        $name = $_POST['name'];
        $_POST['password'] = MD5($_POST['password']);
        $query->execute([$name, $_POST['password']]);
        return $query;
    }


}