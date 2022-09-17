<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Contact_Controller.php');
include_once('head.php');
 class Contact{

   public function Afficher(){
       echo ' <section class="cadre" id="cadre">
  
       <h1 class="heading"> CONTACT <span>US</span> </h1>
    
        <div class="box-container">';
        
        
    try{  
      $controller = new Contact_Controller (); 
         
            $result=$controller->Contacts();
         
            if ($result->num_rows > 0)
           {
             
             while($row = $result->fetch_assoc())
              {          
                echo '<div class="box">
                
                <div class="image">
                    <img src="images/annonce (2)" alt="">
                </div>
                
                <div class="content">
                   
                    
                    <p>Nom : '.$row["nom_admin"].'</p>
                    <p>Prenom : '.$row["prenom_Admin"].'</p>
                    <p>Num : '.$row["num_admin"].'</p>
                    <p></p>
                    
                    <a class="btn" href="mailto:'.$row["email_admin"].'"> Envoyer Email</a>  
                    
                
                </div>
            
                </div>  '; 
               
             }
             
          }
            
    }
    catch (Exception $e){echo $e->getMessage();}
    echo '</section>';
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
     $Stat=new Contact();
     $Stat->Afficher();
?>
</body>
<?php

include_once('footer.php');
?>
   