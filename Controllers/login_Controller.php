<?php  
require_once('../Models/User_Modele.php');

class login_Controller
 {
    
      
     public static $message='';
	
 
    public function Get_info($nom,$password)
    {
		$modele = new User_Modele ();
        $result=$modele->Get_info($nom,$password);
		
        return $result;
    }
	public function Verifie_info()
    {
		$nom=$_POST['Email_User'];
		$password=$_POST['password_User'];
        $result=self::Get_info($nom,$password);
        if ($result->num_rows > 0)
        { 
            while($row = $result->fetch_assoc())
              {$id_utilisateur=$row["id_utilisateur"]; 
                $TRANSPORTEUR=$row["Transporteur"];
                $nom_prenom=$row["Nom"]."_".$row["Prenom"]; 
                echo $id_utilisateur;
                if($row["banir"]==1){
                  echo $id_utilisateur;
                  header('location:../Views/connexion.php?banir=oui');
                }
                else{self::Connexion($id_utilisateur,$TRANSPORTEUR,$nom_prenom);}
              }
              
        } 
		else {
    
		
		 	header('location:../Views/connexion.php?info=incorrect');
      
		 }

    }
    Public function Connexion($id_utilisateur,$TRANSPORTEUR,$nom_prenom)
   {
	session_start();
	
   
  $_SESSION['nom'] = $id_utilisateur;
  $_SESSION['Transporteur'] = $TRANSPORTEUR;
  $_SESSION['nom_prenom'] = $nom_prenom;  

	
		header('location:../Views/Acceuil.php?id='.$_SESSION['nom']);
	
   }
   public function Get_message()
    {
		
        return self::$message;
    }
 }
 $controller = new login_Controller ();
  $controller->Verifie_info();
?>









 