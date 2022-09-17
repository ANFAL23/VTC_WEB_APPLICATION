<?php

require_once('../Controllers/Controller.php');
//require_once('../Controllers/login_Controller.php');
include_once('head.php');
?>

<html>
<head>
 
   <link rel="stylesheet" href="css/style_INS.css">
   <title>
       VTC.com
    </title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
                    $(document).ready(function(){
                        $('#trans').click(function(){
                        if($(this).prop("checked") == true){
                         $('form').get(0).setAttribute('action','../Controllers/User_Controller/Add_Trans');
                          $("#add_User").html('Remplir les infos de tronsport'); 
                          
                        }
                        if($(this).prop("checked") == false){
                         $('form').get(0).setAttribute('action','../Controllers/User_Controller');
                          $("#add_User").html('Inscription'); 
                          
                        }
                     
  });
});
    </script>
</head>

<body>
  <br/><br/><br/><br/><br/><br/><br/>
   <section class="contact" id="contact">

    <h1 class="heading"><span>Connexion! </span> </h1>

    <div class="row">

        
        <form method="POST" action="../Controllers/login_Controller">
            <h3>Remplir Vous Information</h3>
            <?php 
                 if(isset($_GET['info'])){
                  $message='<h4>le nom ou/et le mot depasse est incorrect!</h4>';
                  echo $message;
                }
                if(isset($_GET['banir'])){
                  $message='<h4>vous etez senctionner vous pouvez pas acceddes a votre cpmpte pour plus d infos contacter admin!</h4>';
                  echo $message;
                }
                    
                
                ?>
          
            <div class="inputBox">
                <input type="text"   placeholder="Votre Email" name="Email_User" id="Email_User" required/>
            </div>
             
           
            <div class="inputBox">
                  
                <input type="password" placeholder="Mot de passe" name="password_User" id="password_User" required/>  
              </div>
            
           
           
            
  
            
            <br/>
            <button class="btn" id="add_User" type="submit">Connexion</button> <br/><br/>
            <div class="inputBox">
             <p> Vous n'avez pas un compte ,inscrivez vous </p>
             <a href="http://127.0.0.1/VTC/Views/Inscription" class="btn">Inscription</a>
         
            </div>
        </form>

    </div>

</section>
<?php

include_once('footer.php');
?>
   </body>
</html>