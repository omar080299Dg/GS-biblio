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
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="card" style="width: 18rem; margin:30px">
<center><i class="fas fa-user-graduate fa-10x text-danger" style="padding-top: 20px"></i>
<div class="form-group">

         <input type="file" class="form-control" name="photo" placeholder="photo  ">
     </div></center>
<div class="card-body">

<div class="form-group">

        <input type="text" class="form-control" name="adh_num" placeholder="identifiant adh  ">
    </div>
  <div class="form-group">

        <input type="text" class="form-control" name="nom" placeholder="nom  ">
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="prenom" placeholder="prenom  ">
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="bp" placeholder="boite Postale  ">
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="ville" placeholder="ville  ">
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="rue" placeholder="rue  ">
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="tel" placeholder="telephone  ">
    </div>
    <div class="form-group">

         <input type="text" class="form-control" name="liv_num" placeholder="identifiant_liv  ">
     </div>

     <button class="btn btn-success">register</button>

</div>
</div>
</form>

<?php
if ($_POST) {
    $uploaddir = "upload/";
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
        $sql= $bdd->prepare('INSERT INTO Adherant (   adh_num  ,adh_nom,adh_prenom,adh_cp,adh_ville,adh_rue, line_img,tel)
        VALUES(:adh_num  ,:adh_nom,:adh_prenom,:adh_cp,:adh_ville,:adh_rue, :line_img,:tel )');
        $sql->execute(array(

    'adh_num'=>$_POST['adh_num'],
        'adh_nom'=>$_POST['nom'],
        'adh_prenom'=>$_POST['prenom'],
        'adh_cp'=>$_POST['bp'],
        'adh_ville'=>$_POST['ville'],
        'adh_rue'=>$_POST['rue'],
        'line_img'=>"upload/".$_FILES['photo']['name'],
        'tel'=>$_POST['tel']

));

    $sql = $bdd->prepare('INSERT INTO emprunter(liv_num,adh_num,date_emprun,date_rendu, delai)
    VALUES(:liv_num,:adh_num,:date_emprun,:date_rendu, :delai )');
    $sql->execute(array(
        'liv_num' => $_POST['liv_num'],
        'adh_num' => $_POST['adh_num'],
        'date_emprun' => date('Y-m-d'),
        'date_rendu' => date('Y-m-d'),
        'delai' => date('Y-m-d' ,strtotime('+20 days')),

    ));

}
?>
