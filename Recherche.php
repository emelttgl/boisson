<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Recherche</title>
  </head>
  <?php
  $noError = true;
    session_start();
    if(isset($_POST['recherche'])){
        $recherche = $_POST['recherche'];
        $db_username = 'root';
        $db_password = 'root';
        $db_name = 'boisson';
        $db_host = 'localhost';        
    
        try{
            $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rechercheRecettes = 'SELECT distinct(NomCocktail) FROM Recettes WHERE LOWER(NomCocktail) LIKE LOWER(?) ORDER BY NomCocktail ASC;';
            $rechercheRecettesRequete = $bdd->prepare($rechercheRecettes);
            $rechercheRecettesRequete->execute(array('%'.htmlspecialchars($recherche).'%'));
            $rechercheIngredients = ("SELECT distinct(NomCocktail) FROM Recettes WHERE LOWER(nomIngredient) LIKE LOWER(?) ORDER BY NomCocktail ASC;");
            $rechercheIngredientsRequete = $bdd->prepare($rechercheIngredients);
            $rechercheIngredientsRequete->execute(array('%'.htmlspecialchars($recherche).'%'));
            $rechercheIngredientsP = ("SELECT distinct(NomCocktail) FROM Recettes WHERE LOWER(nomIngredient) NOT LIKE LOWER(?) ORDER BY NomCocktail ASC;");
            $rechercheIngredientsPRequete = $bdd->prepare($rechercheIngredientsP);
            $rechercheIngredientsPRequete->execute(array('%'.htmlspecialchars($recherche).'%'));
            $rechercheAliments = 'SELECT distinct(nomAliment) FROM Aliment WHERE LOWER(nomAliment) LIKE LOWER(?) ORDER BY nomAliment ASC;';
            $rechercheAlimentsRequete = $bdd->prepare($rechercheAliments);
            $rechercheAlimentsRequete->execute(array('%'.htmlspecialchars($recherche).'%'));
            
        }
        catch (PDOException $e){
        
            echo $e->getMessage();
        }
       
    }
    else{
    $noError = false;
    // TODO: Afficher la 1ère page normale et le résultat de la recherche s'il y en a en-dessous ou inclure ce fichier dans la partie <main> du index.html
    echo '';
    }
    

?>
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
        <section class="affichercocktail">
            <?php
            if(!empty($ingredient)){
                if($ingredient->rowCount()>0){
                    
                }else{
                    echo 'recherche non trouvé';
                }
            }
            ?>
</section>   
    <section>
        <h1 id="bienvenue"> Rechercher </h1>
        <article>
                
                <form method="POST"  name="recherche" id ="recherche "action="Recherche.php">
                
                <a id="search1"><input type="search" name="recherche" placeholder="Rechercher" style="width:200px; "><input type="submit" href="Recherche.php" value="Rechercher"></a>
                
                <?php if(empty($recherche)){
                    $recherche='';
                }else{
                    echo "<p>Voici le résultat de votre recherche pour  '' $recherche '' : </p><hr>";
                }?>
                <h2 id='rech'>Recettes contenant "<?php echo $recherche;?> " :</h2>
                
                <?php
                 if(!empty($rechercheRecettesRequete)){
                    if($recetteParRecette = $rechercheRecettesRequete->fetch()){
                        echo '<ul>';
                        do
                        {
                        echo '<li> '. $recetteParRecette['NomCocktail'] . '</li>';
                        }while($recetteParRecette = $rechercheRecettesRequete->fetch());
                            echo '</ul>';
                    }
                    else{
                        echo '<p><ul><li> Recherche Vide</li></ul></p>';
                        }
                
                 }
                    
                
                ?>
            </article>
            <article>
            
                <h2 id='rech'>Recettes contenant l'aliment "<?php echo $recherche;?> " :</h2>
                <?php
                if(!empty($rechercheIngredientsRequete)){
                    if($recetteParIngredient = $rechercheIngredientsRequete->fetch()){
                        echo '<ul>';
                        do
                        {
                        echo '<li> '. $recetteParIngredient['NomCocktail'] . '</li>';
                        }while($recetteParIngredient = $rechercheIngredientsRequete->fetch());
                            echo '</ul>';
                    }
                    else{
                        echo '<p><ul><li> Recherche Vide</li></ul></p>';
                    }
                }
                
                ?>
            </article>
            <article>
            
                <h2 id='rech'>Recettes ne contenant pas "<?php echo $recherche;?> " :</h2>

                <?php
                if(!empty($rechercheIngredientsPRequete)){
                    if($recetteParIngredientP = $rechercheIngredientsPRequete->fetch()){
                        echo '<ul>';
                        do
                        {
                        echo '<li> '. $recetteParIngredientP['NomCocktail'] . '</li>';
                        }while($recetteParIngredientP = $rechercheIngredientsPRequete->fetch());
                            echo '</ul>';
                    }
                    else{
                        echo '<p><ul><li> Recherche Vide</li></ul></p>';
                    }
                }
                
                ?>
            </article>
            </section>
        <section>
           
            <article>
            
            <h2 id='rech'>Aliment contenant "<?php echo $recherche;?> " :</h2>

                
                <?php
                if(!empty($rechercheAlimentsRequete)){
                    if($aliments = $rechercheAlimentsRequete->fetch()){
                        echo '<ul>';
                        do
                    {
                    
                        echo '<li>' . $aliments['nomAliment'] .'</li>';
                    }while($aliments = $rechercheAlimentsRequete->fetch());
                            echo '<ul>';
                    }
                    else{
                        echo '<p><ul><li> Recherche Vide</li></ul></p>';
                    }
                }
                ?>
            </article>
        </section>
       
            </form>
         
 </body>
</html>
 
        
           
    
