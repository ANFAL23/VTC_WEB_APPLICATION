
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
     
       echo '<form method="POST" enctype="multipart/form-data" action="../Controllers/Form_Annonce_Controller.php?id='.$_GET['id'].'">';
        ?>
            <h3>Ajouter une Annonce</h3>
            <div class="inputBox">
               
               
                <input type="text" placeholder="titre de l'annonce" name="titre" id="titre" required />
                <input type="file"  name="image"  />
                
                 
            </div>
            <div class="inputBox">
               
                <input type="text" placeholder="adresse de depart" name="depart"  required /> 
                <input type="text" placeholder="adresse d'arrive" name="arrive"  required /> 
            </div>
           
            <div class="inputBox">
               
               
               
              
               <select name="type" required>
                   <option value="">choisir le type de transport</option>
                   <option value="Colis">Colis</option>
                   <option value="lettre">lettre</option>
                   <option value="electromenager">électromenager</option>
                   <option value="demenagement">demenagement</option>
                   <option value="lettre">lettre</option>
               </select>
              
               <select name="moyenne" required>
                    <option value="">choisir le moyenne de transport</option>
                    <option value="voiture">voiture</option>
                    <option value="Camion">Camion</option>
                    <option value="moto">moto</option>
                </select>
                
           </div>
          
            
           
          
            <div class="inputBox">
               
         
          
                <select name="poids" required>
                <option value="">choisir le fourchette de poids</option>
                 <option value="1"> entre 0 et  100</option>
                 <option value="2">entre 120 et  500</option>
                 <option value="3">plus que 500</option>
             </select> 
         
                <select name="volume" required>
                <option value="">choisir le fourchette de volume</option>
                    <option value="1"> entre 0 et  100</option>
                    <option value="2">entre 120 et  500</option>
                    <option value="3">plus que 500</option>
                </select>
              </div>
             
              <div class="inputBox">
                
                <input type="text" placeholder="commentaire ..." name="description_"  required/>
            
                
                
</br>   
               
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
  
