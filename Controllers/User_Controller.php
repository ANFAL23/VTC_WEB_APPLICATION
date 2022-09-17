<?php
require_once('../Models/User_Modele.php');



class User_Controller
 {
    
    private static   $Nom;
    private static   $Prenom;
    private static   $Email;
    private static   $Adresse;
    private static   $Password; 
    private static   $Num; 
    private static   $Transporteur; 
    public function Get_User()
    {
       self::$Nom=$_POST['Nom_User'];
       self::$Prenom=$_POST['Prenom_User'];
       self::$Email=$_POST['Email_User'];
       self::$Adresse=$_POST['adresse_User'];
       self::$Num=$_POST['Num_User'];
       self::$Password=$_POST['password_User'];  
       self::$Transporteur='NON';  

    }
 
    public function Add_User()
    {
      // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);    
        //self::$Password=password_hash($_POST['password_User']);
        self::Get_User();
        $modele = new User_Modele ();
        $list_wilaya_depart = array();
        $list_wilaya_arrive = array();
        
   
        if(isset($_POST['trans'])){
         if (!empty($_POST['liste_wilaya'])) {
            foreach ($_POST['liste_wilaya'] as $selected) {
                $list_wilaya_depart[]=$selected;
            }
           
            
        } else {
            echo '>Please select any value</p>';
        }
        if (!empty($_POST['liste_wilaya2'])) {
            foreach ($_POST['liste_wilaya2'] as $selected) {
                $list_wilaya_arrive[]=$selected;
            }
        
            
        } else {
            echo 'Please select any value';
        }
         self::$Transporteur='OUI';}
        $result=$modele->Add_User(self::$Nom,self::$Prenom,self::$Email,
        self::$Adresse,self::$Num,self::$Password,self::$Transporteur,
        $list_wilaya_depart,$list_wilaya_arrive);
        header('location:../../Views/Acceuil.php');
    }
      
    public function Users()
    { 
       
        $modele = new User_Modele ();
        $result=$modele->Users();
        return $result;
    }

  
      
 }
 $controlle=new User_Controller;
 $controlle->Add_User();
 ?>