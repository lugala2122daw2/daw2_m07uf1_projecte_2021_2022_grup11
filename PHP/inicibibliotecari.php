<?php
	$fitxer_usuaris="/var/www/html/Projecte/PHP/usuarisadmin";
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);
		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['ctsnya'] == $logpwd[1])){
			fclose($fitxer);
			session_name($_POST["usuari"]);
			$password = ($_POST['ctsnya']);
			session_start();
			break;
		}
	}
	if (($_POST['usuari'] != $logpwd[0]) && ($_POST['ctsnya'] != $logpwd[1])){
		header("Status: 301 Moved Permanently");
		header("Location: ../INICIBIBLIOTECARI.html");
		exit;
	}
	$_SESSION['usuario'] = ($_POST['usuari']);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        <link href="../CSS/estilsinterficieadmin.css" rel="stylesheet" type="text/css">
        <TITLE>Projecte M07</TITLE>
</head>
	<body>
	  <div class="back"></div>
	  <nav>
        <a href="productesadmin.php" class="menu">Llibres</a>
		<a href="usuarisadmin.php" class="menu">Usuaris</a>
		<a href="" class="menu">Treballadors</a>
	</nav>
	  <div class="titol">
		<h1 id="h1index">Potter's Library</h1>
	</div>
	<div class="indexdiv1">
			<div class="indexdiv1_1"></div>
			<div class="indexdiv1_2"></div>
			<div class="indexdiv1_3"></div>
			<div class="indexdiv2_1"><a href="productesadmin.php" class="h3"><h3>Llibres</h3><a></div>
			<div class="indexdiv2_2"><a href="usuarisadmin.php" class="h3"><h3>Usuaris</h3><a></div>
		</div>
		<div class="indexdiv3">
		<div class="indexdiv3_1">
				<p id="black" class="pinicisessio">DADES DEL TEU USUARI</p>
				<?php
					foreach ($usuaris as $usuari) {
						$dadesusuari = explode(":",$usuari);
						$nomusuari = $dadesusuari[0];
						$contrasenyausuari = $dadesusuari[1];
						$nomcomplet = $dadesusuari[2];
						$codipostal = $dadesusuari[3];
						$email = $dadesusuari[4];
						$numcontacte = $dadesusuari[5];
						$visa = $dadesusuari[6];
						
						if (session_name() == $nomusuari)
						echo '<p class="pinicisessio">NOM USUARI:</p><br><br><br><h6>'.$nomusuari.'
						</h6><p class="pinicisessio">CONTRASENYA:</p><br><br><br><h6>'.$contrasenyausuari.'
						</h6><p class="pinicisessio">NOM COMPLET:</p><br><br><br><h6>'.$nomcomplet.'
						</h6><p class="pinicisessio">CODI POSTAL:</p><br><br><br><h6>'.$codipostal.'
						</h6><p class="pinicisessio">E-MAIL:</p><br><br><br><h6>'.$email.'
						</h6><p class="pinicisessio">NUMERO DE CONTACTE:</p><br><br><br><h6>'.$numcontacte.'
						</h6><p class="pinicisessio">VISA:</p><br><br><br><h6>'.$visa.'
						</h6>';
					}
				?>
			</div>
				</div>
	<div class="usuaricuadre">
		<form action="http://localhost/Projecte/PHP/logoutadmin.php" method="POST">
			<p class="pinicisessio">
	<?php
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
	</body>
</html>
