<?php
session_start();
if(isset($_POST['id']) && isset($_POST['motDePasse'])){
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
    
    $Sql="
        CREATE  IF NOT EXISTS DATABASE $db_name;
        USE $db_name;

        CREATE TABLE Aliment (nomAliment VARCHAR(400)  PRIMARY KEY ,preparationAliment VARCHAR(400)  NOT NULL ,type VARCHAR(400)  NOT NULL );

        CREATE TABLE Preparation (preparationAliment VARCHAR(400)  PRIMARY KEY );

        CREATE TABLE Type (typeNom VARCHAR(400) PRIMARY KEY );

        CREATE TABLE Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(4000)  NOT NULL );

        CREATE TABLE Utilisateur (id VARCHAR(400)  PRIMARY KEY , nom VARCHAR(400)  NOT NULL ,prenom VARCHAR(400)  NOT NULL ,mail VARCHAR(400)  NOT NULL ,motDePasse VARCHAR(400) NOT NULL );

        CREATE TABLE Liaison (nomAliment VARCHAR(400)  NOT NULL , nomCocktail VARCHAR(400)  NOT NULL );

        CREATE TABLE Panier (login VARCHAR(400)  PRIMARY KEY , mdp VARCHAR(400)  NOT NULL );";

            
	
//foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);


    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $id = mysqli_real_escape_string($db,htmlspecialchars($_POST['id'])); 
    $motDePasse = mysqli_real_escape_string($db,htmlspecialchars($_POST['motDePasse']));
    
    if($id !== "" && $motDePasse !== "") {
        $requete = "SELECT count(*) FROM utilisateur where  id = '".$id."' and motDePasse = '".$motDePasse."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        // nom d'utilisateur et mot de passe correctes
        if($count!=0){
            $_SESSION['id'] = $id;
            header('Location: principale.php');}
        else{
            header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }  
    else{
        header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else{
    header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
?>