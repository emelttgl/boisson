
<?php // Création de la base de données 

  function query($link,$requete)
  { 
    $resultat=mysqli_query($link,$requete) or die("$requete : ".mysqli_error($link));
	return($resultat);
  }

  
$mysqli=mysqli_connect('127.0.0.1', 'root', '') or die("Erreur de connexion");
$base="boisson";
$Sql="
DROP DATABASE IF EXISTS $base;
		CREATE DATABASE $base;
		USE $base;

CREATE TABLE Aliment (
    nomAliment String  PRIMARY KEY ,
    preparationAliment String  NOT NULL ,
    type String  NOT NULL ,
   
)

CREATE TABLE  Preparation (
    preparationAliment String  PRIMARY KEY ,
    CONSTRAINT PK_Preparation NOT NULL
);

CREATE TABLE Type (
    typeNom String  PRIMARY KEY,
    CONSTRAINT PK_Type NOT NULL 
);

CREATE TABLE Recettes (
    NomCocktail String  PRIMARY KEY ,
    preparation String  NOT NULL ,
    ingredient String  NOT NULL ,
    
);

CREATE TABLE Utilisateur (
    id String  PRIMARY KEY ,
    nom String  NOT NULL ,
    prenom String  NOT NULL ,
    mail String  NOT NULL ,
    motDePasse String  NOT NULL ,
  
);

CREATE TABLE Liaison (
    nomAliment String  NOT NULL ,
    nomCocktail String  NOT NULL 
);

CREATE TABLE Panier (
    login String  PRMARY KEY ,
    mdp String  NOT NULL ,
);


foreach(explode(';',$Sql) as $Requete) query($mysqli,$Requete);

mysqli_close($mysqli);
?>