<?php

require_once('../Controllers/Controller.php');
include_once('../Controllers/Users/User_Admin_Controller.php');
include_once('Afficher_page_admin.php');
include_once('Admin_User.php');
//include_once('head.php');

      
      $View = new Admin_User ();
      $View-> Debut_2();
      $View-> Afficher_table_2(1);
      $View-> Fin_2();
