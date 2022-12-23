  
<?php
        session_start();
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $db_name = 'boisson';
        

        try{
               
            $dbco = new PDO("mysql:host=$servername", $username, $password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
            $sql = "DROP DATABASE $db_name;
            CREATE DATABASE $db_name;
            USE $db_name;

            CREATE TABLE Aliment (nomAliment VARCHAR(400)  PRIMARY KEY ,categorie VARCHAR(400)  NOT NULL ,famille VARCHAR(400)  NOT NULL );

            CREATE TABLE Recettes (NomCocktail VARCHAR(400)  PRIMARY KEY ,preparation VARCHAR(400)  NOT NULL ,ingredient VARCHAR(4000)  NOT NULL );

            CREATE TABLE Utilisateur (id int(100) AUTO_INCREMENT  PRIMARY KEY , nom VARCHAR(400)  NOT NULL ,prenom VARCHAR(400)  NOT NULL ,mail VARCHAR(400)  NOT NULL ,motDePasse VARCHAR(400) NOT NULL );

            CREATE TABLE Liaison (numAliment int(100) PRIMARY KEY , nomAliment VARCHAR(400)  NOT NULL );

            CREATE TABLE Panier (id VARCHAR(400)  PRIMARY KEY , mdp VARCHAR(400)  NOT NULL );";
            
            $dbco->exec($sql);
                    
            echo 'Base de données créée bien créée !';
            }
                
            catch(PDOException $e){
                echo "Erreur : création de la table " ;
            }
    ?>
 