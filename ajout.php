<?php include 'header.php';
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
<link rel="stylesheet" href="ajout.css">
<body  >
    <div class="container">
        <div class="bar">
            <h1 class="display-4 text-center"><i class="fas fa-book-open text-primary">
            </i>   <span class="text-primary">GS- </span>Biblio</h1>
            <h3  class="display-6 text-center"> Ajout de livre</h3>
    
        </div>

    </div>
    
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data
        ">
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
                  <option value="THEATRE">THEATRE</option>
                  <option value="POESIE">POESIE</option>
                  <option value="CONTES">CONTES</option>
                </select>
            </div>
            <!-- <div class="form group">
                <label for="img">image</label>
                <input type="text" id="img" class="form-control" name="file">

            </div> -->
            <div class=" " id="buut">
                <input type="submit" type="button" value="Save" name="submit"  class="btn btn-primary">
            <input type="reset" type="button" value="Reset" name="submit"  class="btn btn-warning">
            <a type="button"   name="submit"  class="btn btn-danger">cancel</a>

            </div>
        </form>

    </div>

<?php
if($_POST)
{
    $sql= $bdd->prepare('INSERT INTO auteur ( nom_aut,prenom_aut )
    VALUES( :nom_aut,:prenom_aut )');
    $sql->execute(array( 
    
    'nom_aut'=>$_POST['nom'],
    'prenom_aut'=>$_POST['prenom']
     
   
 
));
}






// if(isset($_POST['btn-add']))
// 	{
// 		$name=$_POST['user_name'];

// 		$images=$_FILES['profile']['name'];
// 		$tmp_dir=$_FILES['profile']['tmp_name'];
// 		$imageSize=$_FILES['profile']['size'];

// 		$upload_dir='upload/';
// 		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
// 		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
// 		$picProfile=rand(1000, 1000000).".".$imgExt;
//         move_uploaded_file($tmp_dir, $upload_dir.$picProfile);}
        
	 

if( $_POST )

{
    
		// $images=$_FILES['file']['name'];
		// $tmp_dir=$_FILES['file']['tmp_name'];
		// $imageSize=$_FILES['file']['size'];

		// $upload_dir='upload/';
		// $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		// $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		// $picProfile=rand(1000, 1000000).".".$imgExt;
        // move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        



    $sql= $bdd->prepare('INSERT INTO livre(liv_num,liv_titre,nom_aut,prenom_aut,lien_image, quantite,categorie)
    VALUES(:liv_num,:liv_titre,:nom_aut,:prenom_aut,:lien_image, :quantite,:categorie)');
    $sql->execute(array( 
    'liv_num'=>$_POST['id'],
    'liv_titre'=>$_POST['titre'],
    'nom_aut'=>$_POST['nom'],
    'prenom_aut'=>$_POST['prenom'],
    'lien_image'=>"upload/".$_POST['titre'].".jpg",
    'quantite'=>$_POST['quantite'],
    'categorie'=>$_POST['categorie']
   
 
));
}
?>
 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:40%">
      40% Complete (success)
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>

</body>