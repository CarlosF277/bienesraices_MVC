<?php
namespace App;

class Vendedor extends ActiveRecord{

    protected static $tabla = "vendedores";
    protected static $columnasDB = ["id", "nombre", "apellido", "telefono"];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL; //para que verifique que sea null y no isset en el metodo de crear
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";

        
    }

    public function validar(){ //no existe el arreglo de errores pero al momento que lo hereda lo crea

        if(!$this->nombre){
            self::$errores[] = "Debes añadir un nombre";
          }

        if(!$this->apellido){
            self::$errores[] = "Debes añadir un apellido";
          }

        if(!$this->telefono){
            self::$errores[] = "El telefono es obligatorio";
          }

        //Expresion regular para validar telefono
        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[] = "El telefono no es valido";
        }

        return self::$errores; //vendedor::$errores
    }

}