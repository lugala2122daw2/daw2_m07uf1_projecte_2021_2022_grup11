<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        <link href="../CSS/estilsinterficieadmin.css" rel="stylesheet" type="text/css">
        <TITLE>Projecte M07 - UF1</TITLE>
</head>
	<body>
	  <div class="back"></div>
	  <nav>
        <a href="llibresadmin.php" class="menu">Llibres</a>
		<a href="usuarisadmin.php" class="menu">Usuaris</a>
	</nav>
	  <div class="titol">
		<h1 id="h1index">POTTER'S LIBRARY</h1>
	</div>
	<div class="indexdiv1">
			<div class="indexdiv1_1"></div>
			<div class="indexdiv1_2"></div>
			<div class="indexdiv1_3"></div>
			<div class="indexdiv2_1"><a href="llibresadmin.php" class="h3"><h3>LLIBRES</h3><a></div>
			<div class="indexdiv2_2"><a href="usuarisadmin.php" class="h3"><h3>USUARIS</h3><a></div>
			<div class="indexdiv2_3"><a class="h3"><h3>Construyendo...</h3><a></div>
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
	</body>
</html>
