 <?php include 'header.php'?>
  

<style>

*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
 
 body
 {
     background: url(' img/abstract-682549_1920.jpg');
    /* background-size: cover */
 }
 .title
 {
   margin-top: 20px;
   font-weight: bold;
    
 }
 .title .bib
 {
   color: white;
 }
 table
 {
   margin-left: 140px;
 }
 

</style>
<div class="container">
 
 
</div>
<div class="container">
 <div class="title">
  <h1 class="display-4 text-center"><i class="fas fa-book-open text-primary">
  </i>   <span class="text-primary">GS- </span><span class="bib">Biblio</span> </h1>

 </div>
<table>
    <tr>
        <td>
        <a href="ajout.php">
  <div class="card p-3 mb-2 bg-white text-dark" style="width: 15rem; display: inline-block">
  <center>
  <i class="far fa-plus-square fa-10x text-success" style="padding-top: 20px"></i>
  </center>
    <div class="card-body">
      
    </div>
  </div>

</a>

        </td>
        <td>
        <a href="delete.php">
  <div class="card p-3 mb-2 bg-white text-dark" style="width: 15rem; display: inline-block">
  <center>
  <i class="fas fa-trash fa-10x text-primary"  style="padding-top: 20px"></i>
   
  </center>
    <div class="card-body">
      
    </div>
  </div>

</a>

        </td>
    </tr>
    <tr>
        <td>
        <a href="etudiant.php">
  <div class="card p-3 mb-2 bg-white text-primary" style="width: 15rem; display: inline-block">
  <center>
 
  <i class="fas fa-user-graduate fa-10x text-danger" style="padding-top: 20px"></i>
  
  </center>
    <div class="card-body text-primary">
      
    </div>
  </div>

</a>

        </td>
        <td>
        <a href="livre.php">
  <div class="card p-3 mb-2 bg-white text-dark" style="width: 15rem; display: inline-block">
  <center>
  <i class="fas fa-book fa-10x "  style="padding-top: 20px"></i>
   
  </center>
    <div class="card-body">
      
    </div>
  </div>

</a>

        </td>
    </tr>

</table>

</div>