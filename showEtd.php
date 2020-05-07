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
 
$reponse=$bdd->query("SELECT * FROM Adherant JOIN emprunter ON Adherant.adh_num=emprunter.adh_num JOIN livre ON livre.liv_num=emprunter.liv_num");
 

?>

<div class="omar">
<?php while( $donnee=$reponse->fetch())
{   ?>
<div class="card mb-6" style="width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= $donnee['line_img'] ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title"><?=$donnee['adh_nom']." ".$donnee['adh_prenom'] ?></h1>
        <p class="card-text"><span class="ref">Identifiant:</span>  <?=$donnee['adh_num']?><br></p>
        <p class="card-text"><span class="ref">Addresse:</span> <?=$donnee['adh_ville']?>, Rue: <?=$donnee['adh_rue']?> BP: <?=$donnee['adh_cp']?><br></p>
        <p class="card-text"><span class="ref">Telephone:</span>  <?=$donnee['tel']?><br></p>
        <div class="progress">
            
            <?php $nbj=strtotime($donnee['date_emprun']) +strtotime( date('Y-m-d'));
            $del=ceil($nbj/(strtotime($donnee['delai']))) ;
            if ($del>0 && $del<=20): ?>
         
                <style>
               .progress-bar 
               {
                   background: green;
               }
                </style>
                
           <?php endif ;?>
            
            <div class="progress-bar" role="progressbar" aria-valuenow="<?= $del?>"%
            aria-valuemin="0" aria-valuemax="100" style="width:<?= $del?>%">
            <?= $del?>%
            </div>
            </div> 

        
      </div>
    </div>
  </div>
</div>
<?php  } ?>
 
</div>
 
 