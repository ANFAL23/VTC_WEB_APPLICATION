<html>
<head>
<link rel="stylesheet" href="css/style_INS.css"> 
   
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>
<?php
require_once('../Controllers/Wilayas_Controller.php');
try{
        $controller = new Wilayas_Controller ();
        $result=$controller->get_Wilayas();
        
      
        if ($result->num_rows > 0)
       {
        
         echo '<select  name="liste_wilaya2[]" multiple>';
         echo '<option>choisir les wilayas</option>';
    
         
         while($row = $result->fetch_assoc())
          {          
          
            echo'<checkbox value="'.$row["nom"].'" > <option value="'.$row["nom"].'"> '.$row["id"].'_'.$row["nom"].'</option>';
           
                                 
         }
         echo '</select>';
      
         
      }
        
}
catch (Exception $e){echo $e->getMessage();}
?>