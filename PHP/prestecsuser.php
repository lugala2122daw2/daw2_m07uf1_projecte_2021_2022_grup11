<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];

    $fitxer_prestec="/var/www/html/Projecte/PHP/prestec";
    $fpc=fopen($fitxer_prestec,"r+") or die ("No s'ha pogut validar el prestec");
    if ($fpc) {
        $mida_fitxerc=filesize($fitxer_prestec);	
        $producteprestec = explode(PHP_EOL, fread($fpc,$mida_fitxerc));
    }

    foreach ($producteprestec as $productc) {
        if (($_POST['llibreid']) == $productc){
            $a = $productc;
            $b = file_get_contents('prestec');
            $c = preg_replace("/$a/", '', $b);
            file_put_contents($fitxer_prestec, $c);
        }
    }
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
			<a href="interficieuser.php" class="menu">Pagina Principal</a>
            <a href="productesuser.php" class="menu">Productes</a>
            <a href="dadesuser.php" class="menu">Dades</a>
		</nav>
        <div class="titol">
            <h1>PRESTECS</h1>
        </div>
        <div class="indexdivproductes">

            <?php
                $fitxer_prestec="/var/www/html/Projecte/PHP/prestec";
                $fp=fopen($fitxer_prestec,"r") or die ("No s'ha pogut llegir els prestecs");
                if ($fp) {
                    $mida_fitxer=filesize($fitxer_prestec);	
                    $prestecs = explode(PHP_EOL, fread($fp,$mida_fitxer));
                }
            ?>
            <?php 
                foreach ($prestecs as $producte) {
                    $dadesproducte = explode(":",$producte);
                    $producteid = $dadesproducte[0];
                    $productenom = $dadesproducte[1];
                    $productepreu = $dadesproducte[2];
                    $productetipus = $dadesproducte[3];
                    $botoborrarprestec = '<form action="http://localhost/Projecte/PHP/prestecsuser.php" method="POST">
                                                <input type="text" id="noV" name="llibreid" value="'.$producte.'">
                                             <input class="prestec" type="submit" value="BORRAR PRODUCTE">
                                         </form>';
                    echo '<br><br><br><h2>'.$productenom.'</h2><br><p>'.$productepreu.'</p><br><h6><a href="productesuserbasketball.php" class="tipusproducte">'.$productetipus.'</a></h6><br>'.$botoborrarprestec.''; 
                    
                }
            ?>
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
				<input id="noV" type="user" name="usuari" value="<?php echo "".session_name()."";?>">
				<input id="noV" type="password" name="ctsnya" value="<?php echo "".$password."";?>">
				<input type="submit" value="LOG OUT">
			</form>
        </div>
    </body>
</html>
    