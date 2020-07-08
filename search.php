<link rel="stylesheet" href="allbook.css">
<header>
<i class="fas fa-book-open text-primary">
 </i>  <span> Gs_biblio</span>

   <p><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>logout</a></p>
</header>
<div class="search">
    <form action="" method="post">
        <input type="text" name="searching" placeholder="livre à rechercher"> 
        <button type="submit">rechercher</button>
       
    </form>
</div>
<?php
require 'header.php';
$username = "root";
$password = "";
$database = "gs_school";
$host = "localhost";
try {
    $bdd = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    echo $e->getMessage();
}
if(isset($_POST['searching']))
{ 
$reponse = $bdd->prepare("SELECT * FROM livre WHERE liv_titre=:liv_titre");
$reponse->execute(['liv_titre'=>$_POST['searching']]);

?>


<div class="omar">
<?php while ($donnee = $reponse->fetch()) {?>
<div class="card" style="width: 18rem;">
  <img src="<?php echo $donnee['lien_image']; ?>" class="card-img-top" alt="..." width="100px" height="200px">
  <div class="card-body">
   <div class="txt">
   <p class="car d-text"> identifiant:<?=$donnee['liv_num']?> </p>
    <p class=" afghanistan-text"> titre :<?=$donnee['liv_titre']?> </p>
    <p class="ca rd-text"> Auteur :<?=$donnee['nom_aut'] . " " . $donnee['prenom_aut']?> </p>

    <?php if ($donnee['quantite'] >= 5) {?>
       Quantite Disponible : <a href='#' class='btn btn-success btn-sm delete'><?=$donnee['quantite']?></a>

               <?php } else {?>
               Quantite Disponible : <a href='#' class='btn btn-danger btn-sm delete'> <?=$donnee['quantite']?></a>


              <?php }?>



    <p class=" - "> categorie:<?=$donnee['categorie']?>  </p>
   </div>
  </div>
</div>
<?php }?>
</div>

<?php  }?>
