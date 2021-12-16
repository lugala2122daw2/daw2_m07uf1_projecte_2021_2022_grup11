<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        <link href="../CSS/estilsinterficieadmin.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="IMATGES/favicon.png" />
        <TITLE>Projecte M07 - UF1</TITLE>
</head>
	<body>
	  <div class="back"></div>
	  <nav>
        <a href="productesadmin.php" class="menu">Productes</a>
		<a href="usuarisadmin.php" class="menu">Usuaris</a>
		<a href="comandesadmin.php" class="menu">Comandes</a>
	</nav>
	  <div class="titol">
		<h1 id="h1index">SPORTS KITS SHOP</h1>
	</div>
	<div class="indexdiv1">
			<div class="indexdiv1_1"></div>
			<div class="indexdiv1_2"></div>
			<div class="indexdiv1_3"></div>
			<div class="indexdiv2_1"><a href="productesadmin.php" class="h3"><h3>PRODUCTES</h3><a></div>
			<div class="indexdiv2_2"><a href="usuarisadmin.php" class="h3"><h3>USUARIS</h3><a></div>
			<div class="indexdiv2_3"><a href="comandesadmin.php" class="h3"><h3>COMANDES</h3><a></div>
		</div>
	<div class="usuaricuadre">
		<form action="http://localhost/Projecte/PHP/logoutadmin.php" method="POST">
			<p class="pinicisessio"><?php
			if (!isset($_SESSION["comptador"])) {
				 $_SESSION['comptador'] = 1;
				 echo "Benvingut " .session_name()."<br>";
				 echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
				 echo "Aquest és el primer accés.<br>";			 
			}	
			else{
				 $_SESSION["comptador"] += 1;
				 echo "Benvingut " .session_name()."<br>";
				 echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
				 echo "Ultima visita: " . $_SESSION["data_darrer_acces"] . ".<br>";
			}
			date_default_timezone_set('Europe/Andorra');
			$_SESSION['data_darrer_acces'] = date('d/m/Y h:i:s');
		?></p>
			<input id="noV" type="user" name="usuari" value="<?php echo "".session_name()."";?>">
			<input id="noV" type="password" name="ctsnya" value="<?php echo "".$password."";?>">
			<input type="submit" value="LOG OUT">
		</form>
	</div>
	<div class="usuaricuadrecomandes">
            <p class="pinicisessio">PRODUCTES A LA COMANDA:</p>
            <?php
                $fitxer_comandes="/var/www/html/Projecte/PHP/comandes";
                $fc=fopen($fitxer_comandes,"r") or die ("No s'ha pogut llegir les comandes");
                if ($fc) {
                    $mida_fitxerc=filesize($fitxer_comandes);	
                    $comandes = explode(PHP_EOL, fread($fc,$mida_fitxerc));
                }
            ?>
            <?php 
                foreach ($comandes as $productec) {
                    $dadesproductec = explode(":",$productec);
                    $producteidc = $dadesproductec[0];
                    $productenomc = $dadesproductec[1];
                    $productepreuc = $dadesproductec[2];
                    $productetipusc = $dadesproductec[3];
                    echo '<p id="llista" class="pinicisessio">'.$productenomc.' | '.$productepreuc.''; 
                }
                ?>
        </div>
	</body>
</html>
