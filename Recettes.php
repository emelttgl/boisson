<?php
session_start();

$db_username = 'root';
$db_password = 'root';
$db_name = 'boisson';
$db_host = 'localhost';

try{
    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $NomCocktail = $bdd->query("SELECT distinct(NomCocktail) FROM Recettes ;");
    $idCocktail = $bdd->query("SELECT distinct(idRecette) FROM Recettes ;");
    $idCocktail2 = $bdd->query("SELECT distinct(idRecette) FROM Recettes ;");
    $NomCocktail2 = $bdd->query("SELECT distinct(NomCocktail) FROM Recettes ;");
  
  
    if(($NomCocktail === false) && ($idCocktail === false)){
        die("Erreur");
    }

    while($rowa = $idCocktail2->fetch(PDO::FETCH_ASSOC)){
        $val = htmlspecialchars($rowa['idRecette']);
        
        if(isset($_POST[$val]) && isset($_SESSION['id'])){
            //echo htmlspecialchars($rowf['NomCocktail']);
           // echo 'ici';
            $id=$_SESSION['id'];
            //echo  $val;
            $Nom= $bdd->query("SELECT NomCocktail FROM Recettes Where idRecette = '$val' ;");
            $result= $Nom->fetch(PDO::FETCH_ASSOC);
            $cocktail =htmlspecialchars($result['NomCocktail']);
            //echo $cocktail;
            $req = $bdd->query("INSERT INTO `Panier`(idUsers, nomCocktail) VALUES ('$id', '$cocktail');");
        }

    }
}
catch(Exception $e){
            
    die($e->getMessage());
}

            
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="icon" type="image/png" href="image/logo.png"/>
        <title> WeDrink/Recettes</title>
    </head>
    <body>
    <!--<img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/>-->
    <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="Accueil.php">ACCUEIL</a></li>
                <li><a href="Famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="RecettePreferees.php">MES RECETTES PRÉFÉRÉES</a></li>
                <li><a href="Rechercher.php">RECHERCHER</a></li>
                <li><a href="MonCompte.php"> MON COMPTE</a><img src="image/icon.png" alt="Logo_page" title="Accueil" id="icon1" /></li>
              </ul>
        </nav>
        
        <form method="POST"  name="ajouter" id ="ajouter"action="Recettes.php">
        <h2 id="fami"> Les Recettes </h2>
        <div class="NomCocktail">
        
        <?php 
        if(empty($_SESSION['id'])){
            echo"UNE INSCRIPTION EST NECESSAIRE!!!";
            ?><a id="inscription" href="inscription.php"><button>S'inscrire</button></a> <?php 
        }
                          
            while($rowf = $NomCocktail->fetch(PDO::FETCH_ASSOC) ){
                $rowi = $idCocktail->fetch(PDO::FETCH_ASSOC)
                
         ?>
        
        <div id="nomcocktail" name="NomCocktail" value="<?php echo strtolower($rowf['NomCocktail']); ?>">
        
        <?php echo htmlspecialchars($rowf['NomCocktail']); ?>
        <?php if(strtolower($rowf['NomCocktail'])=="black velvet"){
            echo '</br><img id="blackvelvet" src="Photos/Black_velvet.jpg" border="0" />';
           
        }
           else if(strtolower($rowf['NomCocktail'])=="bloody mary"){
            echo '</br><img id="bloodymary" src="Photos/Bloody_mary.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="bora bora"){
            echo '</br><img id="borabora" src="Photos/Bora_bora.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="builder"){
            echo '</br><img id="builder" src="Photos/Builder.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="caïpirinha"){
            echo '</br><img id="caipirinha" src="Photos/Caipirinha.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="coconut kiss"){
            echo '</br><img id="cocokiss" src="Photos/Coconut_kiss.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="cuba libre"){
            echo '</br><img id="cubalibre" src="Photos/Cuba_libre.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="frosty lime"){
            echo '</br><img id="frostylime" src="Photos/Frosty_lime.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="le vandetta"){
            echo '</br><img id="levandetta" src="Photos/Le_vandetta.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="margarita"){
            echo '</br><img id="margarita" src="Photos/Margarita.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="mojito"){
            echo '</br><img id="mojito" src="Photos/Mojito.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="piña colada"){
            echo '</br><img id="pinacolada" src="Photos/Pina_colada.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="raifortissimo"){
            echo '</br><img id="raifortissimo" src="Photos/Raifortissimo.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="sangria sans alcool"){
            echo '</br><img id="sangria" src="Photos/Sangria_sans_alcool.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="screwdriver"){
            echo '</br><img id="screwdriver" src="Photos/Screwdriver.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="shoot up"){
            echo '</br><img id="shootup" src="Photos/Shoot_up.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="tequila sunrise"){
            echo '</br><img id="tequila" src="Photos/Tequila_sunrise.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['NomCocktail'])=="ti punch"){
            echo '</br><img id="tipunch" src="Photos/Tipunch.jpg" border="0" /> ';
        }else{
            echo '</br><img id="logo3" src="image/logo.png" border="0" /> ';
        }

       $val = htmlspecialchars($rowi['idRecette']); 
       //echo $val;
    ?>  
             </br>
            <button type=submit name="<?php echo $val; ?>"title ="Ajouter" >    
            <img id="favoris" src="image/favoris.png" />

    </button>
    
                                      
        </br>
       
        </div>
        
        <?php
            }
        

        ?>
    
       </div>
       
       </form>
    </body>
</html>