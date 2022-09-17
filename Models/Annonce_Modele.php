<?php
require_once('../Models/Modele.php');
 class Annonce_Modele extends Modele
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
    
    public function Add_Annonce($titre,$image,$description,$depart,$arrive,
    $type_transport,$poids,$volume,$moyenne,$id_utilisateur)
    {
             $conn = $this->dbConnect();
             $sql = "INSERT INTO annonce (titre_annonce,image_,description_,depart,arrive,
             type_transport,poids,volume,moyenne,id_utilisateur)  
             Values ('$titre','$image','$description','$depart','$arrive',
             '$type_transport','$poids','$volume','$moyenne','$id_utilisateur')";
           
          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
      
    }
    
    public function Search_Annonce($depart,$arrive)
    {
        $sql = "SELECT id_annonce,titre_annonce,image_,description_ FROM  annonce  WHERE depart='$depart' AND arrive='$arrive' and supprimer=0 and valider=1"; 
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function Annonces()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce WHERE supprimer=0 AND valider=1";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function Annonces_limit()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce WHERE supprimer=0 AND valider=1 LIMIT 8";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function Annonces_non_valider()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce WHERE supprimer=0  AND valider=0 ";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function Annonces_archiver()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce WHERE supprimer=1 ";
        $req=self::BDD($sql);   
        return $req; 
        
    }
    public function signaler_trans($id_annonce,$id_util,$nom_prenom,$id_trans,$nom_prenom2,$text)
    { 
      $sql = "INSERT INTO signalemet  (id_annonce,id_utilisateur,nom_prenom,id_utilis,nom_prenom2,text_)  
      Values ('$id_annonce','$id_util','$nom_prenom','$id_trans','$nom_prenom2','$text')";
       $req=self::BDD($sql);   
       return $req;   
    }   
    public function noter_trans($id_annonce,$text)
    { 
      
        $sql="UPDATE annonce SET note='$text'  WHERE id_annonce=$id_annonce";
        
       $req=self::BDD($sql);   

       return $req;   
    }   

    public function News()  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  news ";
        $req=self::BDD($sql);   
        return $req; 
        
    }

    public function ajouter_new($titre,$image,$text)
    { 
      $sql = "INSERT INTO news  (titre_news,image_news,text_news)  
      Values ('$titre','$image','$text')";
       $req=self::BDD($sql);   
       return $req;   
    }   


    public function Search_Details($id)  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce  where  id_annonce='$id'";
        $req=self::BDD($sql);  
         
        return $req; 
        
    }
    public function Search_Details_new($id)  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  news  where  id_news='$id'";
        $req=self::BDD($sql);  
         
        return $req; 
        
    }
    //par id de l'utilisateur
    public function Annonces_id($id)  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce  where  id_utilisateur='$id' and supprimer=0";
        $req=self::BDD($sql);  
         
        return $req; 
        
    }
    public function Get_Column()  //c
    {
      $sql="SELECT *  FROM sys.columns  WHERE object_id = OBJECT_ID('annonce')";
     
        $req=self::BDD($sql);   
        return $req; 
        
    }
   
   
    public function Search_not_connect($id_annonce)
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT  FROM  annonce WHERE id_annonce='$id_annonce' ";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            echo "RESULT RETURN  successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
    public function suggestion($depart,$arriver)
    {
      $sql="SELECT * FROM utilisateur where id_utilisateur in (SELECT id_utilisateur FROM (SELECT * FROM transporteur_wilaya_arriver INNER JOIN transporteur_wilaya_depart ON
     transporteur_wilaya_depart.id_utilis = transporteur_wilaya_arriver.id_utilisateur ) as N 
      WHERE wilaya_arriver='$depart' AND wilaya_depart='$arriver') ";
      $req=self::BDD($sql);   
      return $req; 
    } 
    public function  supprimer_annonce($id_annonce)
    {
       $sql="UPDATE annonce SET supprimer=1  WHERE id_annonce=$id_annonce";
       $req=self::BDD($sql);   
       

    }
    
    public function  valider_annonce($id_annonce,$tarif)
    {
       $sql="UPDATE annonce SET valider=1 ,tarif='$tarif',Etat=1 WHERE id_annonce=$id_annonce";
       $req=self::BDD($sql);   
      
       

    }
    public function demandes_id($id)  //cote admin pour le tableau 
    {
  
        $sql = "SELECT * FROM  annonce  where  id_trans='$id' and Etat=2";
        $req=self::BDD($sql);  
         
        return $req; 
        
    }
    public function  demander_trans($id_annonce,$trans)
    {
       $sql="UPDATE annonce SET Etat=2 ,id_trans=$trans WHERE id_annonce=$id_annonce";
       $req=self::BDD($sql);   
  
    }
    public function  confirmer_trans($id_annonce)
    {
       $sql="UPDATE annonce SET Etat=3  WHERE id_annonce=$id_annonce";
       $req=self::BDD($sql);   
  
    }
    public function  get_tarif($wilaya1,$wilaya2)
    {
       $sql="SELECT  *  FROM  wilayas_tarif  WHERE  WILAYA_1='$wilaya1' AND WILAYA_2='$wilaya2'";
      
       $req=self::BDD($sql);   
       return $req;
       

    }
 }
?>