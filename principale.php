<html>
  <head>
    <meta charset="utf-8">
 
      <!-- feuille de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
  </head>

  <body style='background:#fff;'>
    <div id="content">
  
      <!-- Bouton -->
      <a href="connexion.php"><button>Connexion</button></a>
      <br>
      <a href="inscription.php"><button>Inscription</button></a>
        <?php
          include "Donnees.inc.php";
        session_start();
 
        // afficher un message lors de la connexion
 
        if(isset($_SESSION['id'])){
          echo "Bonjour " .$_SESSION['id'];
          echo  " , vous êtes connecté !";
          echo '<br/>';
        }
        
        try{

          $db_username = 'root';
          $db_password = 'root';
          $db_name = 'boisson';
          $db_host = 'localhost';
          $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
            /*for ($i=0; $i <count($Recettes) ; $i++) {
                
            
              $db_username = 'root';
              $db_password = 'root';
              $db_name = 'boisson';
              $db_host = 'localhost';
                  

              if($count==0) {
                //Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(400)  NOT NULL );
                $req = $bdd->prepare('INSERT INTO Recettes (NomCocktail, preparation, ingredient) VALUES(?, ?, ?)');
                $req->execute(array($Recettes[$i]['titre'], $Recettes[$i]['preparation'], $Recettes[$i]['ingredients']));
                for ($j=0; $j <count($Recettes[$i]['index']) ; $j++) { 
                  echo "$Recettes[$i]['index'][$j]";
                    
                  $req = $bdd->prepare('INSERT INTO `Liaison`(`numAliment`, `nomAliment`) VALUES (?,?)');
                  $req->execute(array($Recettes[$i][index], $Recettes[$i]['preparation'], $Recettes[$i]['ingredients']));
                          }
                        
                  
                        }*/

          for ($i=0; $i <count($Recettes) ; $i++) {
            $titre=$Recettes[$i]["titre"];
            $titre = preg_replace('/[^A-Za-z0-9\-]/', ' ', $titre); //fonction qui enleve les caracteres spéciaux
            echo "</br>";
            $ingredient=$Recettes[$i]["ingredients"];
            $ingredient = preg_replace('/[^A-Za-z0-9\-]/', ' ', $ingredient); //fonction qui enleve les caracteres spéciaux
            echo "</br>";
            $preparation=$Recettes[$i]["preparation"];
            $preparation=preg_replace('/[^A-Za-z0-9\-]/', ' ', $preparation); //fonction qui enleve les caracteres spéciaux
            echo "</br>";

            $req = $bdd->query("INSERT INTO `Recettes`(`NomCocktail`, `preparation`, `ingredient`) VALUES('$titre' , '$preparation', '$ingredient');");

          }
        //AJOUT DES DONNEES DE LA TABLES HIERARCHIE DANS ALIMENT
            foreach($Hierarchie as $cle => $elem){
              
              if(isset($cle)){
                $cle = preg_replace('/[^A-Za-z0-9\-]/', ' ', $cle); //fonction qui enleve les caracteres spéciaux
                //echo "$cle <br />"; 
                foreach($elem as $categ=> $fruit){ 
                  
                  if(isset($categ)){
                    
                    $categ = preg_replace('/[^A-Za-z0-9\-]/', ' ', $categ);
                    //echo "$categ <br />";
                    foreach($fruit as $val1=> $val2){
                      
                      if(isset($val2)&& isset($val1)){ 
                        
                        $val1 = preg_replace('/[^A-Za-z0-9\-]/', ' ', $val1);
                        //echo "$val1 <br />";
                        $val2 = preg_replace('/[^A-Za-z0-9\-]/', ' ', $val2);
                        //echo $val2;
                        $req = $bdd->query("INSERT INTO `Aliment`(`famille`, `nomAliment`, `categorie`) VALUES('$cle' , '$val2', '$categ');");
                    
                      }
                    }
                  }
                }
              }

            } 
                
        }
            
        catch(Exception $e){
                      // Message d'erreur
                      die($e->getMessage());
                  }
                /*  for ($i=0; $i <count($Hierarchie) ; $i++) { 
                    echo $Hierarchie[$i].;
                    echo '<br/>';
                  // print_r($Recettes[$i]['sous-categorie']);
                    echo '<br/>';
                    //print_r($Recettes[$i]['super-categorie']);
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
        */


              /*
              $Hierarchie=array (
                'Épice' => 
                array (
                  'sous-categorie' => 
                  array (
                    6 => 'Épice commune',
                    7 => 'Épice européenne',
                    16 => 'Vanille',
                  ),
                  'super-categorie' => 
                  array (
                    0 => 'Assaisonnement',
                  ),
                ),*/

      ?>
    </div>
  </body>
</html>
    
     
  
     