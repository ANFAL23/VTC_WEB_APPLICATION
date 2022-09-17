<?php
require_once('../Models/Modele.php');
 class Wilayas_Modele extends Modele
 {
   

 
    public function get_Wilayas()
    {
    
        $conn = $this->dbConnect();
        $sql = "SELECT * FROM  wilayas";
        $req=$conn->query($sql);
        if ($req == TRUE) {
            echo "";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          return $req;
        
    }
    
    
 }
 if (!empty($_POST['liste_wilaya'])) {
    foreach ($_POST['liste_wilaya'] as $selected) {
        echo '<p class="select-tag mt-3">' . $selected . '</p>';
    }
} else {
    echo '<p class="error alert alert-danger mt-3">Please select any value</p>';
}
?>