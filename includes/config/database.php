<?php

function conectarDB() : mysqli{ //se le indica que va a retornar una instancia de mysqli
    $db = new mysqli("localhost","root","forza","bienes_raices");

    if(!$db){
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;


}
