<html>
    <head>
        <h1>Boisson</h1>
		<meta charset="UTF-8">
    </head>
    <body>
      <?php
      include 'Donnees.inc.php';
  
    
        print_r($Recettes[0]['titre']);
        echo '<br/>';
        print_r($Recettes[0]['ingredients']);
        echo '<br/>';
        print_r($Recettes[0]['preparation']);
        echo '<br/>';
        for ($j=0; $j <count($Recettes[0]['index']) ; $j++) { 
         
          print_r($Recettes[0]['index'][$j]);
          echo '<br/>';
       
      } 
        
       
      
      ?>
    </body>
</html>