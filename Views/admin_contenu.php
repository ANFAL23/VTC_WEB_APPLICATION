<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Presentation_Controller.php');
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

  
    
  

        <?php
try{
        $controller = new Presentation_Controller ();
        $result=$controller->GET_DATA();
        if ($result->num_rows > 0)
       {
         
         while($row = $result->fetch_assoc())
          {          
         echo '  <section class="contact" id="contact">

   

         <div class="row">
       
             
            
          
          <form method="POST" enctype="multipart/form-data" action="../Controllers/Presentation_Controller.php?action=modifier">
           
                 <h3>Modifier la page presentation</h3>
                 <div class="inputBox">
                    
                 <p>Encien_video: '.$row["video_present"].'</p>
                     <input type="text" placeholder="video de presentation" name="video_present"  required />
                    
                     
                      
                 </div>
                 <div class="inputBox">
                    
                
                      
                 </div>
                 <div class="inputBox">
                    
                 
                 <img src="images/'.$row["image_present"].'" alt="">
                   
                     <input type="file"  name="image"  />
                     
                      
                 </div>
                 <div class="inputBox">

                    <p>Encien_text: '.$row["text_present"].'</p>
                     <input type="text" placeholder="text de presentation" name="text_present"    required /> 
                   
                 </div>
                
            
                 
                 <br/>
                 <button class="btn" type="submit">Modifier_Presentation</button> <br/><br/>
                 
                   
             </form>';
       // $row["video_present"]   
         }
         
      }
        
}
catch (Exception $e){echo $e->getMessage();}
?>     
 
        

       
    
</section>




</body>
