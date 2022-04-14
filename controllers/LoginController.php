<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){

        $errores = [];

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                //Verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    //Verificar si el usuario existe o no (mensaje de error)
                    $errores = Admin::getErrores();
                }
                else{
                    //Verificar el password
                    $autenciado = $auth->comprobarPassword($resultado);

                    if($autenciado){
                        //Autenticar al usuario
                        $auth->autenticar();
                    } 
                    else{
                        //obtener los errores
                        $errores = Admin::getErrores();
                    }
                    
                }

                


                //autenticar al usuario
            }
        }


        $router->render("auth/login",[
            "errores" => $errores

        ]);

    }

    public static function logout(){

        //session_start();

        $_SESSION = []; //elimina los datos de session para cerrar sesion

        header("Location: /admin");


    }

}