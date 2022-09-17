<?php

require_once('../Controllers/Controller.php');
include_once('../Controllers/Users/User_Admin_Controller.php');
include_once('Afficher_page_admin.php');
class Admin_signalement extends Afficher_page_admin
{
  function Afficher_table_signalement()
  {echo '<table class="table table-striped table-bordered" id="sortTable">
    <thead>
    <tr>
         <th scope="col">id_utilisateur</th>
          <th scope="col">Nom_prenom</th>
           <th scope="col">id_util_cause</th>
           <th scope="col">Nom_prenom</th>
           <th scope="col">TYPE</th>
           <th scope="col">id_nnonce</th>
           <th scope="col">TEXT_SIGNALEMENT</th>';
           echo '</tr>
    </thead>
    <tbody>';
    
    
        $controller = new User_Admin_Controller ();
        $result=$controller-> Signalement();
       
        $tableau1 =  '';   
        while($row = $result->fetch_assoc())
        {          
          
          $tableau1 .=  '<tr>';
          $tableau1 .=  '<td><a  href="profil.php?id='.$row['id_utilisateur'].'">'.$row['id_utilisateur'].'</a></td>';
          $tableau1 .=  '<td>'.$row["nom_prenom"].'</td>';
          $tableau1 .=  '<td><a  href="profil.php?id='.$row['id_utilis'].'">'.$row['id_utilis'].'</a></td>';
          $tableau1 .=  '<td>'.$row["nom_prenom2"].'</td>';
          $tableau1 .=  '<td>TRANSPORTEUR</td>';
          $tableau1 .=  '<td><a  href="Details_Annonce.php?titre='.$row['id_annonce'].'">'.$row['id_annonce'].'</a></td>';
          $tableau1 .=  '<td>'.$row['text_'].'</td>';
         
       
        
        }
          
         echo $tableau1;  
      echo '</tbody>';
  }
  
}

echo '
<section class="cadre" id="cadre">

<h1 class="heading"> <span>GESTION DES SIGNALAMNET</span> </h1>
<br/>   ';
      $View = new Admin_signalement();
      $View-> Debut_2();
      
      $View-> Afficher_table_signalement();
      $View-> Fin_2();
