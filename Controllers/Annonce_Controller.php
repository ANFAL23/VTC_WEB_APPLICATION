<?php
require_once('../Models/Annonce_Modele.php');


class Annonce_Controller
 {
    
      public function champ_annonce(){
       $champ=[`id_annonce`, `titre_annonce`, `image_`, `description_`, `lien`, 
       'depart', `arrive`, `type_transport`, `poids`, `volume`, `moyenne`, `tarif`];
      return   $champ;
       }
 
   
    
    public function Search_Details($id_annonce)
    { 
       echo 'success';
        $modele = new Annonce_Modele ();
        $result=$modele->Search_Details($id_annonce);
        return $result;
    }
    public function Search_Details_new($id_annonce)
    { 
       echo 'success';
        $modele = new Annonce_Modele ();
        $result=$modele->Search_Details_new($id_annonce);
        return $result;
    }
    public function Annonces()  
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces();
        return $result;

    }
    public function Annonces_limit()  
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces_limit();
        return $result;

    }
    public function Annonces_non_valider()
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces_non_valider();
        return $result;
    }   
    public function Annonces_archiver()
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces_archiver();
        return $result;
    }   
    
    public function News()  
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->News();
        return $result;

    }
    public function Annonces_id($id)
    { 
    
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces_id($id);
        return $result;
    }
    
    public function Get_Column()

       {
        $modele = new Annonce_Modele ();
        $result=$modele->Get_Column();
        return $result;
    }
    public function Search_Annonce($depart,$arrive)
    { 
       
        $modele = new Annonce_Modele($depart,$arrive);
        $result=$modele->Search_Annonce($depart,$arrive);
        return $result;
    }
    public function suggestion($depart,$arrive)
    {
        $modele = new Annonce_Modele($depart,$arrive);
        $result=$modele->suggestion($depart,$arrive);
        return $result;
    }
    public function Annonces_reponse($id_utilisateur,$id_annonce)
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->Annonces_reponse($id_utilisateur,$id_annonce);
        return $result;
    }   
    public function supprimer_annonce($id_annonce)
    { 
       
        $modele = new Annonce_Modele ();
        $modele->supprimer_annonce($id_annonce);
        
    }   
    public function demander_trans($id_annonce,$id_trans)
    { 
       
        $modele = new Annonce_Modele ();
        $modele->demander_trans($id_annonce,$id_trans);
        
    }   
    public function confirmer_trans($id_annonce)
    { 
       
        $modele = new Annonce_Modele ();
        $modele->confirmer_trans($id_annonce);
        
    }   
    public function demandes_id($id_trans)
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->demandes_id($id_trans);
        return         $result;
    }   
    public function signaler_trans($id_annonce,$id_util,$nom_prenom,$id_trans,$nom_preno,$text)
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->signaler_trans($id_annonce,$id_util,$nom_prenom,$id_trans,$nom_preno,$text);
        return         $result;
    }   
    public function noter_trans($id_annonce,$text)
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->noter_trans($id_annonce,$text);
        return         $result;
    }  
    public function ajouter_new($titre,$image,$text)
    { 
       
        $modele = new Annonce_Modele ();
        $result=$modele->ajouter_new($titre,$image,$text);
        return         $result;
    }   


    public function valider_annonce($id_annonce,$wilaya1,$wilaya2)
    { 
       
        $modele = new Annonce_Modele ();
       
        $result=$modele->get_tarif($wilaya1,$wilaya2);
        $tarif=0;
        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc())
                     {$tarif= $row["TARIF"];}
        }
        echo $tarif;
        $result=$modele->valider_annonce($id_annonce,$tarif);
        
    }   
     
  
}
      if(isset($_GET['action'])){
        $controller = new Annonce_Controller (); 
        if($_GET['action']=='supprimer'){
            $result=$controller->supprimer_annonce($_GET['id']);
            header('location:../Views/profil.php?id='.$_GET['id']);
          }
         
          if($_GET['action']=='valider'){
            $result=$controller->valider_annonce($_GET['id'],$_GET['wilaya1'],$_GET['wilaya2']);
            header('location:../Views/admin_Annonce_Valide.php');
          
          }
          if($_GET['action']=='demander'){
            $result=$controller->demander_trans($_GET['id_annonce'],$_GET['id_trans']);
            header('location:../Views/Details_Annonce.php?titre='.$_GET['id_annonce']);
          }
          if($_GET['action']=='confirmer'){
            $result=$controller->confirmer_trans($_GET['id_annonce']);
            header('location:../Views/Details_Annonce.php?titre='.$_GET['id_annonce']);
          }
          if($_GET['action']=='terminer'){
            $result=$controller->marquer_terminer($_GET['id_annonce']);
            header('location:../Views/Details_Annonce.php?titre='.$_GET['id_annonce']);
          }
          if($_GET['action']=='signaler'){
              session_start();
            $result=$controller->signaler_trans($_GET['id_annonce'],$_SESSION['nom'],$_SESSION['nom_prenom'],$_GET['id'],$_GET['nom'],$_POST['text']);
           header('location:../Views/Details_Annonce.php?titre='.$_GET['id_annonce']);
          }
          if($_GET['action']=='noter'){
            session_start();
          $result=$controller->noter_trans($_GET['id_annonce'],$_POST['text']);
         header('location:../Views/Details_Annonce.php?titre='.$_GET['id_annonce']);
        }
          if($_GET['action']=='ajouer_new'){
            $tmp_name=$_FILES['image_news']['tmp_name']; 
             echo $tmp_name;
            $name=$_FILES['image_news']['name'];
          $result=$controller->ajouter_new($_POST['titre_news'],$name,$_POST['text_news']);
         header('location:../Views/Admin_News.php');
        }
      }
 ?>