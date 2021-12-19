<?php
    session_start();
    echo "Nombre de usuario: " . $_SESSION["usuario"];
    $filename="/var/www/html/Projecte/PHP/usuaris";
    $fitxer=fopen($filename,"a+") or die ("No s'ha pogut fer el registre");
    $user = ($_POST['usuari']);
    $password = ($_POST['ctsnya']);
    $nomcognoms = ($_POST['nomcognoms']);
    $codipostal = ($_POST['codipostal']);
    $email = ($_POST['email']);
    $numcontacte = ($_POST['numcontacte']);
    $carrer = ($_POST['carrer']);
    $texte="$user:$password:$nomcognoms:$codipostal:$email:$numcontacte:$carrer\n";
    if($user && $password && $nomcognoms && $codipostal && $email && $numcontacte && $carrer){
        fwrite($fitxer,$texte);
        fclose($fitxer);
    }
    
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
			<h1 id="black">AFEGIR USUARIS</h1>
        </div>
        <div class="indexdivproductes">
            <form action="" method="POST">
            <br><p id="white" class="pinicisessio">NOM DE L'USUARI</p>
                <input type="text" name="usuari" placeholder=""><br>
                <p id="white" class="pinicisessio">CONTRASENYA</p>
                <input type="text" name="ctsnya" placeholder="">
                <p id="white" class="pinicisessio">NOM I COGNOMS</p>
                <input type="text" name="nomcognoms" placeholder="">
                <p id="white" class="pinicisessio">CODI POSTAL</p>
                <input type="text" name="codipostal" placeholder=""><br>
                <p id="white" class="pinicisessio">E-MAIL</p>
                <input type="text" name="email" placeholder=""><br>
                <p id="white" class="pinicisessio">NUMERO DE CONTACTE</p>
                <input type="text" name="numcontacte" placeholder=""><br>
                <p id="white" class="pinicisessio">CARRER</p>
                <input type="text" name="carrer" placeholder=""><br>
                <br><br><br>
                <input type="submit" class="comanda" value="AFEGIR"><br><br><br>
            </form>
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