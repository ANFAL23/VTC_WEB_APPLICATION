<?php
require_once('../Models/Presentation_Modele.php');


class Presentation_Controller
 {
    
    public function GET_DATA()
    { 
       
        $modele = new Presentation_Modele ();
        $result=$modele->GET_DATA();
        return $result;
    }
    public function MODIFIER($video_present,$image_present,$text_present)
    { 
       
        $modele = new Presentation_Modele ($video_present,$image_present,$text_present);
        $result=$modele->MODIFIER($video_present,$image_present,$text_present);
        return $result;
    }
   
}
if(isset($_GET['action'])){
    
$controlleur=new Presentation_Controller();

$name=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];    
echo $name;
move_uploaded_file( $tmp_name, '../Views/images/'.$name);
        
$controlleur->MODIFIER($_POST['video_present'],$name,$_POST['text_present']);
}
 ?>