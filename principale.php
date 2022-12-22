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
  echo '<br/>';

 

 include "Donnees.inc.php";

 $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
        try
        {
          for ($i=0; $i <count($Recettes) ; $i++) { 
            print_r($Recettes[$i]['titre']);
            echo '<br/>';
            print_r($Recettes[$i]['ingredients']);
            echo '<br/>';
            print_r($Recettes[$i]['preparation']);
            echo '<br/>';

            $db_username = 'root';
            $db_password = 'root';
            $db_name = 'boisson';
            $db_host = 'localhost';
            $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
          
                $requete = "SELECT count(*) FROM recettes";
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)']; 
                if($count==0) {
            //Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(400)  NOT NULL );
                  $req = $bdd->prepare('INSERT INTO Recettes (NomCocktail, preparation, ingredient) VALUES(?, ?, ?)');
                  $req->execute(array($Recettes[$i]['titre'], $Recettes[$i]['preparation'], $Recettes[$i]['ingredients']));
            
                  for ($j=0; $j <count($Recettes[$i]['index']) ; $j++) { 
             
                     $req = $bdd->prepare('INSERT INTO Recettes (NomCocktail, preparation, ingredient) VALUES(?, ?, ?)');
                     $req->execute(array($Recettes[$i]['titre'], $Recettes[$i]['preparation'], $Recettes[$i]['ingredients']));
            
                  }
                }
          }
        }
        catch(Exception $e)
        {
            // En cas d'erreur précédemment, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
      }
 ?>
 
 </div>
 </body>
</html>
    
     
  
     