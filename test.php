<?php
$username = "root";
$password = "";
$database = "jeux_video";
$host = "localhost";
if(isset($_GET['p']))
{
    $currentPage=$_GET['p'];
}
else
{
    $_GET['p']=1;
}
try {
    $bdd = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    echo $e->getMessage();
}

$reponse = $bdd->query("SELECT COUNT(ID) as nbjeux FROM jeux_video  ");
$donnee = $reponse->fetch();
$nombreJeux=$donnee['nbjeux'];
$perPage=6;
$nbrePage= ceil($nombreJeux/$perPage);
// $currentPage=1;
// ".(($currentPage-1)*$perPage).". , $perPage
 
$reponse = $bdd->query("SELECT * FROM jeux_video LIMIT  ".(($currentPage-1)*$perPage)." , $perPage");
while ($donnee = $reponse->fetch()) {
    echo $donnee['nom'] . "<br>";
}
for ($i=0; $i <$nbrePage ; $i++) { 
     echo " <a href='test.php?p=$i'>$i/</a>";
}