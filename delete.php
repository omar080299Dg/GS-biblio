<script>
    if(confirm('voulez vous vraiment supprimer'))
    {
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
        $liv_id=$_GET['liv_num'];
        $sql= $bdd->exec("DELETE  FROM livre WHERE liv_num=$liv_id");
        header("location:livre.php");?>
    }
</script>


// $username="root";
// $password="";
// $database="gs_school";
// $host="localhost";
// try {

//     $bdd=new PDO("mysql:host=$host;dbname=$database",$username,$password);
//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
// } catch (Exception $e) {
//     echo $e->getMessage();
// }
// $liv_id=$_GET['liv_num'];
// $sql= $bdd->exec("DELETE  FROM livre WHERE liv_num=$liv_id");
// header("location:livre.php");
 
// ?>