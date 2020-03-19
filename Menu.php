<?php

require_once('Connexion.php');
require_once('database.php');

class Menu extends Connexion {



        //Sélection des menus dans la base de données
        public function Find(){

            $query = $this->pdo->prepare('SELECT id, entree, plat, dessert, date FROM menu ORDER BY date ASC');
            $query->execute();
            return $query;

        }


        public function FindDate($date){
            $query = $this->pdo->prepare("SELECT * FROM menu WHERE date = '$date' ");
            $query->execute();
            return $query;
        }

        public function DatePeriode($debut, $fin){
            $query = $this->pdo->prepare("SELECT * FROM menu WHERE date BETWEEN '$debut' AND '$fin' ORDER BY date ASC");
            $query->execute();
            return $query;
            
        }




        //Ajout des menus dans la base de données
        public function addAll(string $entree, string $plat, string $dessert, string $date){

            $query = $this->pdo->prepare('INSERT INTO menu SET entree = :entree, plat = :plat, dessert = :dessert, date = :date');
            $query->execute(compact('entree', 'plat', 'dessert', 'date'));

        }

        //Création des Inputs pour les choix du menu

        public function AddMenu($name, $value = ""){

            return '<input type="text" name="'.$name.'" placeholder="'.$name.'" value="'.$value.'"><br />';

        }


        public function SelectMenu(int $id){

            $query = $this->pdo->prepare("SELECT * FROM menu WHERE id = :menu_id");
    
            $query->execute(['menu_id' => $id]);
    
            return $query;
        
        }



        //Création des Inputs pour la date

        public function AddDate($name, $value = ""){


            return '<input type="date" name="'.$name.'" value="'.$value.'"> <br />';

        }

        //Création du bouton d'envoi

        public function SendMenu(){

            return '<input type="submit" value="Envoyer">';

        }

        //Modification des menus dans la base de données
        public function Update(string $entree, string $plat, string $dessert, string $date){

            $query = $this->pdo->prepare("UPDATE menu SET entree = :entree, plat = :plat, dessert = :dessert, date = :date WHERE id = '".$_SESSION['menuid']."'");
            $query->execute(compact('entree', 'plat', 'dessert', 'date'));

        }

        //Suppression des menus dans la base de données
        public function Delete(int $id){
            $query = $this->pdo->query("DELETE FROM menu WHERE id = $id");
        }
          // Sélection des images actuelles
          public function selectImg() {
            $query = $this->pdo->query("SELECT * FROM img");
            return $query;
        }

        // Update d'une image
        public function updateImg(string $filename, string $image, string $img) {

            $query = $this->pdo->query("UPDATE img SET name = '$filename', image = '$image' WHERE id = '$img'");
        }

        public function insertImg($filename, $image) {

            $query = $this->pdo->query("INSERT INTO img (name, image) VALUES ('".$filename."', '".$image."')");
        }

        public function selectBy() {

            $query = $this->pdo->query("SELECT * FROM img ORDER BY id");
            return $query;
        }
}