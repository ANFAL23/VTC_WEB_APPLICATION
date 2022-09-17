<?php
require_once('../Models/Modele.php');
 class Presentation_Modele extends Modele
 {
   
  private function BDD($sql)
  {
    $conn = $this->dbConnect();
    $req=$conn->query($sql);
    if ($req == TRUE) {
      
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      return $req;    
  }
    
    
    public function GET_DATA()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  presentation ";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function MODIFIER($video_present,$image_present,$text_present)  //cote admin pour le tableau 
    {
  
        $sql = "UPDATE  presentation SET video_present='$video_present',image_present='$image_present',text_present='$text_present' ";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    

    
   
    
  
 }
?>