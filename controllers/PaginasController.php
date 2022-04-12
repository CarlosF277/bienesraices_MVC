<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {

    public static function index (Router $router){

        $propiedades = Propiedad::get(3); //solo trae 3
        $inicio = true;
    
        $router->render("paginas/index" ,[
            "propiedades" => $propiedades,
            "inicio" => $inicio

        ]);
    }

    public static function nosotros (Router $router){

        $router->render("paginas/nosotros",[

        ]);
        
    }

    public static function propiedades (Router $router){

        $propiedades = Propiedad::all(); //solo trae 3
        
    
        $router->render("paginas/propiedades" ,[
            "propiedades" => $propiedades

        ]);
        
    }

    public static function propiedad (Router $router){

        $id = validarRedireccionar("/propiedades");


        //busca la propiedad por el id

        $propiedad = Propiedad::find($id);
        

        $router->render("paginas/propiedad", [
            "propiedad" => $propiedad
        ]);
    }

    public static function blog (Router $router){


        $router->render("paginas/blog",[

        ]);
        
    }

    public static function entrada (Router $router){

        $router->render("paginas/entrada", []);
        
    }

    public static function contacto (Router $router){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //texto a enviar desde POST, desde el array contacto que contiene definido en el form
            $respuestas = $_POST["contacto"];

            //crear una instacia de phpmailer
            $mail = new PHPMailer();

            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "82b0e1f14f4acb";
            $mail->Password = "3fab2cfa0e11d3";
            $mail->SMTPSecure = "tls";
            $mail->Port = 2525;

            // configurar el contenido del email

            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com", "BienesRacices.com");
            $mail->Subject = "Tienes un Nuevo Mensaje";


            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //DEfinir el contenido
            $contenido  = "<html>";
            $contenido .= "<p> Tienes un nuevo mensaje </p> ";
            $contenido .= "<p> Nombre: " . $respuestas['nombre'] . "</p> ";
            $contenido .= "<p> E- Mail: " . $respuestas['email'] . "</p> ";
            $contenido .= "<p> Telefono: " . $respuestas['telefono'] . "</p> ";
            $contenido .= "<p> Mensaje: " . $respuestas['mensaje'] . "</p> ";
            $contenido .= "<p> Vende o compra: " . $respuestas['tipo'] . "</p> ";
            $contenido .= "<p> Precio o presupuesto: $ " . $respuestas['precio'] . "</p> ";
            $contenido .= "<p> Nombre:" . $respuestas['mensaje'] . "</p> ";
            $contenido .= "<p> Prefiere ser contactado por: " . $respuestas['contacto'] . "</p> ";
            $contenido .= "<p> Fecha contacto: " . $respuestas['fecha'] . "</p> ";
            $contenido .= "<p> Hora: " . $respuestas['hora'] . "</p> ";

            $contenido .= "</html>";


            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo sin HTML";

            //Enviar el email
            if($mail->send()){
                echo "Mensaje enviado correctamente";
            }
            else{
                echo "El mensaje no se pudo enviar";
            }

            
        }

        $router->render("paginas/contacto", [

        ]);
    }
}