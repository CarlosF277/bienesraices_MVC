<?php
    if(!isset($_SESSION)){ //revisa si _$SESSION esta definido. si no, arranca sesion para acceder a sus datos
        session_start(); //la sesion tiene que iniciarse siempre para acceder a los datos de $_SESSION
    }

    $auth = $_SESSION["login"] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel ="stylesheet" href="../build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio ? "inicio" : ""; //isset() ?>">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                    <img src="/build/img/logo.svg" alt="logotipo de bienes raices" style="width: 300px">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/admin/index.php">Administrador</a>
                            <a href="/cerrar-sesion.php">Cerrar sesion</a>
                        <?php else: ?>
                            <a href="/login.php">Iniciar sesion</a>
                        <?php endif;?>
                    </nav>
                </div>

            </div> <!--barra-->

            <?php 

                if($inicio){
                    echo "<h1>Venta de departamentos  y casas exclusivos de lujo  </h1>";
                }

            ?>
        </div>
    </header>

    <?php echo $contenido; //aqui se muestra el contenido renderizado

    ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
            
        </div>

        <p class="copyright">
            Todos los derechos reservados <?php echo date("Y"); ?> &copy
        </p>
    </footer>

    <script src="../build/js/app.js"></script>
</body>
</html>
