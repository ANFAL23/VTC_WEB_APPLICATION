<?php

require_once('../Controllers/Controller.php');
include_once('../Controllers/Annonce_Controller.php');
include_once('Afficher_page_admin.php');
include_once('Admin_Annonce.php');

      
      $View = new Admin_Annonce ();
      $View-> Debut_2();
      $View-> Afficher_table(1);  //les annonces non valides
      $View-> Fin_2();
    
     