<?php
require_once('../Models/Modele.php');
 class Statistique_Modele extends Modele
 {
   
    //**************************les Statistique***********************************************/
    private function BDD($sql)
    {
      $conn = $this->dbConnect();
      $req=$conn->query($sql);
      if ($req == TRUE) {
          echo "s
          uccessfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        return $req;    
    }
      
    public function Get_Nombre_Annonce()
    {
        $sql = "SELECT COUNT(id_annonce) FROM annonce";
        $req=self::BDD($sql);  
        return $req; 
        
        
    }
    public function Get_Nombre_User()
    {
    
       
        $sql = "SELECT COUNT(id_utilisateur) FROM utilisateur";
        $req=self::BDD($sql);  
        return $req; 
    }
    public function Get_Nombre_Trans()
    {
    
       
        $sql = "SELECT COUNT(id_utilisateur) FROM utilisateur WHERE TRANSPORTEUR='OUI'";
        $req=self::BDD($sql);  
        return $req; 
    }
  }