<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Annonce_Controller.php');
include_once('head.php');
?>
<html>
<head>
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
                    $(document).ready(function(){
                      $("#TRANSPORTEUR").hide();
                      $(".btn-repondre").hide();
                 
                      <?php 
                             session_start();
                             if ($_SESSION['Transporteur']=='OUI'){
                              echo '$(".btn-repondre").show();';
                             }
                            
                      ?>
                        
});
    </script>
  
</head>



<br/><br/> <br/><br/> <br/><br/> <br/><br/>
   <section class="cadre" id="cadre">
  
   <h1 class="heading"> NEWS & <span>PUBLICITE</span> </h1>

    <div class="box-container">
    <?php
    
try{  
        $controller = new Annonce_Controller ();
        $result=$controller->News();
        if ($result->num_rows > 0)
       {
         
         while($row = $result->fetch_assoc())
          {          
            echo '<div class="box">
            
            <div class="image">
                <img src="images/'.$row["image_news"].'" alt="">
            </div>
            
            <div class="content">
                <a href="#" class="title">'.$row["titre_news"].'</a>
                
                <a class="btn" href="Details_New.php?titre='.$row["id_news"].'">Read More</a>
                <form method="POST" action="../Controllers/Annonce_Controller">
             
                </form>
            
            </div>
        
            </div>  '; 
           
         }
         
      }
        
}
catch (Exception $e){echo $e->getMessage();}
ECHO '</section>';
include_once('footer.php');
?>     
 
        

       
    

 


 


?>
