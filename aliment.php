<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Aliment</title>
  </head>
  <?php
    session_start();
  
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';        
    $choixPrecedent='';
    try{
      
        $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $aliment = $bdd->query("SELECT nomAliment FROM Aliment ;");
        if(isset($_POST['famille'])){
            $choixPrecedent = $_POST['famille'];
            $_SESSION['famille']= $choixPrecedent;
            if(isset($_SESSION['categ'])){
               
                $_SESSION['categ']= "";
               
            }    
            
           

            //echo $_SESSION['famille'];
            $aliment = $bdd->query("SELECT nomAliment FROM Aliment WHERE famille='$choixPrecedent' AND categorie LIKE 'sous-categorie';");
            $recette =  $bdd->query("SELECT nomAliment FROM Aliment WHERE famille='$choixPrecedent';");
            
        }
        $famille = $bdd->query("SELECT distinct(famille) FROM Aliment ;");
        
        if(($famille === false) || ($aliment === false) ){
            die("Erreur");
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
     <section>    
     <h2 id="fami"> ALIMENT </h2>
            <form method="POST" action="super_categ.php">
                <select name="aliment" id="aliment" onchange= "recupIdSelect(this);">
                    <?php 
                        while($rowa = $aliment->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                    <option value="<?php echo strtolower($rowa['nomAliment']); ?>"><?php echo htmlspecialchars($rowa['nomAliment']); ?></option>
                    <?php 

                    } ?>
                    
                   
                </select> <input id="valider2" type="submit" value="Valider" />
                <p class="chemin">Voici le chemin : <?php echo $choixPrecedent.'>';?></p>
               
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
 