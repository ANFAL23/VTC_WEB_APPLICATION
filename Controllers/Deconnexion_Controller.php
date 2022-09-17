<?php  
require_once('../Models/User_Modele.php');

class Deconnexion_Controller
 {
    
      
  
	public function Deconnexion()
    {
        session_start();
        //session_unset(); //Detruit toutes les variables de la session en cours
        session_destroy();
        header('location:../Views/Acceuil.php');
    }
}
   
 $controller = new Deconnexion_Controller ();
  $controller->Deconnexion();
?>









 