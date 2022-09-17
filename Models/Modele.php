<?php
 class Modele
 {
    private static  $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "TDW";
   
    protected function dbConnect()
    {
        $conn = new mysqli(self::$servername,self::$username,self::$password,self::$dbname);
        
        return $conn;
    }

    public function get_Menu()
    {
        $conn = $this->dbConnect();
        $req = $conn->query('SELECT nom_item_menu  FROM menu ORDER BY id_item_menu');
        return $req;
    }

  
 }
?>

   
