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
			<a href="interficieadmin.php" class="menu">Pagina Principal</a>
            <a href="" class="menu">Productes</a>
		    <a href="usuarisadmin.php" class="menu">Usuaris</a>
		    <a href="" class="menu">Comandes</a>
		</nav>
        <div class="titolp">
			<h1 id="white">USUARIS REGISTRATS</h1>
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
                    $visa = $dadesusuari[6];

                    echo '<br><p class="pinicisessio">NOM USUARI:</p><br><br><br><h6>'.$nomusuari.'
                    </h6><p class="pinicisessio">CONTRASENYA:</p><br><br><br><h6>'.$contrasenyausuari.'
                    </h6><p class="pinicisessio">NOM COMPLET:</p><br><br><br><h6>'.$nomcomplet.'
                    </h6><p class="pinicisessio">CODI POSTAL:</p><br><br><br><h6>'.$codipostal.'
                    </h6><p class="pinicisessio">E-MAIL:</p><br><br><br><h6>'.$email.'
                    </h6><p class="pinicisessio">NUMERO DE CONTACTE:</p><br><br><br><h6>'.$numcontacte.'
                    </h6><p class="pinicisessio">VISA:</p><br><br><br><h6>'.$visa.'
                    </h6>';
                    echo '____________________________________________________________________________________________________________________';
                }
                ?>
                <div class="indexdiv3_2">
			<form action="cambiardadesadmin.php" method="POST">
				<br><p class="pinicisessio">NOM DE L'USUARI</p>
                <input type="text" class="num" name="nomusu" value="<?php echo "".$user."";?>"><br>
                <p class="pinicisessio">CONTRASENYA</p>
                <input type="text" name="contra" value="<?php echo "".$password."";?>"><br>
                <p class="pinicisessio">NOM COMPLET</p>
                <input type="text" class="num" name="nomcom" value="<?php echo "".$nomcognoms."";?>"><br>
				<p class="pinicisessio">CODI POSTAL</p>
				<input type="text" class="num" name="codpos" value="<?php echo "".$logpwd[3]."";?>"><br>
				<p class="pinicisessio">E-MAIL</p>
				<input type="text" class="num" name="email" value="<?php echo "".$logpwd[4]."";?>"><br>
				<p class="pinicisessio">NUMERO DE CONTACTE</p>
				<input type="text" class="num" name="numcon" value="<?php echo "".$logpwd[5]."";?>"><br>
				<p class="pinicisessio">VISA</p>
				<input type="text" class="num" name="numvis" value="<?php echo "".$logpwd[6]."";?>"><br>
                <input type="submit" class="prestec" value="CANVIAR DADES"><br><br><br>
            </form>
			</div>
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