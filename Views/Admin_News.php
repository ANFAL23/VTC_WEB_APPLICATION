<?php

require_once('../Controllers/Controller.php');
require_once('../Controllers/Annonce_Controller.php');
include_once('../Controllers/Users/User_Admin_Controller.php');
include_once('Afficher_page_admin.php');
class Admin_news extends Afficher_page_admin
{
  function Afficher_table_news()
  {echo '<table class="table table-striped table-bordered" id="sortTable">
    <thead>
    <tr>
         <th scope="col">id_news</th>
          <th scope="col">titre_news</th>
           <th scope="col">text_news</th>
           <th scope="col">image_news</th>';
          
           
           echo '</tr>
    </thead>
    <tbody>';
    
    
        $controller = new Annonce_Controller ();
        $result=$controller-> News();
       
        $tableau1 =  '';   
        while($row = $result->fetch_assoc())
        {          
          
          $tableau1 .=  '<tr>';
          $tableau1 .=  '<td>'.$row['id_news'].'</td>';
          $tableau1 .=  '<td>'.$row["titre_news"].'</td>';
          $tableau1 .=  '<td>'.$row["text_news"].'</td>';
       
          $tableau1 .=  '<td>'.$row["image_news"].'</td>';
       
         
       
        
        }
          
         echo $tableau1;  
      echo '</tbody>';
  }
  
}

echo '
<section class="cadre" id="cadre">

<h1 class="heading"> <span>GESTION DES NEWS</span> </h1>
<br/>   ';
      $View = new Admin_news();
      $View-> Debut_2();
      
      $View-> Afficher_table_news();
      $View-> Fin_2();
    echo '<a class="btn" href="ajouter_new">ajouter_news</a>';