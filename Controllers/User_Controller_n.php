<?php
require_once('../Models/User_Modele.php');



class User_Controller_n
 {
    
   
 
  
      
    public function Users()
    { 
       
        $modele = new User_Modele ();
        $result=$modele->Users();
        return $result;
       
    }
    public function profil($id_utilisateur)
    { 
       
        $modele = new User_Modele ($id_utilisateur);
        $result=$modele->profil($id_utilisateur);
        return $result;
    }
    public function banir_user($id_utilisateur)
    { 
       
        $modele = new User_Modele ();
        $result=$modele->banir_user($id_utilisateur);
        return $result;
    }
 }
    if(isset($_GET['action'])){
        $controller = new User_Controller_n (); 
        if($_GET['action']=='banir'){
            $result=$controller->banir_user($_GET['id']);
            header('location:../Views/Admin_Client');
          }
        }     
 
 
 ?>