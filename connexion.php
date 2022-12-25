<html>
  <head>
    <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
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
                <li> <input type="search" name="g" placeholder="Rechercher" id="search">   </li>
                </ul>
        </nav>
    
    <div id="container">
      <!-- zone de connexion -->
 
      <form action="" method="POST">
      <fieldset>
        <legend>Connexion</legend>
      

 
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer votre ID" name="id" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>

        <input type="submit" id='submit' name ='connexion' value='CONNEXION' >
        <?php

          session_start();
          $id=$_SESSION['id']; 
          echo "</br> VOICI VOTRE ID : $id";
            if(isset($_POST['connexion'])){
              try{
                $id=$_POST['id'];  
                $motDePasse=$_POST['motDePasse']; 
                $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req = $bdd->query("SELECT COUNT(*) as Nb FROM UTILISATEUR WHERE id = '$id' AND motDePasse = '$motDePasse' ;");
                $result= $req->fetch();
                $count = $result['Nb'];
                if($count!=0){ // nom d'utilisateur et mot de passe correctes
        
                  $_SESSION['id'] = $id;
                  header('Location: principale.php');
                }
                else{
                  
                  echo "<p style='color:red'>Utilisateur ou mot de passe incorrect !</p>";
                }
              }
              catch(Exception $e){
                  die('nom d utilisateur est une cle primaire');
              }
         
            }
        
        ?>
        </fieldset>
      </form>
   </div>
 </body>
</html>