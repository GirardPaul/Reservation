<?php
require_once('Connexion.php');
require_once('database.php');
require_once('Menu.php');

if(empty($_SESSION["name"]) && empty($_SESSION["password"])) {

    header("location: login.php");
    exit;
    }

// Créer une nouvelle instance
$newImg = new Menu();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="form.css">
    <title>Modification d'une image</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section class="container-fluid">
    <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12">
                <br>
                <h1 class="text-center mb-5">Remplacer une image</h1>
 
                <form class="text-center" action="" method="post" enctype="multipart/form-data">
            <?php
            // $select = $bdd->query("SELECT * FROM img");
            $query_select = $newImg->selectImg();
            ?>
            <select class="mb-5 mx-auto form-control w-25" name="select_image">
            <option value="Image" disabled selected>Image</option>
            <?php
            while ($row_select = $query_select->fetch()) {
            echo "<option value='".$row_select['id']."'>".$row_select['name']."</option>";
            }
            ?>
            </select>

    <input class="" type="file" name="file">
    <br>
    <input class="mt-3" type="submit" value="Replace" name="but_upload">

    </form>

<?php

                    if(isset($_POST['but_upload']))
                    {
                        $filename = $_FILES['file']['name'];
                        $img = $_POST['select_image'];
                        $target_dir = 'upload/';
                        if($filename != '')
                        {
                            $target_file = $target_dir.basename($_FILES['file']['name']);

                            //extension
                            $extension = strtolower((pathinfo($target_file, PATHINFO_EXTENSION)));

                            $extensions_arr = array("jpg", "jpeg", "png", "gif");

                            if(in_array($extension, $extensions_arr))
                            {
                                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                                $image = "data::image/".$extension.";base64,".$image_base64;

                                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
                                {
                                    
                                    $query_update = $newImg->updateImg($filename, $image, $img);

                                    // $req = $this->pdo->query("UPDATE img SET name = '$filename', image = '$image' WHERE id = '$img'");

                                    // $req = $bdd->query("INSERT INTO img (name, image) VALUES ('".$filename."', '".$image."')");
                                    // $query_insert = $newImg->insertImg($filename, $image);
                                    // var_dump($req);
                                }
                            }
                        }
                    }

?>
</body>
</html>