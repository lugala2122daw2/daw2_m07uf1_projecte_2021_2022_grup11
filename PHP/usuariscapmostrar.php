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
			<a href="interficiecap.php" class="menu">Pagina Principal</a>
            <a href="llibrescap.php" class="menu">Llibres</a>
		    <a href="usuariscap.php" class="menu">Usuaris</a>
		    <a href="bibliotecariscap.php" class="menu">Treballadors</a>
		</nav>
        <div class="titolp">
			<h1 id="black">USUARIS REGISTRATS</h1>
        </div>
        <div class="indexdivproductes">
            <?php
                $fitxer_usuaris="/var/www/html/Projecte/PHP/usuaris";
                $fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut llegir els usuaris");
                if ($fp) {
                    $mida_fitxer=filesize($fitxer_usuaris);	
                    $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
                }
            ?>
            
            <?php 
                foreach ($usuaris as $usuari) {
                    $dadesusuari = explode(":",$usuari);
                    $nomusuari = $dadesusuari[0];
                    $contrasenyausuari = $dadesusuari[1];
                    $nomcomplet = $dadesusuari[2];
                    $codipostal = $dadesusuari[3];
                    $email = $dadesusuari[4];
                    $numcontacte = $dadesusuari[5];
                    $carrer = $dadesusuari[6];

                    echo '<br><p class="pinicisessio">NOM USUARI:</p><br><br><br><h6>'.$nomusuari.'
                    </h6><p class="pinicisessio">CONTRASENYA:</p><br><br><br><h6>'.$contrasenyausuari.'
                    </h6><p class="pinicisessio">NOM COMPLET:</p><br><br><br><h6>'.$nomcomplet.'
                    </h6><p class="pinicisessio">CODI POSTAL:</p><br><br><br><h6>'.$codipostal.'
                    </h6><p class="pinicisessio">E-MAIL:</p><br><br><br><h6>'.$email.'
                    </h6><p class="pinicisessio">NUMERO DE CONTACTE:</p><br><br><br><h6>'.$numcontacte.'
                    </h6><p class="pinicisessio">carrer:</p><br><br><br><h6>'.$carrer.'
                    </h6>';
                    echo '<p class="pinicisessio1"> ____________________________________________________________________________________________________________________';
                }
                ?>
                <div class="indexdiv3_2">
			
			</div>
        </div>
        <div class="usuaricuadre">
			<form action="http://localhost/Projecte/PHP/logoutcap.php" method="POST">
				<p class="pinicisessio1"><?php
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