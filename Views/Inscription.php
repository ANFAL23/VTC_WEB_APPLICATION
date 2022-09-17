<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Annonce_Controller.php');
require_once('../Controllers/Wilayas_Controller.php');
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
                        $('#trans').click(function(){
                        if($(this).prop("checked") == true){
                         $('form').get(0).setAttribute('action','../Controllers/User_Controller/Add_Trans');
                          $("#add_User").html('Remplir les infos de tronsport');
                          $("#TRANSPORTEUR").show(); 
                          
                        }
                        if($(this).prop("checked") == false){
                         $('form').get(0).setAttribute('action','../Controllers/User_Controller');
                          $("#add_User").html('Inscription'); 
                          $("#TRANSPORTEUR").hide(); 
                          
                        }
                     
  });
});
    </script>
</head>

<body>
<br/><br/> <br/><br/> <br/>

<section class="contact" id="contact">

    <h1 class="heading"> <span>Inscriver</span> vous! </h1>

    <div class="row">

        
        <form method="POST" action="../Controllers/User_Controller/Add_User">
            <h3>Remplir Vous Information</h3>
            <div class="inputBox">
            
                <input type="text" placeholder="name" name="Nom_User" id="Nom_User" required />
                <input type="text"  placeholder="prenom" name="Prenom_User" id="Prenom_User" required/>
               
            </div>
          
            <div class="inputBox">
                <
                <input type="text"   placeholder="Votre Email" name="Email_User" id="Email_User" required/>
                <input type="text" placeholder="Votre Num" name="Num_User" id="Num_User" required/>
              </div>
            
            <div class="inputBox">
                
                <input type="text" placeholder="Votre Adresse" name="adresse_User" id="adresse_User" required/>   
                <input type="password" placeholder="Mot de passe" name="password_User" id="password_User" required/>  
              </div>
            
           
             
              <div class="inputBox_min">
              <p>VOULEZ VOUS ETRE TRANSPORTEUR! : </p>
            <input type="checkbox" name="trans" id="trans" value="trans" class='btn'>
            </div>
            <br/>
            <?php
                 echo '<div id="TRANSPORTEUR">';
                 echo '<div class="inputBox">';
                
                    include_once('Inscription_transporteur.php');
                 
                    include_once('Inscription_transporteur2.php');
                    
                   echo '</div>';
                    echo '<div class="inputBox">';
                    echo '<p>Vous Voulez ETRE Certifie ? </p>';
                    echo '
                         <a href="Inscription.php" class="btn">envoie une demande</a>
                      ';
            
                echo '</div>';
                echo '</div>';
            ?>
            <button class="btn" id="add_User" type="submit">Inscrir</button> <br/><br/>
            <?php

              
            ?>
              
        </form>

    </div>

</section>
<?php

include_once('footer.php');
?>
   </body>
</html>