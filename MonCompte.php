<html>
  <head>
    <meta charset="utf-8">
 
      <!-- feuille de style a remettre, le texte est blanc sinon impossible de lire l'erreur-->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/png" href="image/logo.png"/>
      <title> WeDrink/Accueil</title>
  </head>

  <body>
  <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="Accueil.php">ACCUEIL</a></li>
                <li><a href="Famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="RecettePreferees.php">MES RECETTES PRÉFÉRÉES</a></li>
                <li><a href="Recherche.php">RECHERCHER</a></li>
                <li><a href="MonCompte.php"> MON COMPTE</a><img src="image/icon.png" alt="Logo_page" title="Accueil" id="icon1" /></li>
              </ul>
        </nav>
    
     
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
          
          if(!empty($_SESSION['id'])){
            $id = $_SESSION['id'];
            // verifier si utilisateur est non vide
            $verif = $bdd->query("SELECT COUNT(*) as Nb FROM Utilisateur ;");
            $result= $verif->fetch();
            $count = $result['Nb'];
            if($count != 0){

              $recupId = $bdd->query("SELECT prenom FROM Utilisateur WHERE id='$id' ;");
              $result= $recupId->fetch();
              $count = $result['prenom'];
            
              echo "<h1 id='bienvenue'> Bonjour $count, vous êtes connecté !</h1>";
              
            }
            
          }
          else{
            echo "<h1 id='bienvenue'> Bonjour veuillez-vous connecté !</h1>";
            $_SESSION['id']='';
          }
          $req = $bdd->query("SELECT count(*) as Nb FROM Recettes;");
          $result= $req->fetch();
          $count = $result['Nb'];
?>
 <!-- Bouton -->
 <a id="creerdb" href="install.php" > <button  name ="db">Installation</button></a>
 <a id="connexion" href="Connexion.php"><button>Se connecter</button></a>
 <a id="connexion" href="ModifierID.php" > <button >Modifier mon compte</button></a>
 <a id="connexion" href="Deconnexion.php" > <button  name ="db">Déconnexion</button></a>
 
     
          <p id="pascompte">Vous n'avez pas de compte ?<a id="clikk" href="Inscription.php"><button>S'inscrire</button></a></p>
<?php
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
            echo " <h1 id='bienvenue'>CREER LA DATABASE</h1>";
          }
          else{
            die($e->getMessage());
          }
            
        }
      ?>
    </div>
  </body>
</html>
    
     
  
     