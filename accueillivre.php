 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="accueillivre.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
     <title>Document</title>
 </head>
 <body>
    <header>
        <i class="fas fa-book-open text-primary">
         </i>  <span> Gs_biblio</span>
           <p><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>logout</a></p>
       </header>
       <div class="container">
           <div class="content">
            <div class="titre">
                <p>

                " Le seul conseil en effet qu'une  per<span class="pink">sonne</span> puisse donner à une autre à pr<span class="pink">opos</span> <br>
                de la lecture, c'est de ne deman<span class="pink">der aucun</span> conseil, de suivre son propre<span class="pink"> instinct,</span> d'user <br>
                 de sa propre raison, d'en a<span class="pink">rriver à ses</span> propres conclusi<span class="pink">ons.</span> " <br>

                "Virginia Wo<span class="pink">olf".</span>

                </p>
             </div>
             <div class="ajout">
                <a href="ajout.php">
                    <div class="card">
                        <i class="far fa-plus-square fa-10x text-success"></i><br>

                    </div>
                </a>
                 <a href="allbook.php">
                    <div class="card">

                        <i class="far fa-address-book fa-10x text-success"></i><br>

                    </div>
                 </a>
                 <a href="search.php" style="padding-top: 20px;">
                    <div class="card">

                        <i class="fas fa-search fa-10x text-success"></i><br>

                    </div>
                 </a>

             </div>
           </div>


       </div>
       <section class="sec-1">
           <div class="contain-sec">
           <div class="cards">
               <div class="card-1">
                   <img src="img/roman.jpg"  width="300px" height="200px">
                   <div>
                    <a  href="livre.php?categorie='roman'" class="book-cat">roman</a>
                   </div>
               </div>
               <div class="card-1">
                <img src="img/poesie.jpg"  width="300px" height="200px">
                <div>
                 <a  href="livre.php?categorie='poesie'" class="book-cat">poesie</a>
                </div>
            </div>

            <div class="card-1">
                <img src="img/histoire.jpg"  width="300px" height="200px">
                <div>
                 <a  href="livre.php?categorie='histoire'" class="book-cat">histoire</a>
                </div>
            </div>


            </div>
            <div class="cards">
                <div class="card-1">
                    <img src="img/contes.jpg"  width="300px" height="200px">
                    <div>
                     <a  href="livre.php?categorie='contes'" class="book-cat">contes</a>
                    </div>
                </div>
                <div class="card-1">
                 <img src="img/artificial-intelligence-4389372_1920.jpg"  width="300px" height="200px">
                 <div>
                  <a  href="livre.php?categorie='science'" class="book-cat">science</a>
                 </div>
             </div>


             <div class="card-1">
                <img src="img/geographie.jpg"  width="300px" height="200px">
                <div>
                 <a  href="livre.php?categorie='géographie'" class="book-cat">géographie</a>
                </div>
            </div>

             </div>
             <div class="cards">






             </div>
        </div>
       </section>

 </body>
 </html>
