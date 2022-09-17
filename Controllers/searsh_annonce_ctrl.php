<?php
require_once('../Models/Annonce_Modele.php');


class searsh_annonce_ctrl
 {
    
     
    public function Search_Annonce()
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Search_Annonce($_GET['depart'],$_GET['arrive']);
        return $result;
    }
       
 }
 
 
 ?>