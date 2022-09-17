<?php 
require_once('../Controllers/Annonce_Controller.php');
require_once('../Controllers/Controller.php');
include_once('head.php');
class Details_Annonce{
   
      public function suggestions($suggestion,$id,$Etat,$id_trans){
        echo ' <section class="cadre" id="cadre">';
       if($Etat==1){
        echo '<h1 class="heading"> SUGGESTION <span>TRANPORTEUR</span> </h1>';
       }
       if($Etat==2){
        echo "<h1 class='heading'> l'annonce est en attente de la reponse du transporteur :</span> </h1>";
       }
       if($Etat==3){
        echo "<h1 class='heading'> l'annonce est confirme par le Tranporteur :</span> </h1>";
       }
        echo '<div class="box-container">';          
      while($row = $suggestion->fetch_assoc())
       {          
        

        echo '<div class="box">
            
        
        <div class="content">    
            <p>Nom : '.$row["Nom"].'</p>
            <p>Prenom : '.$row["Prenom"].'</p>
            <p>Num : '.$row["Num"].'</p>
            <p>adresse : '.$row["Adresse"].'</p>
            <p>Adresse_Email : '.$row["Email"].'</p>
            
           
            ';
             if($Etat==1)
             {echo '
            <form method="POST" action="../Controllers/Annonce_Controller.php?action=demander&id_annonce='.$id.'&id_trans='.$row["id_utilisateur"].'&id_util='.$_SESSION['nom'].'">
        <button class="btn"  type="submit">Demander</button> </form>';}
        if($Etat==2)
        {echo '
          <form method="POST" action="../Controllers/Annonce_Controller.php?action=annuler&id_annonce='.$id.'&id_trans='.$row["id_utilisateur"].'&id_util='.$_SESSION['nom'].'">
      <button class="btn"  type="submit">Annuler</button> </form>';}
   /* echo '
         
          <form method="POST" action="../Controllers/Annonce_Controller.php?action=annuler&id_annonce='.$id.'&id_trans='.$row["id_utilisateur"].'&id_util='.$_SESSION['nom'].'">
          <button class="btn"  type="submit">Marque comme Terminer</button> </form>';*/
          echo '
         
         <button class="btn"  type="submit">Marque comme Terminer</button> 
          <a class="btn" href="signaler.php?
          id_annonce='.$id.'&id_trans='.$row["id_utilisateur"].'&nom='.$row["Nom"].'">Signaler</a>
          <a class="btn" href="noter.php?
          id_annonce='.$id.'&id_trans='.$row["id_utilisateur"].'&nom='.$row["Nom"].'">Noter</a>';
       echo'
        </div>
    
        </div>  '; 

       }}
      
       public function details(){
        echo '<section class="cadre" id="cadre">
  
        <h1 class="heading"> DETAILS <span>Annonces</span> </h1>
      
         <div class="box-container-Details">';
         
         
      try{  
             $id=$_GET['titre'];
             $controller = new Annonce_Controller ();
             $result=$controller->Search_Details($id);
             if ($result->num_rows > 0)
            {
              
              while($row = $result->fetch_assoc())
               {          
                 echo '
                 
                 <div class="image">
                     <img src="images/'.$row["image_"].'" alt="">
                 </div>
                 
                 <div class="content">';
              
                 if(isset($_SESSION['nom'])){
                 echo'
                 <p> titre: '.$row["titre_annonce"].'</p>';}
               echo'
                 <p> wilaya de depart: '.$row["depart"].' 
                  .  wilaya arriver : '.$row["arrive"].'</p>
                 <p> type de transport : '.$row["type_transport"].'</p>
                 <p> poids : '.$row["poids"].'</p>
                 <p> volume : '.$row["volume"].'</p>
                 <p> moyenne : '.$row["moyenne"].'</p>';
                 if(isset($_SESSION['nom'])){
                  if($row["Etat"]>0){echo'
                 <p> tarif : '.$row["tarif"]. 'DA</p>';}
                 if($row["Etat"]==1){echo' <p> ETAT : VALIDER</p>';}
                 if($row["Etat"]==2){echo' <p> ETAT : EN_ATTENTE</p>';}
                 if($row["Etat"]==3){echo' <p> ETAT : CONFIRMER</p>';}
                    echo' <p>'.$row["description_"].'</p>
                   
                 
                ';
                
                $suggestion=$controller->Suggestion($row["depart"],$row["arrive"]); 
                $id_utili=$row["id_utilisateur"];
                $Etat=$row["Etat"];
                $id_trans=$row["id_trans"];}
              
              }
               echo '</section>';
               if(isset($_SESSION['nom'])){
               if($id_utili==$_SESSION['nom']) {
                if($Etat>0){
                 if ($suggestion->num_rows > 0){self::suggestions($suggestion,$id,$Etat,$id_trans); echo ' </section>';
                }}}
                

           
             
      }}}
      catch (Exception $e){echo $e->getMessage();}
      
      
       } 
}
?>


<html>
<head>
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
<br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/>
  <?php 
         $view=new Details_Annonce();
         $view->details();
  ?>
</body>
<?php

include_once('footer.php');

?>
  
