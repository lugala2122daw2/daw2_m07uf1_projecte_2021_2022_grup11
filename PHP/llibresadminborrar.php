<?php
    session_start();
	echo "Nombre de usuario: " . $_SESSION["usuario"];
	
	$fitxer_llibres="/var/www/html/Projecte/PHP/llibres";
	$fp=fopen($fitxer_llibres,"r+") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_llibres);	
		$llibre = explode(PHP_EOL, fread($fp,$mida_fitxer));
	}
	
	foreach ($llibre as $llibres) {
		$logpwd = explode(":",$llibres);
		if (($_POST['llibreid'] == $logpwd[0])){
			if ("llibreid" != NULL){
			$a = $llibres;
			$b = file_get_contents('llibre');;
			$c = preg_replace("/$a/", '', $b); 
			file_put_contents($fitxer_llibres, $c);
		}
		}
	}	
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
			<a href="interficieadmin.php" class="menu">Pagina Principal</a>
            <a href="llibresadmin.php" class="menu">Llibres</a>
		    <a href="usuarisadmin.php" class="menu">Usuaris</a>
		    <a href="comandesadmin.php" class="menu">Prestecs</a>
		</nav>
        <div class="titolp">
			<h1 id="white">BORRAR PRODUCTES</h1>
        </div>
        <div class="indexdivproductes">
            <form action="" method="POST">
            <br><p id="white" class="pinicisessio">ID LLIBRE A BORRAR</p>
                <input type="text" class="num" name="llibreid" placeholder="ID NUMERIC"><br><br>
                <input type="submit" class="comanda" value="BORRAR"><br><br><br>
            </form>
        </div>
        <div class="usuaricuadre">
			<form action="http://localhost/Projecte/PHP/logoutadmin.php" method="POST">
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