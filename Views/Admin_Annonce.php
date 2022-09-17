<html>
<head>
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>
<?php

require_once('../Controllers/Controller.php');
include_once('../Controllers/Annonce_Controller.php');
include_once('Afficher_page_admin.php');
//include_once('head.php');
class Admin_Annonce extends Afficher_page_admin
{
    function Afficher_table($num)

    {echo '
      <section class="cadre">';
  
       if($num==1){echo '<h1 class="heading"> les annonces  <span>publies </span> </h1>';}
       if($num==2){echo '<h1 class="heading">  annonces  <span>non valider </span> </h1>';}
       if($num==3){echo '<h1 class="heading">  annonces  <span> Archiver </span> </h1>';}
       echo '</section>';
  echo'<section class="tableau">
        <div class="links">
      
      
      <table class="table table-striped table-bordered" id="sortTable">
      <thead>
      <tr>
           
             <th scope="col">id_Annonce</th>
             <th scope="col">titre_Annonce</th> 
             <th scope="col">Adresse_deraprt</th>
             <th scope="col">Adresse_Arrive</th>
             <th scope="col">Poids</th>
             <th scope="col">Volume</th>
            
             <th scope="col">Details</th> ';
             if($num==2){echo ' <th scope="col">Details</th> ';}
      echo '</tr>
      </thead>
      <tbody>';
      
      
      $controller = new Annonce_Controller ();
      if($num==1){$result=$controller-> Annonces();}
      if($num==2){$result=$controller-> Annonces_non_valider();}
      if($num==3){$result=$controller-> Annonces_archiver();}
          $tableau1 =  '';   
          while($row = $result->fetch_assoc())
          {          
            
            $tableau1 .=  '<tr>';
            $tableau1 .=  '<td>'.$row["id_annonce"].'</td>';
            $tableau1 .=  '<td>'.$row['titre_annonce'].'</td>';
            $tableau1 .=  '<td>'.$row['depart'].'</td>';
            $tableau1 .=  '<td>'.$row['arrive'].'</td>';
            $tableau1 .=  '<td>'.$row['poids'].'</td>';
            $tableau1 .=  '<td>'.$row['volume'].'</td>';
            //$tableau1 .=  '<td>'.$row['description_'].'</td>';
            if($num==2){ $tableau1 .= '<td><form method="POST" action="../Controllers/Annonce_Controller.php?action=valider&id='.$row["id_annonce"].'&wilaya1='.$row["depart"].'&wilaya2='.$row["arrive"].'">
            <button class="btn"  type="submit">valider</button> </form></td>';}
              $tableau1 .=  '<td><a class="btn" href="Details_Annonce.php?titre='.$row["id_annonce"].'">Details</a></td>';
            $tableau1 .=  '</tr>';
          
           
          }
            
           echo $tableau1;  
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</section>';
    }
   
}
echo '<section class="products" id="products">

<h1 class="heading"> Admin<span>Annonces</span> </h1>

<div class="box-container">
<div class="box">
<div class="image">
<img src="images/annonce (2)" alt="">
</div> 
     
       <div class="content">
           
       <a href="Admin_Annonce_Valide" class="btn">viualiser la liste des Annonces</a>
           
          
       </div>
   </div>
    <div class="box">
       
    <div class="image">
    <img src="images/annonce (2)" alt="">
</div>
        <div class="content">
           
        <a href="Admin_Annonce_non_valide" class="btn">Annonces non valide </a>
            
        </div>
    </div>
    <div class="box">
       
       <div class="image">
           <img src="images/annonce (2)" alt="">
       </div>
       <div class="content">
       <a href="Admin_Annonce_archiver" class="btn">Annonces Archivees</a>
           
           
       </div>
   </div>

    

   
</div>

</section>


';
      
     
     
