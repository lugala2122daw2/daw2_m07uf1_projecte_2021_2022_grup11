<?php
	$fitxer_usuaris="/var/www/html/Projecte/PHP/usuaris";
	$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");
	if ($fp) {
		$mida_fitxer=filesize($fitxer_usuaris);	
		$usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
    }
   	foreach ($usuaris as $usuari) {
		$logpwd = explode(":",$usuari);

			if (($_POST['nomsess'] == $logpwd[0])){
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
			}
        }
        header("Status: 301 Moved Permanently");
		header("Location: ../INICIUSER.html");
        exit;
        ?>
