<?php

require_once __DIR__ . "/../includes/app.php";

use MVC\Router;
use Controllers\PropiedadController;
use Model\Propiedad;

$router = new Router();

//URLS REGISTRADAS
//las funciones vienen del controlador
//debuggear([PropiedadController::class, "index"]);

$router->get("/admin",[PropiedadController::class, "index"]);
$router->get("/propiedades/crear", [PropiedadController::class, "crear"]);
$router->post("/propiedades/crear", [PropiedadController::class, "crear"]);
$router->post("/propiedades/actualizar", [PropiedadController::class, "actualizar"]);
$router->post("/propiedades/eliminar", [PropiedadController::class, "eliminar"]);



$router->comprobarRutas(); //resiva que las rutas esten registrados y el tipo de request

