<link rel="stylesheet" href="login.css">
<script src="livre.js"></script>
<?php include 'header.php';?>
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
 
 <div class="box">
   <h2>Login</h2>
   <form  method="post" >
     <div class="inputBox">
       <input type="text" name="username" required>
       <label for="">Username</label>

     </div>
     <div  id="eoor">
     </div>
     <div class="inputBox">
      <input type="password" name="passwordd" required>
      <label for="">password</label>

    </div>
    <input type="submit" name="login" value="login">
   </form>

 </div>
  
 <?php

 session_start();
 $host="localhost";
 $username="root";
 $password="";
 $database="gs_school";
 $message="";
 if($_POST)
 { try {
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
      header("location:accueilact.php");
      
 }
 else
 {?>
  <script>
  var id=document.getElementById('eoor');
  var doc= document.createElement('div');
  doc.className='alert-danger';
  doc.style='background-color: red; color: white';
  var test = document.createTextNode('please entrer right values          ');
  doc.appendChild(test);
  var ico= document.createElement('i');
  
  ico.className='far fa-times-circle';
  doc.appendChild(ico);
  
  id.appendChild(doc);
  setTimeout(()=>id.remove(),3000)
  // id.innerHTML="<div class='alert alert-danger'>please entrer right values</div>";
  //<i class="far fa-times-circle"></i>


</script>
<?php
 }
// }


} 
catch(PDOException $error)
{
 $message=$error->getMessage();
}}

 ?>


































  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
