<style>
 .omar
 {
    display: grid;
    grid-template-columns: 50% 50%;

 }
 .card
 {
     margin: 20px;
     border: 1px solid;
     padding: 10px;

 }


</style>
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
$currentPage=1;
if(isset($_GET['p']))
{
    $currentPage=$_GET['p'];
}
else
{
    $_GET['p']=1;
}
$reponse = $bdd->query("SELECT COUNT(Adh_num) as nbjeux FROM Adherant  ");
$donnee = $reponse->fetch();
$nombreJeux=$donnee['nbjeux'];
$perPage=4;
$nbrePage= ceil($nombreJeux/$perPage);

$reponse = $bdd->query("SELECT * FROM Adherant JOIN emprunter ON Adherant.adh_num=emprunter.adh_num JOIN livre ON livre.liv_num=emprunter.liv_num  LIMIT ".(($currentPage-1)*$perPage)." , $perPage");

?>

<div class="omar">
<?php while ($donnee = $reponse->fetch()) {?>
<div class="card mb-6" style="width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?=$donnee['line_img']?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title"><?=$donnee['adh_nom'] . " " . $donnee['adh_prenom']?></h1>
        <p class="card-text"><span class="ref">Identifiant:</span>  <?=$donnee['adh_num']?><br></p>
        <p class="card-text"><span class="ref">Addresse:</span> <?=$donnee['adh_ville']?>, Rue: <?=$donnee['adh_rue']?> BP: <?=$donnee['adh_cp']?><br></p>
        <p class="card-text"><span class="ref">Telephone:</span>  <?=$donnee['tel'] ?><br></p>
        <div class="progress">

            <?php  


$datetime1 = date_create(date('Y-m-d')); // Date fixe
$datetime2 = date_create($donnee['delai']); // Date fixe
$interval = date_diff($datetime1, $datetime2);
$marge=$interval->format('%R%a jours');

          $del =ceil(($marge/20) *100);
          if ($del > 0 && $del <= 20) {?>

                <style>
               .progress-bar
               {
                   background: red;
               }
                </style>

              <?php }
              elseif( $del>=20 && $del<=50){  
              ?>
               <style>
               .progress-bar
               {
                   background: orangered;
               }
                </style>
              <?php } 
              else{?>
              <style>
               .progress-bar
               {
                   background: green ;
               }
                </style>
                <?php }?>
            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$del?>"%
            aria-valuemin="0" aria-valuemax="100" style="width:<?=$del?>%">
            <?=$del?>%
            </div>
            </div>
           

      </div>
    </div>
  </div>
</div>
<?php }?>


</div>
<div class="d-flex justify-content-between my-4">
<?php if($currentPage>1):?>
 <a href="showEtd.php?p=<?=$currentPage -1?>" class="btn btn-primary"> &laquo; Page Precedente</a>
<?php endif;?>
<?php if($currentPage<$nbrePage):?>
 <a href="showEtd.php?p=<?=$currentPage +1?>" class="btn btn-primary ml-auto">Page Suivante &raquo;</a>
<?php endif;?>
</div>
 


