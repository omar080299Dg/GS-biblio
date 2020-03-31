<?php
session_start();
$host="localhost";
$username="root";
$password="";
$database="gs_school";
$message="";
  try  
  {
      $connection=new PDO("mysql:host=$host;dbname=$database",$username,$password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if (isset($_POST['login'])) {
          if (empty($_POST['username'] || $_POST['password'])) {

                $message='<p>hey enter this</p>';
          }
       else{
              $query="SELECT * FROM login  WHERE username= :username AND password=:password";
              $statement=$connection->prepare($query);
        $statement->execute(
            array(
                'username'=> $_POST['username'],
                'password'=>$_POST['password']
            )
            );
            $count=$statement->rowCount();
            if($count>0)
            {
                $_SESSION['username']=$_POST['username'];
                header("location:accueil.php");
            }
            else
            {
                $message='please rewrite';
            }
   }
   }
  }
  catch(PDOException $error)
  {
      $message=$error->getMessage();
  }

?>