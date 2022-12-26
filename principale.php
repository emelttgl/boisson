<html>
  <head>
    <meta charset="utf-8">
 
      <!-- feuille de style a remettre, le texte est blanc sinon impossible de lire l'erreur-->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/png" href="image/logo.png"/>
      <title> WeDrink</title>
  </head>

  <body>
  <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="principale.php">ACCUEIL</a></li>
                <li><a href="famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="">MES RECETTES PRÉFÉRÉES</a></li>
                <li><a href="">PANIER</a></li>
                <li><input type="search" name="g" placeholder="Rechercher" id="search">  </li>
                </ul>
        </nav>
    
      <h1 id="bienvenue">BIENVENUE CHEZ WEDRINK !!!<img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo2"/></h1>
      <!-- Bouton -->
      <a id="creerdb" href="verification.php" > <button  name ="db">Créer la database</button></a>
      
      <a id="connexion" href="connexion.php"><button>Connexion</button></a>
     
      <a id="inscription" href="inscription.php"><button>Inscription</button></a>
     
      <?php
          include "Donnees.inc.php";
          session_start();
          $caraS = array('\\', "'");
          $caraN = array('', " ");
       
        // afficher un message lors de la connexion
        
        try{

          $db_username = 'root';
          $db_password = 'root';
          $db_name = 'boisson';
          $db_host = 'localhost';
          $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
          
          if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            // verifier si utilisateur est non vide
            $verif = $bdd->query("SELECT COUNT(*) as Nb FROM UTILISATEUR ;");
            $result= $verif->fetch();
            $count = $result['Nb'];
            if($count != 0){

              $recupId = $bdd->query("SELECT prenom FROM UTILISATEUR WHERE id='$id' ;");
              $result= $recupId->fetch();
              $count = $result['prenom'];
            
              echo "</br> Bonjour $count, vous êtes connecté !<br/>";
              
            }
          }
          $req = $bdd->query("SELECT count(*) as Nb FROM Recettes;");
          $result= $req->fetch();
          $count = $result['Nb'];

          

          //AJOUT DES DONNEES DE LA TABLE RECETTES DANS RECETTES
          if($count == 0){
            for ($i=0; $i <count($Recettes) ; $i++) {
              $titre=$Recettes[$i]["titre"];
              $titre = str_replace($caraS, $caraN, $titre); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
              $ingredient=$Recettes[$i]["ingredients"];
              $ingredient = str_replace($caraS, $caraN, $ingredient); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
              $preparation=$Recettes[$i]["preparation"];
              $preparation = str_replace($caraS, $caraN, $preparation); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
            
              //AJOUT DES DONNEES DE LA TABLE INDEX DANS RECETTES
              $count = " ";
              for ($j=0; $j <count($Recettes[$i]["index"]) ; $j++) {
                  
                $val= str_replace($caraS, $caraN, $Recettes[$i]["index"][$j]);
                $val =strtolower($val);
                $count =$count."|".$val ;
                
              }
              $count =$count."|";
              //echo " ".$count;
              $req = $bdd->query("INSERT INTO `Recettes`(`NomCocktail`, `preparation`, `ingredient`, nomIngredient) VALUES('$titre' , '$preparation', '$ingredient', '$count');");
                
            }
            
          } 
          //AJOUT DES DONNEES DE LA TABLE HIERARCHIE DANS ALIMENT
          $req = $bdd->query("SELECT count(*) as Nb FROM Aliment;");
          $result= $req->fetch();
          $count = $result['Nb'];
          if($count == 0){
            foreach($Hierarchie as $cle => $elem){
              
              if(isset($cle)){
                $cle = str_replace($caraS, $caraN, $cle); //fonction qui enleve les caracteres spéciaux
                //echo "$cle <br />"; 
                foreach($elem as $categ=> $fruit){ 
                  
                  if(isset($categ)){
                    
                    $categ = str_replace($caraS, $caraN, $categ);
                    //echo "$categ <br />";
                    foreach($fruit as $val1=> $val2){
                      
                      if(isset($val2)&& isset($val1)){ 
                        
                        $val1 = str_replace($caraS, $caraN, $val1);
                        //echo "$val1 <br />";
                        $val2 = str_replace($caraS, $caraN, $val2);
                        //echo $val2;
                        $req = $bdd->query("INSERT INTO `Aliment`(`famille`, `nomAliment`, `categorie`) VALUES('$cle' , '$val2', '$categ');");
                      }
                    }
                  }
                }
              }
            }
          }           
        }
       
        catch(Exception $e){
           // Message d'erreur
          if(("SQLSTATE[42S02]: Base table or view not found: 1146 Table 'boisson.recettes' doesn't exist" == $e->getMessage()) || ("SQLSTATE[HY000] [1049] Unknown database 'boisson'" == $e->getMessage())){
            echo "<p style='color:pink'>CREER LA DATABASE</p>";
          }
          else{
            die($e->getMessage());
          }
            
        }
      ?>
    </div>
  </body>
</html>
    
     
  
     