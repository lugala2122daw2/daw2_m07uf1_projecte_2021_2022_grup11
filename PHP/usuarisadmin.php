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
			<a href="" class="menu">Pagina Principal</a>
            <a href="" class="menu">LLibres</a>
            <a href="usuarisadmin.php" class="menu">Usuaris</a>
            <a href="" class="menu">Prestecs</a>
            </nav>
        <div class="titolp">
			<h1 id="white">USUARIS</h1>
		</div>
		<div class="indexdivproductest">
            <div class="productes"></div>
            <div class="productes_1"><a href="" class="h4"><h4>MOSTRAR USUARIS</h4><a></div>
        </div>
        <div class="indexdivproductest">
            <div class="productes1"></div>
            <div class="productes2"></div>
            <div class="productes1_1"><a href="" class="h4"><h4>BORRAR<br>USUARIS</h4><a></div>
            <div class="productes1_2"><a href="" class="h4"><h4>AFEGIR USUARIS</h4><a></div>
        </div>
        <div class="usuaricuadre">
	</div>
     </body>
</html>