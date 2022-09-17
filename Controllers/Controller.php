<?php
require_once('../Models/Modele.php');
class Controller
 {
    
   
   
 
    public function get_Menu_controller()
    {

        $modele = new Modele ();
        $result=$modele->get_Menu();
        return $result;
    }

  
 }
?>