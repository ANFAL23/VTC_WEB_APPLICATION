<?php
require_once('../Models/Annonce_Modele.php');


class Form_Annonce_Controller
 {
    
      public function champ_annonce(){
       $champ=[`id_annonce`, `titre_annonce`, `image_`, `description_`, `lien`, 
       'depart', `arrive`, `type_transport`, `poids`, `volume`, `moyenne`, `tarif`];
      return   $champ;
       }
 
    public function Add_Annonce()
    { 
      
        $modele = new Annonce_Modele ();
      
        $tmp_name=$_FILES['image']['tmp_name']; 
        echo $tmp_name;
        $name=$_FILES['image']['name'];
    
        echo $name;
     
        move_uploaded_file( $tmp_name, '../Views/images/'.$name);
        
        $result=$modele->Add_Annonce($_POST['titre'],$name,$_POST['description_'],
        $_POST['depart'],$_POST['arrive'],$_POST['type'],$_POST['poids'],$_POST['volume'],
        $_POST['moyenne'],$_GET['id']);
        return $result;
    }
    
  
  
   
 }
 $controller = new  Form_Annonce_Controller ();
 $result=$controller->Add_Annonce();
 $id=$_GET['id'];
header('location:../Views/profil.php?id='.$_GET['id']);
 
 ?>