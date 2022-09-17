<?php 
require_once('../Controllers/Annonce_Controller.php');

?>

<?php

require_once('../Controllers/Controller.php');
//require_once('../Controllers/Annonce_Controller.php');
include_once('head.php');
?>

<html>
<head>
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
<br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/>
   <section class="contact" id="contact">

   

    
    <section class="cadre" id="cadre">
  
  <h1 class="heading"> Publicitis <span>News</span> </h1>

   <div class="box-container-Details">
   <?php
   
try{  
       $id=$_GET['titre'];
       $controller = new Annonce_Controller ();
       $result=$controller->Search_Details_new($id);
       if ($result->num_rows > 0)
      {
        
        while($row = $result->fetch_assoc())
         {          
           echo '
           
           <div class="image">
               <img src="images/'.$row["image_news"].'" alt="">
           </div>
           
           <div class="content">
           <p> titre: '.$row["titre_news"].'</p>
           <p> discription: '.$row["text_news"].'</p>

               

            
              
             
           
           </div>'; 
          
        }
        
     }
     
       
}
catch (Exception $e){echo $e->getMessage();}
?>     

       

      
   
</section>
   
        
       

    </div>

</section>
</body>
<?php

include_once('footer.php');

?>
  
