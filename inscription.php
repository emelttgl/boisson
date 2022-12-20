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
        <h1>Connexion</h1>
 
        <label><b>Nom</b></label>
        <input type="text" placeholder="Nom" name="nom" required>
        <br>
        <label><b>Prénom</b></label>
        <input type="text" placeholder="Prénom" name="prenom" required>
        <br>
        <label><b>Email</b></label>
        <input type="text" placeholder="Nom" name="nom" required>
        <br>
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>
        <br>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
        <br>
        <input type="submit" id='submit' value='INSCRIPTION' >
        <?php
         
        ?>
      </form>
   </div>
 </body>
</html>