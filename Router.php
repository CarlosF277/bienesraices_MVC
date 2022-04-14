<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    //pasa la url y una funcion asociada para registrarlas
    public function get($url, $fn){ 

        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){ 

        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){

        //verifica si el acceso esta autenticado
        session_start();

        $auth = $_SESSION["login"] ?? null;

        //Arreglo de rutas protegidas
        $rutas_protegidas = ["/admin", "/propiedades/crear", "/propiedades/actualizar",
        "/propiedades/eliminar", "/vendedores/crear", "/vendedores/actualizar", "/vendedores/eliminar"];



        $urlActual = $_SERVER["PATH_INFO"] ?? "/"; //para las demas paginas. si esta en la principal asigna /
    
        $metodo = $_SERVER["REQUEST_METHOD"];

        //proteger las rutas. revisa si el elemento protegido esta en el array
        if(in_array($urlActual, $rutas_protegidas) && !$auth){ //busca /admin en el arreglo de rutas protegidas y si el usuario no esta auneticasdo

            //envia al home
            header("Location: /");
        }

        

       if($metodo === "GET"){
           $fn = $this->rutasGET[$urlActual] ?? NULL; //si noe xsite la pagina asociada, asgina null
       }
       else{
           $fn = $this->rutasPOST[$urlActual] ?? NULL;
       }

       

       if($fn){
           //La URL existe y hay una funcion asociada
           //call_user_func($fn); //manda a llamar una funcion cuando no se sabe como se llama. en $this serian los parametros a pasar a la funcion
            call_user_func($fn,$this);

               }
       else{
           echo "La pagina no existe";
       }

    }

    //Muestra una vista de forma dinamica

    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value; //$$variable de variable, mantiene el nombre pero no pierde valor
        }
        
    
        ob_start(); //inicia un almacenamiento en memoria
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); //Limpia el buffer y lo coloca en esta variable

        include __DIR__ . "/views/layout.php";
    }

}



