<?php
require_once('../Controllers/Annonce_Controller.php');

?>

<!doctype html>
<html>
<head>
   <link : href="extern.css" rel="stylesheet" type="text/css" />
   
   
    
   
</head>

<body>   
<div class="diapo">
<div class="images">

<?php
    
    try{  
            $controller = new Annonce_Controller ();
            $result=$controller->News();
            if ($result->num_rows > 0)
           {
             
             while($row = $result->fetch_assoc())
              {          
                echo ' <a href="Details_New.php?titre='.$row["id_news"].'" title="admin utilisateur">
	
                <img class="image_diapo" src="images/'.$row["image_news"].'" alt=""></a>'; 
             }
             
          }
            
    }
    catch (Exception $e){echo $e->getMessage();}
?>

</div>
</div>


</body>
</html>