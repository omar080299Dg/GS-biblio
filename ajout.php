<?php include 'header.php';
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
<link rel="stylesheet" href="ajout.css">
<body  >
    <style>
        body
 {
     background: url(' img/abstract-682549_1920.jpg');
    /* background-size: cover */
 }
    </style>
    <div class="container">
        <div class="bar">
            <h1 class="display-4 text-center"><i class="fas fa-book-open text-primary">
            </i>   <span class="text-primary">GS- </span>Biblio</h1>
            <h3  class="display-6 text-center"> Ajout de livre</h3>

        </div>

    </div>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form group">
                <label for="id">identifiant</label>
                <input type="number" id="id" class="form-control" name="id">

            </div>
            <div class="form group">
                <label for="titre">Titre</label>
                <input type="text" id="titre" class="form-control" name="titre">

            </div>
            <div class="form group">
                <label for="nom">Nom Auteur</label>
                <input type="text" id="nom" class="form-control" name="nom">

            </div>
            <div class="form group">
                <label for="prenom">Prenom Auteur </label>
                <input type="text" id="prenom" class="form-control" name="prenom">

            </div>
            <div class="form group">
                <label for="Quantite">Quantite</label>
                <input type="number" id="Quantite" class="form-control" name="quantite">

            </div>
            <div class="form group" id="cat">
                <label for="categorie">Choose a categorie:</label>

                <select id="categorie" name="categorie">
                  <option value="ROMAN">ROMAN</option>
                  <option value="HISTOIRE">HISTOIRE</option>
                  <option value="POESIE">POESIE</option>
                  <option value="CONTES">CONTES</option>
                  <option value="GEOGRAPHIE">GEOGRAPHIE</option>
                  <option value="SCIENCE">SCIENCE</option>
                </select>

              <div class="form group">
                <label for="img">image</label>
                <input type="file" id="img" class="form-control" name="userfile">


            <div class=" " id="buut">
                <input type="submit" type="button" value="Save" name="submit"  class="btn btn-primary">
            <input type="reset" type="button" value="Reset" name="submit"  class="btn btn-warning">
            <a type="button"   name="submit"  class="btn btn-danger">cancel</a>

            </div>
        </form>

    </div>







<?php
if ($_POST) {
    $query="SELECT * FROM livre WHERE liv_num=:id";
    $statement=$bdd->prepare($query);
    $statement->execute(
      array(
        'id'=>$_POST["id"]
        
      )
    );
    $count=$statement->rowCount();
    if($count>0){ 
        $don=$statement->fetch();
    $qt=$don['quantite'];
            
    $req = $bdd->prepare('UPDATE livre SET quantite = :quantite  WHERE liv_num = :id');
    $req->execute(array(
        'id'=>$_POST["id"],
        'quantite'=>$_POST['quantite'] +$qt
	));
 
    }
  else
  {

    $sql = $bdd->prepare('INSERT INTO auteur ( nom_aut,prenom_aut )
    VALUES( :nom_aut,:prenom_aut )');
    $sql->execute(array(

        'nom_aut' => $_POST['nom'],
        'prenom_aut' => $_POST['prenom'],
    ));

    $uploaddir = "upload/";
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
    $sql = $bdd->prepare('INSERT INTO livre(liv_num,liv_titre,nom_aut,prenom_aut,lien_image, quantite,categorie)
    VALUES(:liv_num,:liv_titre,:nom_aut,:prenom_aut,:lien_image, :quantite,:categorie)');
    $sql->execute(array(
        'liv_num' => $_POST['id'],
        'liv_titre' => $_POST['titre'],
        'nom_aut' => $_POST['nom'],
        'prenom_aut' => $_POST['prenom'],
        'lien_image' => "upload/" . $_FILES['userfile']['name'],
        'quantite' => $_POST['quantite'],
        'categorie' => $_POST['categorie'],

    ));
  }












   
   }
 
 
?>
 <!-- <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:40%">
      40% Complete (success)
    </div> -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>

</body>