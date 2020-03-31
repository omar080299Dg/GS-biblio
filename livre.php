
<?php

$username="root";
$password="";
$database="gs_school";
$host="localhost";
try {
    $bdd=new PDO("mysql:host=$host;dbname=$database",$username,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
} catch (Exception $e) {
    echo $e->getMessage();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="omar.css">   
    <title>Document</title>
</head>
<body >


<div class="container">
<?php
$reponse=$bdd->query("SELECT * FROM livre");
  while( $donnee=$reponse->fetch())
{?>
    <div class="card">
        <div class="img" data-text="<?php echo $donnee['liv_titre'];?>">
            <img src="<?php echo $donnee['lien_image']; ?>"   alt="" >

        </div>
        <div class="content">
            <div>
                <h3><?php echo $donnee['liv_titre'];?>
            </h3>
               
                <p><strong> Auteur</strong> :<?php echo $donnee['nom_aut']." ". $donnee['prenom_aut']."<br>Quantite Disponible :". $donnee['quantite']."<br>";?> 
               
                
                
                </p>
              
            </div>

        </div>

    </div>
<?php  }?>
  
    
</div>



<!-- //Connection a la base de données
 
$req = $bdd->query(SELECT * FROM TA TABLE);
 
//Dans ta table tu a mis le lien de l'image ( ex : Images/Mon_image.jp )
 
$image = $req->fetch();
 
<img src = "</?php echo $image['nom de ta colonne'] ?>" alt = ""/>
 -->



 
</body>
</html>
