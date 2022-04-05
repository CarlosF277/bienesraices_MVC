<?php

require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";

//conectar a la base de datos. se realiza desde app.php y el objeto resultante se le pasa a la clase de propiedad para
//realizar las demas operaciones. sin volver a conectar cada vez que se declare un objeto 

$db = conectarDB();

use App\ActiveRecord;

//$propiedad = new Propiedad;

ActiveRecord::setDB($db);