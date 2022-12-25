<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
  </head>
  <?php
    session_start();
  
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';        
   
    try{
        $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $aliment = $bdd->query("SELECT nomAliment FROM Aliment ;");
        $famille = $bdd->query("SELECT distinct(famille) FROM Aliment ;");
        
        if(isset($_POST['aliment'])){
            $choixPrecedent = $_POST['aliment'];
            echo $choixPrecedent;
            $famille = $bdd->query("SELECT famille FROM Aliment WHERE famille='$choixPrecedent';");
            $result= $famille->fetch();
            $count = $result['famille'];
            //id($count!==0){
               // $aliment = $bdd->query("SELECT nomAliment FROM Aliment WHERE famille='$choixPrecedent';");
            //}
           
        }
       
        if(($famille === false) || ($aliment === false) ){
            die("Erreur");
        }
    }
    catch (PDOException $e){
    
        echo $e->getMessage();
    }
?>
  <body>
  <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="principale.php">ACCUEIL</a></li>
                <li><a href="famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="">MES RECETTES PRÉFÉRÉES</a></li>
                <li><a href="">PANIER</a></li>
                <li><input type="search" name="g" placeholder="Rechercher" id="search">  </li>
                </ul>
        </nav>
     <section>    
        <h2> SUPER_CATEGORIE </h2>
            <form method="POST" action="">
                <select name="categ" id="categ" onchange= "recupIdSelect(this);">
                    <?php 
                        while($rowa = $aliment->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                    <option value="<?php echo strtolower($rowa['nomAliment']); ?>"><?php echo htmlspecialchars($rowa['nomAliment']); ?></option>
                    <?php 
                 
                    } ?>
                </select> 
                <input type="submit" value="Valider" />
            </form>
    </section>
         <!--<script>
        function recupIdSelect(elt){
            var element = document.getElementById("famille");
            var textOptSelect = element.options[element.selectedIndex].text;
            document.getElementById('result').innerHTML = textOptSelect;  
        }
    </script> -->        
         
 </body>
</html>
 