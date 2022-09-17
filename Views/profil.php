<?php 
require_once('../Controllers/User_Controller_n.php');
require_once('../Controllers/Annonce_Controller.php');
require_once('../Controllers/Controller.php');
include_once('head.php');
 class profil{

   public function list($num)
   {
       echo'<section class="cadre" id="cadre">
       <br/><br/>';
       if($num==1){echo'<h1 class="heading"> Votre Annonces <span>!</span> </h1>';}
       if($num==2){echo'<h1 class="heading"> Les demandes <span>!</span> </h1>';}
       echo ' </section>
     <section class="tableau">
     
         
     
         <div class="links">';
         
         
     
      
     try{
         $controller = new Annonce_Controller ();
         if($num==1){ $result=$controller-> Annonces_id($_SESSION['nom']);}
         if($num==2){ $result=$controller-> demandes_id($_SESSION['nom']);}
         if ($result->num_rows > 0)
        {
         $tableau1 = "<table id='table_Annonce' class='tableau' border>";
         $tableau1 .= '<caption> la liste des  annonces </caption>' ;
         $tableau1 .= '<tr>  <th scope="col">id</th>' ;
         $tableau1 .='<th scope="col">titre_Annonce</th> ';
         $tableau1 .='<th scope="col">Adresse_deraprt</th>';
         $tableau1 .='<th scope="col">Adresse_Arrive</th>';
         $tableau1 .='<th scope="col">Poids</th>';
         $tableau1 .='<th scope="col">Volume</th>';
       
         $tableau1 .='<th scope="col">option</th> ';
         $tableau1 .='<th scope="col">Details</th> ';
     
         $tableau1 .= '</tr>';
          while($row = $result->fetch_assoc())
           {          
             echo '<div class="box">';
             $tableau1 .=  '<tr>';
             $tableau1 .=  '<td>'.$row["id_annonce"].'</td>';
             $tableau1 .=  '<td>'.$row['titre_annonce'].'</td>';
             $tableau1 .=  '<td>'.$row['depart'].'</td>';
             $tableau1 .=  '<td>'.$row['arrive'].'</td>';
             $tableau1 .=  '<td>'.$row['poids'].'</td>';
             $tableau1 .=  '<td>'.$row['volume'].'</td>';
           
          
             if($num==1){$tableau1 .=  '<td><form method="POST" action="../Controllers/Annonce_Controller.php?action=supprimer&id='.$row["id_annonce"].'">
             <button class="btn"  type="submit">supp</button> </form></td>';}
             if($num==2){$tableau1 .=  '<td><form method="POST" action="../Controllers/Annonce_Controller.php?action=confirmer&id_annonce='.$row["id_annonce"].'">
              <button class="btn"  type="submit">Confirmer</button> </form></td>';}
             $tableau1 .=  '<td><a class="btn" href="Details_Annonce.php?titre='.$row["id_annonce"].'&id='.$_GET['id'].'">Read More</a></td>';
             
         $tableau1 .=  "</tr>"; 
        
            
          }
          $tableau1 .=  "</div></table>"; 
          echo $tableau1;  
       }
         
     }
     catch (Exception $e){echo $e->getMessage();}
     echo' </div> </section>';
   }

 }

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
<br/><br/> <br/><br/> <br/><br/> <br/><br/> 


   <section class="contact" id="contact">

   

    
    <section class="cadre" id="cadre">
  
  <h1 class="heading"> profil <span>!</span> </h1>

   <div class="box-container-Details">
   <?php
   
try{  
       $id=$_GET['id'];
       $controller = new User_Controller_n ();
       $result=$controller->profil($id);
       if ($result->num_rows > 0)
      {
        
        while($row = $result->fetch_assoc())
         {          
           echo '
           
          
           <img class="profil" src="images/delivry" alt="">   
           <div class="content">
           <p> nom: '.$row["Nom"].'  '.$row["Prenom"].'</p>
           <p> numero : '.$row["Num"].'</p>
           <p> Email : '.$row["Email"].'</p>
           <p> adresse : '.$row["Adresse"].'</p>  
           <a class="btn" href="profil.php?id='.$row['id_utilisateur'].'">modification</a>  
           <label>jjj</label>  
           <a class="btn" href="Ajouter_Annonce.php?id='.$_SESSION['nom'].'">Ajouter_Annonce</a> 
           </div>';
         
          
        }
        
     }
     
       
}
catch (Exception $e){echo $e->getMessage();}
?>     

       

      
   
</section>
   
        
       

    </div>

</section>
<hr>
<?php
$view=new profil();
$view->list(1);
if(isset($_SESSION['Transporteur']))
{  
if($_SESSION['Transporteur']=='OUI'){$view->list(2);}
}

?>
</body>
<?php

include_once('footer.php');

?>
  
