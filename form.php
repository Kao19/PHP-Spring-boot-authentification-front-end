<?php 
session_start();
if (!isset($_SESSION["userName"])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Creer un Produit</title>
</head>

<body><br>
    <fieldset style="width: 500px;margin:auto">
        <legend>Creer un Produit</legend>
        <form enctype="multipart/form-data" action="" method="POST">
            <pre>

            Nom : <input type="text" name="nomProduit" id="nom"/>

            Prix  <input type="text" name="prixProduit" id="prix">

           DATE DE CREATION <input type="date" name="date" id="date">

           Select Image File to add: <input type="file" name="image">

            <input type="submit"  value="ajouter">
        </pre>
        </form>
    </fieldset>
    <div>
        <?php

        $file_name="default.jpg";

        if (isset($_FILES['image'])) {
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp, "imgs/" . $file_name);

            ?>
            <form action="http://localhost:8080/produits/ajouterProduit" method="post">
            

            <input type="text" hidden name="nomProduit" id="nom" value="<?php echo $_POST['nomProduit'] ?>"/>

            <input type="text" hidden name="prixProduit" id="prix" value="<?php echo $_POST['prixProduit'] ?>">

            <input type="date" hidden name="date" id="date" value="<?php echo $_POST['date']?>">

            <input type="text"  hidden name="image" id="img" value="<?php echo $file_name?>">

           <input type="submit"  value="liste des produits">
       
       </form>
            <?php
        }

        ?></div>
    <br />
    
</body>

</html>