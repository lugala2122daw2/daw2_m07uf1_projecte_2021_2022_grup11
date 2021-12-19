<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <FONT FACE="">
        <link href="../CSS/estilsinici.css" rel="stylesheet" type="text/css">
        <TITLE>Projecte M07 - UF1</TITLE>
</head>

<body>
    <div class="back"></div>
    <div class="INICI">
        <div class="cuadreinici">
            <div class="cuadreinici_1">
                <h1><?php echo "S'ha intentat crear l'usuari ".$_POST["usuari"]." <br>";?></h1>
            </div>
            <?php
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
                    echo "Usuario creado con exito!";
                }
                else{ echo "No he podido crearlo, no has puesto todo lo que pedíamos...";
                    die;}
            ?> 
            <form action="http://localhost/Projecte/PHP/iniciuser.php" method="POST">
                <input id="noV" type="user" name="usuari" value="<?php echo "".$user."";?>">
                <input id="noV" type="password" name="ctsnya" value="<?php echo "".$password."";?>">
                <input id="noV" type="user" name="nomcognoms" value="<?php echo "".$nomcognoms."";?>">
                <input id="noV" type="user" name="codipostal" value="<?php echo "".$codipostal."";?>">
                <input id="noV" type="user" name="email" value="<?php echo "".$email."";?>">
                <input id="noV" type="user" name="numcontacte" value="<?php echo "".$numcontacte."";?>">
                <input id="noV" type="user" name="carrer" value="<?php echo "".$carrer."";?>">
                <br><br>
                <input type="submit" value="ACCEDEIX A LA PAGINA">
		    </form>
        </div>
    </div>
</body>
