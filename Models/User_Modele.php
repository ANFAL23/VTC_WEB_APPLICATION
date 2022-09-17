<?php
require_once('../Models/Modele.php');
 class User_Modele extends Modele
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

 
    public function Add_User($nom,$prenom,$email,$adresse,$Num,$Mot_de_passe,$TRANSPORTEUR,$DEPART,$ARRIVE)
    {
    
       //ajouter a utilisateur 
        $conn = $this->dbConnect();
        $sql = "INSERT INTO Utilisateur (Nom,Prenom,Email,Adresse,Num,Mot_de_passe,Transporteur)
          Values ('$nom','$prenom','$email','$adresse','$Num','$Mot_de_passe','$TRANSPORTEUR')";
        $req=$conn->query($sql);
        //get id 
         if($TRANSPORTEUR=="OUI"){
           
        $sql = "SELECT  id_utilisateur from utilisateur ORDER BY id_utilisateur desc limit 1 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
         while($row = $result->fetch_assoc()) {
          $idd=$row["id_utilisateur"];
          echo $idd ;
        }
        }else {echo 'Erreur';}
        foreach ($ARRIVE as $wilaya) {
          echo $wilaya;
          $sql = "INSERT INTO transporteur_wilaya_depart (id_utilis,wilaya_depart)
          Values ('$idd','$wilaya')";
          $req=$conn->query($sql);
          if ($req == TRUE) {
           
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
      }
      foreach ($DEPART as $wilaya) {
        echo $wilaya;
        $sql = "INSERT INTO transporteur_wilaya_arriver (id_utilisateur,wilaya_arriver)
        Values ('$idd','$wilaya')";
        $req=$conn->query($sql);
        if ($req == TRUE) {
          echo "RESULT RETURN  successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      
    }
       }
        
    }
    public function Users()
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM  utilisateur ";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
    public function Signalement()
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM  signalemet ";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
    public function TRANSPORTEURS()
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM  utilisateur where TRANSPORTEUR='OUI'";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
     public function profil($id_utilisateur)
    {
    
      $conn = $this->dbConnect();
      $sql = "SELECT * FROM  utilisateur where id_utilisateur='$id_utilisateur'";
      $req=$conn->query($sql);
      if ($req == TRUE) {
          echo "RESULT RETURN  successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        return $req;
      
  }
  public function  banir_user($id_utilisateur)
    {
       $sql="UPDATE utilisateur SET banir=1  WHERE id_utilisateur=$id_utilisateur";
       $req=self::BDD($sql);   
       

    }
           

    public function Get_info($email,$Mot_de_passe)
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM  utilisateur WHERE Email='$email' AND Mot_de_passe='$Mot_de_passe' ";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
    public function Get_Column()  //c
    {
      $sql="SELECT *  FROM sys.columns  WHERE object_id = OBJECT_ID('utilisateur')";
      $req=self::BDD($sql);   
        return $req; 
        
    }  
    
    
 }
?>