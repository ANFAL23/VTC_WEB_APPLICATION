
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
  
     
            <h3>text Signaler un transporteur</h3>
            <div class="inputBox">
               
               
               
              <?php
                echo '<p>'.$_GET['text'].'</p>';
                ?>
                 
            </div>
           
            
           
           
            
  
            
            <br/>
            <a class="btn" href="admin_Signalament" type="submit">Fermer</button> <br/><br/>
            
              
        

    </div>

</section>
</body>
  
