<?php
    $arch="";
    $arch = fopen ("comandes", "w+");
    fwrite($arch, "");
    fclose($arch);
?>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="CSS/estilsinici.css" rel="stylesheet" type="text/css">
            <link rel="icon" type="image/png" href="IMATGES/favicon.png" />
            <TITLE>Projecte M07</TITLE>
    </head>

    <body>
        <div class="back"></div>
        <div class="INICI">
            <div class="cuadreinici">
                <div class="cuadreinici_1">
                    <h1>INICIAR COM...</h1>
                </div>
                <br><br><br><br>
                <div class="cuadreinici_2">
                    <a href="INICIUSER.html">
                        <img src="IMATGES/user.png">
                        <p class="pinici">USUARI</p>
                    </a>
                </div>
                <div class="cuadreinici_3">
                    <a href="INICIBIBLIOTECARI.html">
                        <img src="IMATGES/admin.png" href="INICIBIBLIOTECARI.html">
                        <p class="pinici">BIBLIOTECARI</p>
                    </a>
                </div>
            </div>
        </div>
    </body>

    </html>