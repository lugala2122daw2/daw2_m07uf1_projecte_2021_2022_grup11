<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        <link href="../CSS/estilsinterficieuser.css" rel="stylesheet" type="text/css">
        <TITLE>Projecte M07 - UF1</TITLE>
</head>
	<body>
		<div class="back"></div>
		<nav>
			<a href="productesuser.php" class="menu">Llibres</a>
			<a href="prestecsuser.php" class="menu">Prestecs</a>
		</nav>
		<div class="titol">
			<h1 id="h1index">POTTER'S LIBRARY</h1>
		</div>
		<div class="indexdiv1">
			<div class="indexdiv1_1"></div>
			<div class="indexdiv1_2"></div>
			<div class="indexdiv1_3"></div>
			<div class="indexdiv2_1"><a href="productesuser.php" class="h3"><h3>LLIBRES</h3><a></div>
			<div class="indexdiv2_2"><a href="prestecsuser.php" class="h3"><h3>PRESTECS</h3><a></div>
			<div class="indexdiv2_3"><a href="" class="h3"><h3><?php echo "". $_SESSION["usuario"];?></h3><a></div>
		</div>
		<div class="usuaricuadre">
			<form action="http://localhost/Projecte/PHP/logoutuser.php" method="POST">
				<p class="pinicisessio"><?php
				if (!isset($_SESSION["comptador"])) {
					$_SESSION['comptador'] = 1;
					echo "Benvingut " . $_SESSION["usuario"]."<br>";
					echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
					echo "Aquest és el primer accés.<br>";			 
				}	
				else{
					$_SESSION["comptador"] += 1;
					echo "Benvingut " . $_SESSION["usuario"]."<br>";
					echo "Visites web: " . $_SESSION["comptador"] . " durant aquesta sessió.<br>";
					echo "Ultima visita: " . $_SESSION["data_darrer_acces"] . ".<br>";
				}
				date_default_timezone_set('Europe/Andorra');
				$_SESSION['data_darrer_acces'] = date('d/m/Y h:i:s');
			?></p>
				<input id="noV" type="user" name="usuari" value="<?php echo "". $_SESSION["usuario"]."";?>">
				<input id="noV" type="password" name="ctsnya" value="<?php echo "".$password."";?>">
				<input type="submit" value="LOG OUT">
			</form>
		</div>
		<div class="usuaricuadreprestec">
            <p class="pinicisessio">LLIBRES DEMANATS:</p>
            <?php
                $fitxer_prestec="/var/www/html/Projecte/PHP/prestec";
                $fc=fopen($fitxer_prestec,"r") or die ("No s'ha pogut llegir els prestecs");
                if ($fc) {
                    $mida_fitxerc=filesize($fitxer_prestec);	
                    $prestecs = explode(PHP_EOL, fread($fc,$mida_fitxerc));
                }
            ?>
            <?php 
                foreach ($prestecs as $productec) {
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