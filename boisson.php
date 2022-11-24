<html>
    <head>
        <h1>Boisson</h1>
		<meta charset="UTF-8">
    </head>
    <body>
      <?php
      include 'Donnees.inc.php';
  
      for ($i=0; $i <count($Recettes) ; $i++) { 
        print_r($Recettes[$i]['titre']);
        echo '<br/>';
        print_r($Recettes[$i]['ingredients']);
        echo '<br/>';
        print_r($Recettes[$i]['preparation']);
        echo '<br/>';
        for ($j=0; $j <count($Recettes[$i]['index']) ; $j++) { 
         
          print_r($Recettes[$i]['index'][$j]);
          echo '<br/>';
       
      } 
        
       
    }
      ?>
    </body>
</html>