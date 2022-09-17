<?php
require_once('../Models/Wilayas_Moldele.php');


class Wilayas_Controller
 {
    
    
    
 
    public function get_Wilayas()
    { 
      
        $modele = new Wilayas_Modele ();
        $result=$modele->get_Wilayas();
        return $result;
    }
   

  
      
 }
 
 ?>