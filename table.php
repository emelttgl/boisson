
<?php // Création de la base de données 

define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","root");
define ("DB_DATABASE","boisson");

  function query($link,$requete)
  { 
    $resultat=mysqli_query($link,$requete) or die("$requete : ".mysqli_error($link));
	return($resultat);
  }

  
//$mysqli=mysqli_connect('127.0.0.1', 'root', '') or die("Erreur de connexion");
$mysqli=mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die("Erreur de connexion");
$base="boisson";
$Sql="
DROP DATABASE IF EXISTS $base;
		CREATE DATABASE $base;
		USE $base;

CREATE TABLE Aliment (nomAliment VARCHAR(400)  PRIMARY KEY ,preparationAliment VARCHAR(400)  NOT NULL ,type VARCHAR(400)  NOT NULL );

CREATE TABLE  Preparation ( preparationAliment VARCHAR(400)  PRIMARY KEY );

CREATE TABLE Type (typeNom VARCHAR(400) PRIMARY KEY );

CREATE TABLE Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(400)  NOT NULL );

CREATE TABLE Utilisateur (id VARCHAR(400)  PRIMARY KEY ,nom VARCHAR(400)  NOT NULL ,prenom VARCHAR(400)  NOT NULL ,mail VARCHAR(400)  NOT NULL ,motDePasse VARCHAR(400) NOT NULL );

CREATE TABLE Liaison (   nomAliment VARCHAR(400)  NOT NULL ,nomCocktail VARCHAR(400)  NOT NULL );

CREATE TABLE Panier (login VARCHAR(400)  PRIMARY KEY , mdp VARCHAR(400)  NOT NULL )";


		
	
foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);

mysqli_close($mysqli);
?>