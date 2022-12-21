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
      <form action="" method="POST">
        <h1>Inscription</h1>
 
        <label><b>Nom</b></label>
        <input type="text" placeholder="Nom" name="nom" required>
        <br>
        <label><b>Prénom</b></label>
        <input type="text" placeholder="Prénom" name="prenom" required>
        <br>
        <label><b>Mail</b></label>
        <input type="text" placeholder="Mail" name="mail" required>
        <br>
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
        <br>
        <input type="submit" name='inscription' value='INSCRIPTION' >

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
