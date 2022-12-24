<?php

$db_username = 'root';
$db_password = 'root';
$db_name = 'boisson';
$db_host = 'localhost';

try{
    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $famille = $bdd->query("SELECT distinct(famille) FROM Aliment ;");
    $aliment = $bdd->query("SELECT nomAliment FROM Aliment ;");

    if(($famille === false) || ($aliment === false)){
        die("Erreur");
       }
}
catch (PDOException $e){
    echo $e->getMessage();
}

if(isset($_POST['aliment']))
     {
           echo htmlentities($_POST['aliment']);
     }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> ></title>
    </head>
    <body>
    <form method="POST" action="aliment.php">
    <section>
        <article>
            <div id=famille>
                       

                <h2>Famille</h2>
                <form method="POST" action="" name="famille">
                <select name='famille' id='familles'>
                        
                    <option selected="selected">Sélectionner une famille d'aliment</option>
                        <?php 
                            
                            while($rowf = $famille->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option name="famille" value="<?php echo strtolower($rowf['famille']); ?>"><?php echo htmlspecialchars($rowf['famille']); ?></option>
                        
                        <?php
                            }
                          
                        ?>

                        <?php 
                            
                          
                        ?>
<h1>
    <script>
var selectElmt = document.getElementById("familles");
var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;
var textselectionne = selectElmt.options[selectElmt.selectedIndex].text;
document.write("textselectionne")
</script></h1>
                          </select>
                </ul>
            </div>
        </article>
        </section>
        <input type="submit" id="" name ="Valider" value="VALIDER" >
    
    </form>
    
    <section>
        <article>
            <div id=aliment>
                <h2>Aliment</h2>
                <select >
                    <option selected="selected">Sélectionner un Aliment</option>
                        <?php
                        
                            $alimentF = $bdd->query("SELECT nomAliment FROM Aliment WHERE  ;");
                            while($rowa = $aliment->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo strtolower($rowa['nomAliment']); ?>"><?php echo htmlspecialchars($rowa['nomAliment']); ?></option>
                        <?php
                            }
                        ?>


                     </select>
                </ul>
            </div>
        </article>

    </section>


    <!-- PIED DE PAGE -->
    <footer>
      <!--  <p><a href="index.php" id="lien_page_principale">Revenir à la page principale</a></p>-->
    </footer>




</body>
</html>
