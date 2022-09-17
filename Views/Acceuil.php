<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Annonce_Controller.php');
require_once('../Controllers/searsh_annonce_ctrl.php');
include_once('head.php');

class Acceuil 
 {
     
    public $resultat='Normal';   
    public function Diaporama()
    {
      
      echo '<section class="home" id="home">

        <div class="content">
          
        <h3>VTC Véhicule de Transport avec Chauffeur </h3>
         <p>transports de marchandises et colis.</p>
         
      </div>
  
   </section>';

    }
    public function Recherche()
    {
     // echo "<form method='GET' action='header('location:../Views/Acceuil.php?depart=".$_GET['depart']."&arriver=".$_GET['arrive'].");'>";
    
     
     echo '
       <section class="contact">

   

       <div class="row">
     
      
           
       <form method="GET" action="Acceuil.php">
               <h3>Recherche une Annonce</h3>
               <div class="inputBox">
                   <span class="fas fa-user"></span>
                   <input type="text" placeholder="wilaya depart" name="depart" i required />
                 <input type="text"  placeholder="wilaya Arriver" name="arrive"  required />
                 </div>   <button class="btn" id="add_User" type="submit">Recherche</button>
              
           </form>
   
       </div>
   
   </section>
    ';
    }
    public function comment()
    {
     
     echo '
     *************************
     ***********************
     *************************************************************************************
     ***************************************************

     <a class="btn" href="presentation.php">Comment cela fonction</a>';
     
    
    }

     public function Annonces(){
       echo ' <section class="cadre">
  
       <h1 class="heading"> Notre <span>annonces</span> </h1>
    
        <div class="box-container">';
        
        
    try{  
      $controller = new Annonce_Controller (); 
         if(isset($_GET['depart'])){
            $result=$controller->Search_Annonce($_GET['depart'],$_GET['arrive']);
          }
          else{
            $result=$controller->Annonces_limit();
          }
            if ($result->num_rows > 0)
           {
             
             while($row = $result->fetch_assoc())
              {          
                echo '<div class="box">
                
                <div class="image">
                    <img src="images/'.$row["image_"].'" alt="">
                </div>
                
                <div class="content">
                    <a href="#" class="title">'.$row["titre_annonce"].'</a>
                    
                    <p>'.$row["description_"].'</p>
                    
                    <a class="btn" href="Details_Annonce.php?titre='.$row["id_annonce"].'">Read More</a>';
                   if(isset($_SESSION['Transporteur'])){
                    if($_SESSION['Transporteur']=='OUI'){
                    echo ' <form method="POST" action="../Controllers/Annonce_Controller">
                    <button class="btn-repondre" type="submit">Repondre</button> 
                    </form>';}}
                
               echo ' </div>
            
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
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
  
</head>
<body>
  <?php 
 
 $Acceuil=new Acceuil();
     echo'<section class="contact" id="contact">';
     include_once('diaporama.php');
     echo'</section>';
     echo '<br/>';
     
     $Acceuil->Recherche();
     $Acceuil->Annonces();
     $Acceuil->comment();
  ?>
  
</body>
</html>
<?php

include_once('footer.php');

?>
