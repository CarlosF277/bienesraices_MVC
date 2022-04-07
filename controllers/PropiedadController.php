<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;


class PropiedadController{

    public static function index(Router $router){ //pasar el objeto del archivo de index a este. la clase Router se le indica para tipar el parametro recibido, instancias de la clase Router
       //En el call_usr_func el $router seria el $this que se le esta pasando en la funcion del archivo de router   call_usr_func([NAMESPACE\"funcion"],$this) =  call_usr_func([Controllers\PropiedadController\"crear"],$router)                               

        //propiedades a pasar
        $propiedades = Propiedad::all();
        $resultado = null;


        $router->render("propiedades/admin",[
            "propiedades" => $propiedades,
            "resultado" => $resultado

        ]);
    }

    public static function crear(){

        echo "crear propiedad";
    }

    public static function actualizar(){

        echo "actualziar propieadd";
    }
}
