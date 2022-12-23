<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
  </head>
  <body>
    <div id="container">

 <form action="" method="POST">
        <fieldset>
        <legend>Inscription</legend>
 
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
        <br>
        <label>Prénom</label>
        <input type="text" placeholder="Prénom" name="prenom" required>
        <br>
        <label>Mail</label>
        <input type="text" placeholder="Mail" name="mail">
        <br>
        <label>Nom d'utilisateur</label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>
        <br>
        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
        <br>
        <input type="submit" id="" name ="Valider" value="VALIDER" >
        </fieldset>
        
        </form>
   </div>
 </body>
            <?php
              
              if(isset($_POST['Valider'])){
                
                try
                {
                  $id=$_POST['id']; 
                  $nom=$_POST['nom']; 
                  $prenom=$_POST['prenom']; 
                  $mail=$_POST['mail']; 
                  $motDePasse=$_POST['motDePasse']; 
                  $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
                  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $req = $bdd->query("INSERT INTO `Utilisateur`(`nom`, `prenom`, `mail`, `motDePasse`) VALUES ('$nom', '$prenom', '$mail', '$motDePasse');");
                  $req->execute();
                  header('Location: connexion.php');
                }
                catch(Exception $e)
                {
                  
                  die('nom d utilisateur est une cle primaire');
                }
              }
        ?>
        
</html>