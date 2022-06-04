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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    </head>
<body>



<a href="./form.php" style="margin-left:360px;" >ajouter</a>

<a href="http://localhost:8080/produits/logout" style="margin-left:500px;" >logout</a>


<h1 style="text-align: center;color:red;">Bienvenue</h1>
    <h3 style="text-align: center;">Liste des Produits</h3>
    <?php
    $jsonurl = "http://localhost:8080/produits/api"; 
    $json = file_get_contents($jsonurl);
    $jsonDecode = json_decode($json, true);
?>
<table style="width: 500px; height:300px; margin:auto" class="table table-bordered">
    <tr>
        <th>ID</th><th>Nom Produit</th><th>Prix</th><th>Date Création</th><th>image</th>
    </tr>
<?php foreach($jsonDecode as $mydata){ ?>
    <tr>
            <td> <?php  echo $mydata['idProduit'] . "<br>";?></td>
            <td><?php  echo $mydata['nomProduit'] . "<br>";?></td>
            <td><?php  echo $mydata['prixProduit'] . "<br>";?></td>
            <td><?php   echo $mydata['dateCreation'] . "<br>";?></td>
            <td><?php   
            if($mydata['image'])
                echo "<img style='height:40px; width:40px;' src = 'imgs/{$mydata['image']}'>" . "<br>";
            else 
            echo "<img style='height:40px; width:40px;' src = 'imgs/default.jpg'>" . "<br>";
            ?></td>
            <td><a onclick="return confirm('Etes-vous sûr ?')"

            href="http://localhost:8080/produits/deleteProduit?id=<?php echo $mydata['idProduit']?>">Supprimer</a></td>
            <td><a href="http://localhost:8080/produits/edit/id/<?php echo $mydata['idProduit']?>">Edit</a></td>
        </tr>
      <?php } ?>
</table>
</body>
</html>