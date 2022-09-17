<?php
require_once('../Controllers/Wilayas_Controller.php');
?>
<!doctype html>

<html>
<head>
   <!--<link : href="extern.css" rel="stylesheet" type="text/css" />-->
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script> 
             
    </script>
    
</head>

<body>

<form method="POST" action="../Controllers/Wilayas_Controller">
	<div id='form1' class="form">
    <span onclick="document.getElementById('form1').style.display='none'">&times;</span>
     
    <div class="content">                  
          <input type="hidden" name="ID" id="champ0"/>
          <input id="num_table" type="hidden" name="table" />
          <br/>  <h1>Transporteur<br> </h1><br/><br/>
          
         
<?php
try{
        $controller = new Wilayas_Controller ();
        $result=$controller->get_Wilayas();
        echo '          '; 
        if ($result->num_rows > 0)
       {
         echo '<br/><br/><div class="contenu"> ';
         echo '<select name="liste_wilaya[]" multiple>';
         echo '<option>choose</option>';
    
         
         while($row = $result->fetch_assoc())
          {          
           
            echo'
            
            <option value="'.$row["nom"].'"> '.$row["id"].'_'.$row["nom"].'</option>';
                       
         }
         echo '</select>';
         echo '</div> ' ;  
      }
        
}
catch (Exception $e){echo $e->getMessage();}
?>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br>     nom : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
           <input type="text" name="Nom_User" id="Nom_User" />
        
           <br/><br/><br/>
          
         prenom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
           <input type="text"  name="Prenom_User" id="Prenom_User" />
           
          <br/><br/><br/>
      
          <input type="checkbox" name="trans" id="trans" value="trans"> transporteur
          <br/>
          <button class="button-left" id="add_User" type="submit">Inscrir</button> <br/><br/>

    </div> 

   </div>
   </form> 
   </body>
</html>