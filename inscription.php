<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
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
                <li> <input type="search" name="g" placeholder="Rechercher" id="search">  </li>
                </ul>
        </nav>
    <div id="container">

 <form action="" method="POST">
        <fieldset>
        <legend>Inscription</legend>
        <p style='color:white'> ID SE CREER AUTOMATIQUEMENT après le clique sur valider</p>
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
        <br>
        <label>Prénom</label>
        <input type="text" placeholder="Prénom" name="prenom" required>
        <br>
        <label>Mail</label>
        <input type="text" placeholder="Mail" name="mail">
        <br>
        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
        <br>
        <input type="submit" id="valider" name ="Valider" value="VALIDER" >
        </fieldset>
        
        </form>
   </div>
 </body>
            <?php
              session_start();
              if(isset($_POST['Valider'])){
                
                try
                {
                  
                  $nom=$_POST['nom']; 
                  $prenom=$_POST['prenom']; 
                  $mail=$_POST['mail']; 
                  $motDePasse=$_POST['motDePasse']; 
                  $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
                  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $req = $bdd->query("INSERT INTO `Utilisateur`(`nom`, `prenom`, `mail`, `motDePasse`) VALUES ('$nom', '$prenom', '$mail', '$motDePasse');");
                  $recupId = $bdd->query("SELECT id FROM UTILISATEUR WHERE nom = '$nom' and motDePasse = '$motDePasse' ;");
                  $result= $recupId->fetch();
                  $count = $result['id'];
                  $_SESSION['id']= $count;
                  echo 'ID :' . $count;
                  header('Location: connexion.php');
                }
                catch(Exception $e)
                {
                  
                  die('nom d utilisateur est une cle primaire');
                }
              }

        ?>
        
</html>