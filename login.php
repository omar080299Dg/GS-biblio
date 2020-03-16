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
  <link rel="stylesheet" href="login.css">
</head>

<body>
 <!-- <div class="container">
   <h1 class="text-center">login form</h1>
   <div class="row">
     <div class="col-md-4"></div>
     <div class="col-md-4">
       <input type="text" class="form-control" name="username" placeholder="username">
       <input type="password" class="form-control" name="password" placeholder="password">
       <a href="#"> <span class="glyphicon glyphicon-menu-right" style="color: aqua;">></span></a>
     </div>
     
     <div class="col-md-4"></div>

   </div>

 </div> -->
 <?php

 session_start();
 $host="localhost";
 $username="root";
 $password="";
 $database="gs_school";
 $message="";
 try {
   $connect=new PDO("mysql:host=$host;dbname=$database", $username, $password);
   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
 // if (isset($_POST["login"])) {
    if (empty($_POST["username"])|| empty($_POST["passwordd"])) {
      $message="<p> these field are required";
    }
 // }
 // else
 // {
    $query="SELECT * FROM loginn WHERE username=:username AND passwordd =:passwordd";
    $statement=$connect->prepare($query);
    $statement->execute(
      array(
        'username'=>$_POST["username"],
        'passwordd'=>$_POST["passwordd"]
      )
    );
    $count=$statement->rowCount();
    if($count>0)
    {
        $_SESSION['username']=$_POST['username'];
       header("location:accueil.php");
       
  }
 // }

 
 } 
 catch(PDOException $error)
{
  $message=$error->getMessage();
 }
 ?>




























 <div class="box">
   <h2>Login</h2>
   <form  method="post" >
     <div class="inputBox">
       <input type="text" name="username" required>
       <label for="">Username</label>

     </div>
     <div class="inputBox">
      <input type="password" name="passwordd" required>
      <label for="">password</label>

    </div>
    <input type="submit" name="login" value="login">
   </form>

 </div>
  







  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
