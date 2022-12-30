<html>
  <head>
    <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Connexion</title>
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
    
    <div id="container">
      <!-- zone de connexion -->
 
     
        <?php

          session_start();
          $_SESSION['id']=''; 
            if(empty($_SESSION['id'])){
              
                  header('Location: Accueil.php');
                }
            else{
                  
                echo "<p style='color:red'>Erreur de Deconnexion !</p>";
                }
              
        
        ?>
        </fieldset>
      </form>
   </div>
 </body>
</html>
