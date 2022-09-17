<?php

require_once('../Controllers/Controller.php');

//include_once('head.php');
class Afficher_page_admin
{
  function Debut_2(){
    echo '  
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <title> Bootstrap SORT table Example </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="css/style_INS.css">
  
  </head>
  <body>
  ';
  }

   function Fin_2(){
     echo "
     <script>
     $('#sortTable').DataTable();
     </script>
     </body>
     </html>";
   }
}    
      
     