<?php

$db_username = 'root';
$db_password = 'root';
$db_name = 'boisson';
$db_host = 'localhost';

try{
    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $NomCocktail = $bdd->query("SELECT distinct(NomCocktail) FROM Recettes ;");
    $aliment = $bdd->query("SELECT nomAliment FROM Aliment ;");

    if(($NomCocktail === false) || ($NomCocktail === false)){
        die("Erreur");
       }
}
catch (PDOException $e){
    echo $e->getMessage();
}

if(isset($_POST['aliment']))
     {
           echo htmlentities($_POST['aliment']);
     }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="icon" type="image/png" href="image/logo.png"/>
        <title> ></title>
    </head>
    <body>
    <!--<img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/>-->
         <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="">ACCUEIL</a></li>
                <li><a href="">RECETTES</a>
                    <ul>
				        <li><a href="#">Drop 1</a></li>
				        <li><a href="#">Drop 2</a></li>
				        <li><a href="#">Drop 3</a></li>
			        </ul>
                </li>

                <li><a href="">MES RECETTES PREFEREES</a></li>
                <li><a href="">PANIER</a></li>
                <li><form>
                        <input type="search" name="g" placeholder="Rechercher" id="search">  
                </form></li>
                
                </ul>
        </nav>
        <div class="NomCocktail">
        <?php 
                            
                while($rowf = $NomCocktail->fetch(PDO::FETCH_ASSOC)){
         ?>
        <div id="nomcocktail" name="NomCocktail" value="<?php echo strtolower($rowf['NomCocktail']); ?>"><?php echo htmlspecialchars($rowf['NomCocktail']); ?></br></div>
                        
        <?php
                }
                          
        ?>
       </div>
    </body>
</html>