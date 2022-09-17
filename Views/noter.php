
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
  
        
        <?php
     
       echo '<form method="POST" action="../Controllers/Annonce_Controller.php?
       action=noter&id_annonce='.$_GET['id_annonce'].'&id='.$_GET["id_trans"].'&nom='.$_GET['nom'].'">';
        ?>
            <h3>Noterr un transport</h3>
            <div class="inputBox">
               
               
                <input type="number" placeholder="donner une note sur /10 . . ." name="text" required />
              
                
                 
            </div>
           
            
           
           
            
  
            
            <br/>
            <button class="btn" id="add_User" type="submit">Envoyer</button> <br/><br/>
            
              
        </form>

    </div>

</section>
</body>
<?php

include_once('footer.php');

?>
  
