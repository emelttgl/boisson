<?php
session_start();

$db_username = 'root';
$db_password = 'root';
$db_name = 'boisson';
$db_host = 'localhost';
if(isset($_SESSION['id'])){
try{

    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $NomCocktail = $bdd->query("SELECT distinct(nomCocktail) FROM Panier ;");

    
}
catch(Exception $e){
            
    die($e->getMessage());
}

}         
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link rel="icon" type="image/png" href="image/logo.png"/>
        <title> WeDrink/RecettesPreferees</title>
    </head>
    <body>
    <!--<img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/>-->
    <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="principale.php">ACCUEIL</a></li>
                <li><a href="famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="RecettePreferees.php">MES RECETTES PRÉFÉRÉES</a></li>
                <li><input type="search" name="g" placeholder="Rechercher" id="search">  </li>
                </ul>
        </nav>
        <form method="POST"  name="ajouter" id ="ajouter"action="Recettes.php">
        
        <div class="NomCocktail">
       
        <?php 
        if(!isset($_SESSION['id'])){
            echo"UNE INSCRIPTION EST NECESSAIRE!!!";
            ?><a id="inscription" href="inscription.php"><button>INSCRIPTION</button></a> <?php 
        }
                            
            while($rowf = $NomCocktail->fetch(PDO::FETCH_ASSOC) ){
               
                
         ?>
        
        <div id="nomcocktail" name="nomCocktail" value="<?php echo strtolower($rowf['nomCocktail']); ?>">
        
        <?php echo htmlspecialchars($rowf['nomCocktail']); ?>
        <?php if(strtolower($rowf['nomCocktail'])=="black velvet"){
            echo '<img id="blackvelvet" src="Photos/Black_velvet.jpg" border="0" />';
           
        }
           else if(strtolower($rowf['nomCocktail'])=="bloody mary"){
            echo '</br><img id="bloodymary" src="Photos/Bloody_mary.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="bora bora"){
            echo '</br><img id="borabora" src="Photos/Bora_bora.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="builder"){
            echo '</br><img id="builder" src="Photos/Builder.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="caïpirinha"){
            echo '</br><img id="caipirinha" src="Photos/Caipirinha.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="coconut kiss"){
            echo '</br><img id="cocokiss" src="Photos/Coconut_kiss.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="cuba libre"){
            echo '</br><img id="cubalibre" src="Photos/Cuba_libre.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="frosty lime"){
            echo '</br><img id="frostylime" src="Photos/Frosty_lime.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="le vandetta"){
            echo '</br><img id="levandetta" src="Photos/Le_vandetta.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="margarita"){
            echo '</br><img id="margarita" src="Photos/Margarita.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="mojito"){
            echo '</br><img id="mojito" src="Photos/Mojito.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="piña colada"){
            echo '</br><img id="pinacolada" src="Photos/Pina_colada.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="raifortissimo"){
            echo '</br><img id="raifortissimo" src="Photos/Raifortissimo.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="sangria sans alcool"){
            echo '</br><img id="sangria" src="Photos/Sangria_sans_alcool.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="screwdriver"){
            echo '</br><img id="screwdriver" src="Photos/Screwdriver.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="shoot up"){
            echo '</br><img id="shootup" src="Photos/Shoot_up.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="tequila sunrise"){
            echo '</br><img id="tequila" src="Photos/Tequila_sunrise.jpg" border="0" /> ';
        }
            else if(strtolower($rowf['nomCocktail'])=="ti punch"){
            echo '</br><img id="tipunch" src="Photos/Tipunch.jpg" border="0" /> ';
        }else{
            echo '</br><img id="logo3" src="image/logo.png" border="0" /> ';
        }

       
    ?>  
            
       
     </div>
        
        <?php
            }
        

        ?>
    
       </div>
       
       </form>
    </body>
</html>