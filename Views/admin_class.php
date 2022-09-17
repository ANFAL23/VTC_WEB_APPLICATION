<?php
include_once('Afficher_page_admin.php');

class Admin_User extends Afficher_page_admin
{
  function Afficher_table_2($num)
  {echo '<table class="table table-striped table-bordered" id="sortTable">
    <thead>
    <tr>
         <th scope="col">id_Client</th>
          <th scope="col">Nom</th>
           <th scope="col">Prenom</th>
           <th scope="col">Email</th>
          
           <th scope="col">Numero</th>
           <th scope="col">Visiter</th>';
            if($num==2){echo ' <th scope="col">Confirmer</th>';}
           echo '</tr>
    </thead>
    <tbody>';
    
    
        $controller = new User_Admin_Controller ();
        if($num==1){$result=$controller-> Users(1);}
        if($num==2){$result=$controller-> Users(2);}
        $tableau1 =  '';   
        while($row = $result->fetch_assoc())
        {          
          
          $tableau1 .=  '<tr>';
          $tableau1 .=  '<td>'.$row["id_utilisateur"].'</td>';
          $tableau1 .=  '<td>'.$row['Nom'].'</td>';
          $tableau1 .=  '<td>'.$row['Prenom'].'</td>';
          $tableau1 .=  '<td>'.$row['Email'].'</td>';
         
          $tableau1 .=  '<td>'.$row['Num'].'</td> ';
         $tableau1 .= '<td><a class="btn" href="profil.php?id='.$row['id_utilisateur'].'">profil</a></td> ';
         $tableau1 .= '<td><form method="POST" action="../Controllers/User_Controller_n.php?action=banir&id='.$row["id_utilisateur"].'">
         <button class="btn"  type="submit">BANIR</button> </form></td>';
         
         
        
        }
          
         echo $tableau1;  
      echo '</tbody>';
  }
  
}


?>