<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController{

    public static function crear(Router $router){

        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor(); //se pasan todos los parametros del objeto vacios

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST["vendedor"]);
        
            //validar que no haya campos vacios
        
            $errores = $vendedor->validar();
        
            //No hay errores
        
            if(empty($errores)){
                $vendedor->guardar();
            }
           }

        $router->render("vendedores/crear",[
            "errores" => $errores,
            "vendedor" => $vendedor
        ]);
    }

    public static function actualizar(Router $router){

        $errores = Vendedor::getErrores();
        $id =validarRedireccionar("/admin");

        //obtener datos del vendedor actualizado

        $vendedor=Vendedor::find($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //asignar los valores
            $args = $_POST["vendedor"];
    
            //sincronizar el objeto en memoria con los datos del usuario
            $vendedor->sincronizar($args);
    
            //validacion
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->guardar();
            }
    
       }

        $router->render("vendedores/actualizar",[
            "errores" => $errores,
            "vendedor" => $vendedor
        ]);
    }
    public static function eliminar(){//No se requiere router por que solo es para rendedizar la vista

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            //valida el id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
            //valida el tipo a eliminar
             $tipo = $_POST["tipo"];
             

             if(validarTipoContent($tipo)){
                 $vendedor = Vendedor::find($id);
                 $vendedor->eliminar();
             }
            }
        }
    }

}