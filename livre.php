
<?php

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
?>

<?php
function supprimer()
{
    $username = "root";
    $password = "";
    $database = "gs_school";
    $host = "localhost";
    try {

        $bdd = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['liv_num'])) {
            $liv_id = $_GET['liv_num'];
            $sql = $bdd->exec("DELETE  FROM livre WHERE liv_num=$liv_id");
            header("location:livre.php");
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="omar.css">
     <link rel="stylesheet" href="omar.css">
    <title>Document</title>
</head>
<body >
<style>
  body
 {
     background: url(' img/abstract-682549_1920.jpg');
    /* background-size: cover */
 }
</style>

<div class="container">
<?php
$cat = $_GET['categorie'];
$reponse = $bdd->query("SELECT * FROM livre WHERE categorie=$cat");
while ($donnee = $reponse->fetch()) {?>
    <div class="card">
        <div class="img" data-text="<?php echo $donnee['liv_titre']; ?>">
            <img src="<?php echo $donnee['lien_image']; ?>"   alt="" >

        </div>
        <div class="content">
            <div>
                <h3><?php echo $donnee['liv_titre']; ?>
            </h3>
               <?php if ($donnee['quantite'] >= 5) {?>
                <p><strong> Auteur</strong> :<?php echo $donnee['nom_aut'] . " " . $donnee['prenom_aut'] . "<br>Quantite Disponible : <a href='#' class='btn btn-success btn-sm delete'>" . $donnee['quantite'] . "</a><br>"; ?>
                <a  type="button" class="btn btn-danger"   onclick="<?php supprimer();?>" href="livre.php?liv_num= <?php echo ($donnee['liv_num']) ?>"><span class="gliphy"></span>supprimer</a>


                </p>
               <?php } else {?>
                <p><strong> Auteur</strong> :<?php echo $donnee['nom_aut'] . " " . $donnee['prenom_aut'] . "<br>Quantite Disponible : <a href='#' class='btn btn-danger btn-sm delete'>" . $donnee['quantite'] . "</a><br>"; ?>
                <a  type="button" class="btn btn-danger"   onclick="<?php supprimer();?>" href="livre.php?liv_num= <?php echo ($donnee['liv_num']) ?>"><span class="gliphy"></span>supprimer</a>

              <?php }?>

            </div>
>
        </div>

    </div>
<?php }?>


</div>



<!-- //Connection a la base de données

$req = $bdd->query(SELECT * FROM TA TABLE);

//Dans ta table tu a mis le lien de l'image ( ex : Images/Mon_image.jp )

$image = $req->fetch();

<img src = "</?php echo $image['nom de ta colonne'] ?>" alt = ""/>
 -->


 <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>








<?php if ($user->statut == "medecin"): ?>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Make an Appointment</a>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>