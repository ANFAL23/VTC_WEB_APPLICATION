
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

   

    <div class="row">
  
        
       
     
     <form method="POST" enctype="multipart/form-data" action="../Controllers/Annonce_Controller.php?action=ajouer_new">
      
            <h3>Ajouter une News</h3>
            <div class="inputBox">
               
               
                <input type="text" placeholder="titre de l'annonce" name="titre_news" id="titre" required />
                <input type="file"  name="image_news"  />
                
                 
            </div>
            <div class="inputBox">
               
                <input type="text" placeholder="text de news" name="text_news"  required /> 
              
            </div>
           
            
          
            
           
          
          
           
            
  
            
            <br/>
            <button class="btn" id="add_User" type="submit">Ajouter_new</button> <br/><br/>
            
              
        </form>

    </div>

</section>
</body>
<?php

include_once('footer.php');

?>
  
