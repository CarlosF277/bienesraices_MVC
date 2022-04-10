<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{

    public static function index(Router $router){ //pasar el objeto del archivo de index a este. la clase Router se le indica para tipar el parametro recibido, instancias de la clase Router
       //En el call_usr_func el $router seria el $this que se le esta pasando en la funcion del archivo de router   call_usr_func([NAMESPACE\"funcion"],$this) =  call_usr_func([Controllers\PropiedadController\"crear"],$router)                               

        //propiedades a pasar
        $propiedades = Propiedad::all();

        //vendedores a pasar

        $vendedores = Vendedor::all();
        $resultado = $_GET["resultado"] ?? null; //placeholder. busca el valor. si no existe le pone null. PARA MOSTRAR MENSJAES CONDICIONALES


        $router->render("propiedades/admin",[
            "propiedades" => $propiedades,
            "resultado" => $resultado,
            "vendedores" =>$vendedores

        ]);
    }

    public static function crear(Router $router){

        //objeto vacio para pasarle los parametros al formulario

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all(); //objeto con todos los vendedores

         //variable de errores vacia para evitar undefined. se llena en el post en caso de presentar un error
        $errores = Propiedad::getErrores();

        //SOPORTE PARA POST

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            /*Crea una nueva instancia */
            $propiedad = new Propiedad($_POST["propiedad"]);

            //generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Set a la imagen
            //Realiza un resize a la imagen con intervention
            

            if($_FILES["propiedad"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                
            }
            //validacion
            $errores = $propiedad->validar();
            

            if(empty($errores)){

                //crear carpeta para subir imagenes
                if(!is_dir(CARPETAS_IMAGENES)){
                mkdir(CARPETAS_IMAGENES);
                }

                /*Subida de archivos*/
                //guarda la imagen en el servidor
                $image->save(CARPETAS_IMAGENES . $nombreImagen);

                //guarda en la base de datos
                $resultado = $propiedad->guardar();
   
             }
        }

        $router->render("propiedades/crear",[
            "propiedad" => $propiedad,
            "vendedores" => $vendedores,
            "errores" => $errores
        ]
        );
    }

    public static function actualizar(Router $router){

        $id = validarRedireccionar("/admin");

        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores = Vendedor::all(); //objeto con todos los vendedores

         //Ejecutar el codigo despues de que el usuario envia el formulario
        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //asignar los atributos en el arreglo args
            $args = $_POST["propiedad"];
            
            $propiedad->sincronizar($args);
        
            //Validacion
            $errores = $propiedad->validar();
        
            //Subida de archivos
        
            //generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            if($_FILES["propiedad"]["tmp_name"]["imagen"]){
            $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }
        
            if(empty($errores)){
            
            if($_FILES["propiedad"]["tmp_name"]["imagen"]){
            //Almacenar la imagen
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
                //Almacenar imagen 
            }
            $propiedad->guardar();
            
            }
        }

        $router->render("/propiedades/actualizar", [
            "propiedad" => $propiedad,
            "errores" => $errores,
            "vendedores" => $vendedores
        ]);
    }

    public static function eliminar(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){


            //VALIDAR ID
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id){
              $tipo = $_POST["tipo"];
              
              if(validarTipoContent($tipo)){
                //Compara lo que vamos a eliminar
                    //elimina el archivo
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                
        
              } 
            }
        
          }
    }
}
