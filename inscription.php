<html>
  <head>
    <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
  </head>
  <body>
    <div id="container">
      <!-- zone de connexion -->
 <!-- manque le bouton d'inscription -->
 <form action="verification.php" method="POST">
        <fieldset>
        <legend>Inscription</legend>
 
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom" required>
        <br>
        <label>Prénom</label>
        <input type="text" placeholder="Prénom" name="prenom" required>
        <br>
        <label>Email</label>
        <input type="text" placeholder="Nom" name="nom" required>
        <br>
        <label>Nom d'utilisateur</label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>
        <br>
        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
        <br>
        <input type="submit" id='submit' value='VALIDER' >
        </fieldset>
        </form>
   </div>
 </body>
</html>
        <?php
        /*
          session_start();
          if(isset($_POST['']) && isset($_POST['motDePasse'])){
              // connexion à la base de données
              $db_username = 'root';
              $db_password = 'root';
              $db_name = 'boisson';
              $db_host = 'localhost';
              $db = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
              
              $id = mysqli_real_escape_string($db,htmlspecialchars($_POST['id'])); 
              $motDePasse = mysqli_real_escape_string($db,htmlspecialchars($_POST['motDePasse']));
              $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
              $prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom'])); 
              $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
             
              try
              {
              $req = $db->prepare('INSERT INTO Utilisateur (id, nom, prenom, mail, motDePasse) VALUES(?, ?, ?, ? ,?)');
              $req->execute(array($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'],$_POST['motDePasse']));
            
              }
              catch(Exception $e)
              {
            
              }
         // foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);
          
          mysqli_close($db);
             } // fermer la connexion
        */
        if(isset($_POST['inscription'])){
        $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
        try
        {
        $req = $bdd->prepare('INSERT INTO Utilisateur (id, nom, prenom, mail, motDePasse) VALUES(?, ?, ?, ?, ?)');
        $req->execute(array($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'],$_POST['motDePasse']));
        }
        catch(Exception $e)
        {
            // En cas d'erreur précédemment, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
        }
        ?>
