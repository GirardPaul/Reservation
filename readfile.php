<?php
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

// Créer une nouvelle instance
$newImg = new Menu();

// $req = $bdd->query("SELECT * FROM img ORDER BY id");
$query = $newImg->selectBy();

while($row = $query->fetch()){
    
    $filename = $row['name'];
    $image = $row['image'];
    echo '<img src="upload/'.$filename.'" width="300px" height="300px">';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>