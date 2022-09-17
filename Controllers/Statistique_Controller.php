<?php
require_once('../Models/Statistique_Modele.php');


class Statistique_Controller
 {
    
    public function Get_Nombre_User()
    { 
       
        $modele = new Statistique_Modele ();
        $result=$modele->Get_Nombre_User();
        return $result;
    }
    public function Get_Nombre_Annonce()
    { 
       
        $modele = new Statistique_Modele ();
        $result=$modele->Get_Nombre_Annonce();
        return $result;
    }
    public function Get_Nombre_Trans()
    { 
       
        $modele = new Statistique_Modele ();
        $result=$modele->Get_Nombre_Trans();
        return $result;
    }
   
}
 ?>