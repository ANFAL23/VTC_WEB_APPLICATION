<?php
require_once('../Models/User_Modele.php');



class User_Admin_Controller
 {
    
  
    public function Users($num)
    { 
       
        $modele = new User_Modele ();
        if($num==2){$result=$modele->TRANSPORTEURS();}
        if($num==1){$result=$modele->Users();}
        return $result;
    }
    public function Signalement()
    { 
       
        $modele = new User_Modele ();
        $result=$modele->Signalement();
        
        return $result;
    }
  
      
 }
 
 ?>