<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Recherche</title>
  </head>
  <?php
    session_start();
    if(isset($_POST['famille'])){
        $choix = $_POST['famille'];
        echo $choix;
    }

  
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';        
   
    try{
        $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $famille = $bdd->query("SELECT distinct(famille) FROM Aliment ;");
        $aliment = $bdd->query("SELECT distinct(nomAliment) FROM Aliment ;");
        $NomCocktail = $bdd->query("SELECT distinct(NomCocktail) FROM Recettes ;");
        $ingredient = $bdd->query("SELECT distinct(ingredient) FROM Recettes ;");
        
        if(($famille === false) || ($aliment === false) || ($NomCocktail === false) ){
            die("Erreur");
        }
        if(isset($GET['g'] )){
            $recherche=htmlspecialchars($GET['s']);
            $ingredient = $bdd->query("SELECT distinct(nomAliment) FROM Aliment WHERE nomAliment LIKE "%'.$recherche.'%"");

        }
    }
    catch (PDOException $e){
    
        echo $e->getMessage();
    }

?>
  <body>
  <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="principale.php">ACCUEIL</a></li>
                <li><a href="famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="RecettePreferees.php">MES RECETTES PRÉFÉRÉES</a></li>
                <li><input type="search" name="g" placeholder="Rechercher" id="search1"><input type="submit" href="Recherche.php" value="Rechercher">  </li>
                </ul>
        </nav>
        <section class="affichercocktail">
            <?php
                if($ingredient->rowCount()>0){
                    
                }else{
                    echo 'recherche non trouvé';
                }
            ?>
</section>   
    <section>
        <h2> FAMILLE </h2>
        <form method="POST" action="aliment.php">
            <select name="famille" id ="famille"  onchange= "recupIdSelect(this);">
            
            </select> 
            <input type="submit" value="Valider" />
        </form> 
    </section>
         <!--<script>
        function recupIdSelect(elt){
            var element = document.getElementById("famille");
            var textOptSelect = element.options[element.selectedIndex].text;
            document.getElementById('result').innerHTML = textOptSelect;  
        }
        </script> -->        
                 
         
 </body>
</html>
 
        
           
    