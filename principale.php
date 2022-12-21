<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <a href="connexion.php"><button>Connexion</button></a>
 <br>
 <a href="inscription.php"><button>Inscription</button></a>
 <?php
 session_start();
 
 // afficher un message
 if(isset($_SESSION['id'])){
  echo "Bonjour " .$_SESSION['id'];
  echo  " , vous êtes connecté !";

 }

                


 /*
      for ($i=0; $i <count($Recettes) ; $i++) { 
        print_r($Recettes[$i]['titre']);
        echo '<br/>';
        print_r($Recettes[$i]['ingredients']);
        echo '<br/>';
        print_r($Recettes[$i]['preparation']);
        echo '<br/>';
        for ($j=0; $j <count($Recettes[$i]['index']) ; $j++) { 
         
          print_r($Recettes[$i]['index'][$j]);
          echo '<br/>';
       
      } */
 ?>
 
 </div>
 </body>
</html>
    
     
  
     