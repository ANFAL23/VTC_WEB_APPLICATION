<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Presentation_Controller.php');
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
<section class="cadre" id="cadre">

    <h1 class="heading">  <span>PRESENTATION DE L'APPLICATION VTC</span> </h1>

  
    <?php
try{
        $controller = new Presentation_Controller ();
        $result=$controller->GET_DATA();
        if ($result->num_rows > 0)
       {
         echo $result->num_rows;
         while($row = $result->fetch_assoc())
          {          
            

          echo '
           <div class="box-container_large">
           <div class="box">
           <div class="image">
 
           <img src="images/'.$row["image_present"].'" alt="">';
          
       echo '</div>
       <div class="content">
       <p>Transport de matériels et colis</p>
               <p class="title">'.$row["text_present"].'</p>
               <span><p class="title">'.$row["video_present"].'</p></span>';
           
           echo '</div>';
           


            
           
           
         }
         
         
      }
        
}
catch (Exception $e){echo $e->getMessage();}
?>     
 
        

       
    
</section>




</body>
<?php

include_once('footer.php');
?>
   