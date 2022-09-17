<?php
require_once('../Models/Contact_Modele.php');


class Contact_Controller
 {
    
    
    public function Contacts()  
    { 
       
        $modele = new Contact_Modele ();
        $result=$modele->Contacts();
        return $result;

    }
    
}
 ?>