<?php
session_start();
try{
if(isset($_POST['id']) && isset($_POST['motDePasse'])){
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
    $bdd = new PDO('mysql:host=localhost;dbname=boisson;charset=utf8', 'root', 'root');
   
    $Sql="
        drop DATABASE $db_name;
        CREATE DATABASE $db_name;
        USE $db_name;

        CREATE TABLE Aliment (nomAliment VARCHAR(400)  PRIMARY KEY ,categorie VARCHAR(400)  NOT NULL ,famille VARCHAR(400)  NOT NULL );

        CREATE TABLE Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(4000)  NOT NULL );

        CREATE TABLE Utilisateur (id VARCHAR(400)  PRIMARY KEY , nom VARCHAR(400)  NOT NULL ,prenom VARCHAR(400)  NOT NULL ,mail VARCHAR(400)  NOT NULL ,motDePasse VARCHAR(400) NOT NULL );

        CREATE TABLE Liaison (numAliment VARCHAR(400) PRIMARY KEY , nomAliment VARCHAR(400)  NOT NULL );

        CREATE TABLE Panier (id VARCHAR(400)  PRIMARY KEY , mdp VARCHAR(400)  NOT NULL );";

          //      CREATE TABLE Preparation (preparationAliment VARCHAR(400)  PRIMARY KEY );

    // CREATE TABLE Type (typeNom VARCHAR(400) PRIMARY KEY );
  
	
//foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);
   /* if($_POST['id'] !== "" && $_POST['motDePasse']!== "") {
        $requete = "SELECT count(*) FROM utilisateur where  id = '".$_POST['id']."' and motDePasse = '".$_POST['motDePasse']."' ";
        $exec_requete = mysqli_query($bdd,$requete);
       
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
    }*/
}
else{
    header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
}
catch (Exception $e)
{
        die('Erreur : creation');
}
?>