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
			session_start();
			session_unset();
			$cookie_sessio = session_get_cookie_params();
			setcookie(session_name(),'',time() - 86400, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); 
			session_destroy();
			break;
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
      <div class="titol">
		<p class="pinicisessio">LA SESSIÓ DE L'USUARI <?php echo "".session_name()."";?> HA ESTAT FINALITZADA</p>
		<a href="../INICI.php" class="botoproser">TORNAR A L'INICI</a>
      </div>
    </body>
</html>