<footer>
<section class="footer">

    

    <div class="links">
    <?php
try{
        $controller = new Controller ();
        $result=$controller->get_Menu_controller();
        if ($result->num_rows > 0)
       {
         
         while($row = $result->fetch_assoc())
          {          
           
            echo ' <a class="aa" href="http://127.0.0.1/VTC/Views/'.$row["nom_item_menu"].'">'.$row["nom_item_menu"].'</a>';
            
         }
         
      }
        
}

catch (Exception $e){echo $e->getMessage();}
?>     
 
    
    </div>

  

</section>
<footer>

</body>