<html>
  <head>
    <meta charset="utf-8">
 
      <!-- feuille de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
  </head>

  <body style='background:#fff;'>
    <div id="content">
  
      <!-- Bouton -->
      <a href="verification.php"> <button name ="db">Créer la database</button></a>
      <br>
      <a href="connexion.php"><button>Connexion</button></a>
     
      <a href="inscription.php"><button>Inscription</button></a>
     
      <?php
          include "Donnees.inc.php";
          session_start();
 
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

          $req1 = $bdd->query("SELECT count(*) as Nb FROM Liaison;");
          $result1= $req1->fetch();
          $count1 = $result1['Nb'];

          //AJOUT DES DONNEES DE LA TABLE RECETTES DANS RECETTES
          if($count == 0 && $count1 == 0){
            for ($i=0; $i <count($Recettes) ; $i++) {
              $titre=$Recettes[$i]["titre"];
              $titre = preg_replace('/[^A-Za-z0-9\-]/', ' ', $titre); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
              $ingredient=$Recettes[$i]["ingredients"];
              $ingredient = preg_replace('/[^A-Za-z0-9\-]/', ' ', $ingredient); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
              $preparation=$Recettes[$i]["preparation"];
              $preparation=preg_replace('/[^A-Za-z0-9\-]/', ' ', $preparation); //fonction qui enleve les caracteres spéciaux
              //echo "</br>";
            
              //AJOUT DES DONNEES DE LA TABLE INDEX DANS LIAISON
              for ($j=0; $j <count($Recettes[$i]["index"]) ; $j++) {
                $index=preg_replace('/[^A-Za-z0-9\-]/', ' ', $Recettes[$i]["index"][$j]);
                //echo "</br>";
                $req = $bdd->query("INSERT INTO `Liaison`(`nomAliment`) VALUES('$index');");
              }
              $req = $bdd->query("INSERT INTO `Recettes`(`NomCocktail`, `preparation`, `ingredient`) VALUES('$titre' , '$preparation', '$ingredient');");
            
            }
          } 
          //AJOUT DES DONNEES DE LA TABLE HIERARCHIE DANS ALIMENT
          $req = $bdd->query("SELECT count(*) as Nb FROM Aliment;");
          $result= $req->fetch();
          $count = $result['Nb'];
          if($count == 0){
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
    
     
  
     