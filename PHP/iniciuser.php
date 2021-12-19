<?php
	$fitxer_usuaris="/var/www/html/Projecte/PHP/usuaris";
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);

			/*if (($_POST['nomsess'] == $logpwd[0])){
				$a = $usuari;
				$nomusu = ($_POST['nomusu']);
				$contra = ($_POST['contra']);
				$nomcom = ($_POST['nomcom']);
				$codpos = ($_POST['codpos']);
				$email = ($_POST['email']);
				$numcon = ($_POST['numcon']);
				$numvis = ($_POST['numvis']);
				$texte="$nomusu:$contra:$nomcom:$codpos:$email:$numcon:$numvis";
				$b = file_get_contents('usuaris');
				$c = preg_replace("/$a/", "$texte", $b); 
				file_put_contents($fitxer_usuaris, $c);
			}*/


		if (($_POST['usuari'] == $logpwd[0]) && ($_POST['ctsnya'] == $logpwd[1])){
			fclose($fitxer);
			session_name($_POST["usuari"]);
			$password = $logpwd[1];
			$user = $logpwd[0];
			$nomcognoms = $logpwd[2];
			session_start();
			break;
		}
	}
	if (($_POST['usuari'] != $logpwd[0]) && ($_POST['ctsnya'] != $logpwd[1])){
		header("Status: 301 Moved Permanently");
		header("Location: ../INICIUSER.html");
		exit;
	}

	$_SESSION['usuario'] = ($_POST['usuari']);
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
			<a href="productesuser.php" class="menu">LLIBRES</a>
			<a href="prestecsuser.php" class="menu">PRESTECS</a>
			<a href="productesuser.php" class="menu">DADES</a>
		</nav>
		<div class="titol">
			<h1 id="h1index">POTTER'S LIBRARY</h1>
		</div>
		<div class="indexdiv1">
			<div class="indexdiv1_1"></div>
			<div class="indexdiv1_2"></div>
			<div class="indexdiv2_1"><a href="productesuser.php" class="h3"><h3>LLibres</h3><a></div>
			<div class="indexdiv2_2"><a href="prestecsuser.php" class="h3"><h3>Prestecs</h3><a></div>
			<div class="indexdiv2_3"><a href="productesuser.php" class="h3"><h3>Llibres</h3><a></div>
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
						$carrer = $dadesusuari[6];
						
						if (session_name() == $nomusuari)
						echo '<p class="pinicisessio">NOM USUARI:</p><br><br><br><h6>'.$nomusuari.'
						</h6><p class="pinicisessio">CONTRASENYA:</p><br><br><br><h6>'.$contrasenyausuari.'
						</h6><p class="pinicisessio">NOM COMPLET:</p><br><br><br><h6>'.$nomcomplet.'
						</h6><p class="pinicisessio">CODI POSTAL:</p><br><br><br><h6>'.$codipostal.'
						</h6><p class="pinicisessio">E-MAIL:</p><br><br><br><h6>'.$email.'
						</h6><p class="pinicisessio">NUMERO DE CONTACTE:</p><br><br><br><h6>'.$numcontacte.'
						</h6><p class="pinicisessio">carrer:</p><br><br><br><h6>'.$carrer.'
						</h6>';
					}
				?>
			</div>
			<div class="indexdiv3_2">
			<form action="cambiardadesuser.php" method="POST">
				<input type="text" id="noV" class="num" name="nomsess" value="<?php echo "".session_name()."";?>">
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
				<p class="pinicisessio">CARRER</p>
				<input type="text" class="num" name="numvis" value="<?php echo "".$logpwd[6]."";?>"><br>
                <input type="submit" class="prestec" value="CANVIAR DADES"><br><br><br>
            </form>
			</div>
		</div>
		<div class="usuaricuadre">
			<form action="http://localhost/Projecte/PHP/logoutuser.php" method="POST">
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
		<div class="usuaricuadreprestec">
            <p class="pinicisessio">LLIBRE DEMANAT:</p>
            <?php
                $fitxer_prestec="/var/www/html/Projecte/PHP/prestec";
                $fc=fopen($fitxer_prestec,"r") or die ("No s'han pogut llegir els prestecs");
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