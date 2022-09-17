<?php

require_once('../Controllers/Controller.php');
?>
 

<!doctype html>
<html>
<head>
   <link : href="extern.css" rel="stylesheet" type="text/css" />
   <title>
       VTC.com
    </title>
	
</head>

<body>
    <header class="noo-header">	  
     <div class="main-nav-wrap container">   
        <div class="navbar-header">
            <img  id="first"  src="LOGO2.PNG" alt="logo n'est pas telecharges"  />     
        </div>
     </div>
              
       
    </header>
    <main>
<div id="menu">
<?php
try{
        $controller = new Controller ();
        $result=$controller->get_Menu_controller();
        if ($result->num_rows > 0)
       {
         echo '<div class="contenu"> ';
         while($row = $result->fetch_assoc())
          {          
           
            echo '<li>
         
                   <a class="aa" href="http://127.0.0.1/VTC/Views/'.$row["nom_item_menu"].'">'.$row["nom_item_menu"].'</a>
                  </li>';
                       
         }
         echo '</div> ' ;  
      }
        
}

catch (Exception $e){echo $e->getMessage();}
?>     
 </div>

    


 </main>
 </body>
 <footer>
</footer>

</html>