<?php
require_once('../Models/Modele.php');
 class Contact_Modele extends Modele
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
    
    
    public function Contacts()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  Contact ";
        $req=self::BDD($sql);   
        return $req; 
        
    }
   
    
  
 }
?>