<html>
  <head>
    <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
  </head>
  <body>
    <div id="container">
      <!-- zone de connexion -->
 
      <form action="verification.php" method="POST">
      <fieldset>
        <legend>Connexion</legend>
      
 
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>

        <input type="submit" id='submit' value='CONNEXION' >
        <?php
          if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
          }
        ?>
        </fieldset>
      </form>
   </div>
 </body>
</html>