<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Inscription</title>
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
        <?php
            session_start();
            $db_username = 'root';
            $db_password = 'root';
            $db_name = 'boisson';
            $db_host = 'localhost';        
        
            try{
                $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
                if(!empty($_SESSION['id'])){
                    $id=$_SESSION['id'];
                    $recup = $bdd->query("SELECT * FROM UTILISATEUR WHERE id = '$id' ;");
                    $result= $recup->fetch();
                    $nom=$result['nom']; 
                    $prenom=$result['prenom']; 
                    $mail=$result['mail']; 
                    $motDePasse=$result['motDePasse']; 
                    $sexe=$result['sexe']; 
                    $date_naiss=$result['date_naiss']; 
                    $adresse=$result['adresse']; 
                    $code_postal=$result['code_postal']; 
                    $ville=$result['ville']; 
                    $num=$result['num']; 
                      
                  }
                }
                catch (PDOException $e){
                
                    echo $e->getMessage();
                }
              

        ?>
 <form action="" method="POST">
        <fieldset>
        <legend>Modification(modifier que les champs que vous voulez)</legend>
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
        <br>
        <label>Prénom</label>
        <input type="text" placeholder="Prénom" name="prenom">
        <br>
        <label>Sexe</label>
        <input type="radio" name="sexe" value="f"/> Femme	
        <input type="radio" name="sexe" value="h"/> Homme
        <br>
        <label>Date de naissance</label>
        <input type="date" name="date_naiss" /><br />
        <br>
        <label>Adresse</label>
        <input type="text" placeholder="Adresse" name="adresse">
        <br>
        <label>Code postal</label>
        <input type="text" placeholder="Code postal" name="code_postal">
        <br>
        <label>Ville</label>
        <input type="text" placeholder="Ville" name="ville">
        <br>
        <label>Numéro</label>
        <input type="text" placeholder="Numéro" name="numero">
        <br>
        <label>Mail</label>
        <input type="text" placeholder="Mail" name="mail">
        <br>
        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="motDePasse">
        <br>
        <input type="submit" id="valider" name ="Valider" value="VALIDER" >
        </fieldset>
        
        </form>
   </div>
 </body>
           
 <?php
             
              $recup2 = $bdd->query("SELECT * FROM UTILISATEUR WHERE id = '$id' ;");
              $result2= $recup2->fetch();
              $nom2=$result2['nom']; 
              $prenom2=$result2['prenom']; 
              $mail2=$result2['mail']; 
              $motDePasse2=$result2['motDePasse']; 
              $sexe2=$result2['sexe']; 
              $date_naiss2=$result2['date_naiss']; 
              $adresse2=$result2['adresse']; 
              $code_postal2=$result2['code_postal']; 
              $ville2=$result2['ville']; 
              $num2=$result2['num']; 
              if(isset($_POST['Valider'])&& !empty($_SESSION['id'])){
                
                try
                {
                  
                  $nom=$_POST['nom'];
                  $prenom=$_POST['prenom']; 
                  $mail=$_POST['mail']; 
                  $motDePasse=$_POST['motDePasse']; 
                  $sexe=$_POST['sexe']; 
                  $date_naiss=$_POST['date_naiss']; 
                  $adresse=$_POST['adresse']; 
                  $code_postal=$_POST['code_postal']; 
                  $ville=$_POST['ville']; 
                  $num=$_POST['num'];  
                  if(empty($nom)){
                    $nom=$nom2;
                  }
                  if(empty($prenom)){
                    $prenom=$prenom2;
                  }
                  if(empty($mail)){
                    $mail=$mail2;
                  }
                  if(empty($motDePasse)){
                    $motDePasse=$motDePasse2;
                  }
                  if(empty($sexe)){
                    $sexe=$sexe2;
                  }
                  if(empty($date_naiss)){
                    $date_naiss=$date_naiss2;
                  }
                  if(empty($adresse)){
                    $adresse=$adresse2;
                  }
                  if(empty($code_postal)){
                    $code_postal=$code_postal2;
                  }
                  if(empty($ville)){
                    $ville=$ville2;
                  }
                  if(empty($num)){
                    $num=$nom2;
                  }
                 
                 
                  $req = $bdd->query("UPDATE `Utilisateur` SET `nom`='$nom',`prenom`='$prenom',`sexe`='$sexe',`date_naiss`='$date_naiss',`adresse`='$adresse',`code_postal`='$code_postal',`ville`='$ville',`num`='$num',`mail`='$mail',`motDePasse`='$motDePasse' WHERE id = '$id';");
                  header('Location: Accueil.php');
                }
                catch(Exception $e)
                {
                  
                  die('Erreur de modification');
                }
              }

        ?>
        
</html>
