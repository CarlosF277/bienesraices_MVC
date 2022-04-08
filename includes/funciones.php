<?php


define("TEMPLATES_URL", __DIR__ ."/templates");
define("FUNCIONES_URL", __DIR__ ."/funciones.php");
define("CARPETAS_IMAGENES", $_SERVER["DOCUMENT_ROOT"] . "/imagenes/");


function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado(){
    session_start();

    if(!$_SESSION["login"]){
        header("Location: /");
    }
}

function debuggear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//escapar y sanitizar html

function sanitiza($html) : string{
    $sanitizado = htmlspecialchars($html);
    return $sanitizado;
}

//Validar tipo de contenido
function validarTipoContent($tipo){ //si no esta en este arreglo el tipo, no se va a ejecutar el codigo
    $tipos = ["vendedor", "propiedad"];

    return in_array($tipo, $tipos);
}

//muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje = "";

    switch($codigo) {

        case 1:
            $mensaje = "Creado Correctamente";
            break;

        case 2:
            $mensaje = "Actualizado Correctamente";
            break;

        case 3:
            $mensaje = "Eliminado Correctamente";
            break;

        default;
            $mensaje = false;
            break;

    }

    return $mensaje;
}