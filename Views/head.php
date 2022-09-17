<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Application VTC de Transport de matériels et colis</title>
   <link rel="stylesheet" href="css/style_INS.css">

</head>
<body>
    


<header class="header">

    <a   class="logo">
        <img src="delivry" alt="">
    </a>

    <nav class="navbar">
    <?php
try{
        $controller = new Controller ();
        $result=$controller->get_Menu_controller();
        if ($result->num_rows > 0)
       {
         
         while($row = $result->fetch_assoc())
          {          
           
            echo ' <a class="aa" href="'.$row["nom_item_menu"].'">'.$row["nom_item_menu"].'</a>';
            
         }
         
      }
        
}

catch (Exception $e){echo $e->getMessage();}
?>     
 
    </nav>
     
    <div class="icons">
       
        <?php  
        session_start();
        if(isset($_SESSION['nom'])){
            echo '  <form method="POST" action="../Controllers/Deconnexion_Controller">
            <a class="btn" href="profil.php?id='.$_SESSION['nom'].'">Consulter_Profil</a>   
        
      
        
        <button class="btn"  type="submit">Deconnexion</button> </form><br/><br/>';
        }
          
           else {
               echo ' <a href="Inscription" class="btn">Inscription</a>
               <a href="connexion"  class="btn">Connexion</a>';
           }
        ?>
       
        
      
    </div>
  
   

</header>






