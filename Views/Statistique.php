<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Statistique_Controller.php');
include_once('head.php');
 class Statistique{
     public function Afficher($users,$annonce,$Trans){
         echo '<section class="products" id="products">

         <h1 class="heading"> STATI<span>STIQUE</span> </h1>
         
         <div class="box-container">
         <div class="box">
         <div class="image">
         <img src="images/admin_User.png" alt="">
     </div> 
                 
                <div class="content">
                    <h3>'.$users.'</h3>
                    
                    <div class="price">inscrit dans Notre site </div>
                </div>
            </div>
             <div class="box">
                
             <div class="image">
             <img src="images/annonce (2)" alt="">
         </div>
                 <div class="content">
                     <h3>'.$annonce.'</h3>
                     
                     <div class="price">annonces sont publie dans notre site</div>
                 </div>
             </div>
             <div class="box">
                
                <div class="image">
                    <img src="images/1" alt="">
                </div>
                <div class="content">
                    <h3>'.$Trans.'</h3>
                    
                    <div class="price">Transporteur</div>
                </div>
            </div>
         
             
         
            
         </div>
         
         </section>
         
         
         ';
     }
 }
?>

<html>
<head>
 
   <!--<link rel="stylesheet" href="css/style_INS.css">-->
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
<br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/>
<?php
     $Stat=new Statistique();
     $controller= new Statistique_Controller;
     $result=$controller-> Get_Nombre_Annonce();
     while($row = $result->fetch_assoc())
     {
         $num_annonce= $row["COUNT(id_annonce)"];
         
     }
     $result=$controller-> Get_Nombre_User();
     while($row = $result->fetch_assoc())
     {
         $num_user= $row["COUNT(id_utilisateur)"];
         
     }
     $result=$controller-> Get_Nombre_Trans();
     while($row = $result->fetch_assoc())
     {
         $num_trans= $row["COUNT(id_utilisateur)"];
         
     }
     $Stat->Afficher( $num_user,$num_annonce,$num_trans);
?>
</body>
<?php

include_once('footer.php');
?>
   