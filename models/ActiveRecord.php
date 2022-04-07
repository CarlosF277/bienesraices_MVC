<?php
namespace Model;

class ActiveRecord{
    //base de datos
    protected static $db; //no requiere nueva instancia, evita crear una conexion nueva cada vez que se define un objeto
    protected static $columnasDB = [];
    protected static $tabla = "";

    //Errores
    protected static $errores = []; //los datos se envian a la clase y se verifican si son o no validos. static por que no se requiere instanciar para verificar erroes


    //definir la conexion a la base de datos
     public static function setDB($database){
        self::$db = $database; //hace referencia a la clase principal, una sola conexion
     }

     public function guardar(){

        if(!is_null($this->id)){ //verifica si hay un id o no. si no hay crea
          $this->actualizar();
        }
        else{
          //creando nuevo registro
          $this->crear();
        }
     }

     public function crear(){

        //sanitizar los datos

        $atributos = $this->sanitizarAtributos();

        //join(",",array_keys($atributos)); //crea un nuevo string a aprtir de las llaves de un arreglo(separador,arreglo)
        //join(",",array_values($atributos)); //crea un nuevo string a aprtir de los valores de un arreglo(separador,arreglo)

         //insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla ." (".join(",",array_keys($atributos)).")
        VALUES ('".join("','",array_values($atributos))."');";

       
        $resultado = self::$db->query($query);
       
        if($resultado){

          //header("Location: /admin?mensaje=Registrado Correctamente&registrado=1");
          header("Location: /admin?resultado=1");
      
        }
        
     }

     public function actualizar(){

       $atributos = $this->sanitizarAtributos();

       $valores = [];
       foreach($atributos as $key => $value){
          $valores[] = "{$key} = '{$value}'";
       }

       $query = " UPDATE " . static::$tabla ." SET ";
       $query .= join(', ',$valores); //permite separar cada lugar del array con una ,
       $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
       $query .= " LIMIT 1; ";
       
       $resultado = self::$db->query($query);

       if($resultado){
         
        //echo "Insertado correctamente";
        //redireccionando al usuario
            //header("Location: /admin?mensaje=Registrado Correctamente&registrado=1");
        header("Location: /admin?resultado=2");
    
      }
       
     }

     //Eliminar un registro
     public function eliminar(){

      //Elimina la propiedad de la base de datos
      $query = "DELETE FROM ". static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
      $resultado = self::$db->query($query);

      

      if($resultado){
        //borrando imagen
        $this->borrarImagen();
        header("location: /admin?resultado=3");
      }

     }

     //identificar y unir los atributos de la bd
     public function atributos(){
         $atributos = [];
         foreach(static::$columnasDB as $columna):
            if($columna === "id") continue;
            $atributos[$columna] = $this->$columna;
         endforeach;
         
         return $atributos;
     }

     public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){ //obtiene llave y valor. mantiene en referencia el arreglo anterior
            $sanitizado[$key] = self::$db->escape_string($value);

        }
        return $sanitizado;
     }

     //subida de archivos
     public function setImagen($imagen){

        //Elimina la imagen previa

        if(!is_null($this->id)){

          $this->borrarImagen();

        }
        
         //asignar al atributo de imagen el nombre de la imagen
         if($imagen){
             $this->imagen = $imagen;
         }
     }

     //Elimina el archivo

     public function borrarImagen(){
        //comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);

        if($existeArchivo){
          unlink(CARPETAS_IMAGENES . $this->imagen);
        }       
     }

     //validacion
     public static function getErrores(){
         return static::$errores; //para que haga referencia a las clases hijos
     }

     public function validar(){

          static::$errores = [];
          return static::$errores;
     }

     //Lista todas las propiedades
     public static function all(){
         $query = "SELECT * FROM " . static::$tabla; //static va a heredar el metodo y va a buscar en la clase que esta heredando
         $resultado = self::consultarSQL($query);
         
         return $resultado;
     }

     //Obtiene determinado numero de registros
     public static function get($cantidad){
      $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; //static va a heredar el metodo y va a buscar en la clase que esta heredando
      $resultado = self::consultarSQL($query);
      
      return $resultado;
  }



     //Busca un registro por su id

     public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}";
        $resultado = self::consultarSQL($query); //array de objetos
        
        return (array_shift($resultado)); //regresa el primer elemento del array, 
        //el cual es un objeto mismo de propiedad con los datos y metodos, no el array
        
     }
     
     //metodo para realizar consultas a la base de datos y transformarlas 
     //a objetos

     public static function consultarSQL($query){
        //Consultar la bd
        $resultado = self::$db->query($query);
        

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            
            $array[] = static::crearObjeto($registro);
        }

        //liberar memoria

        $resultado->free();

        //retornar los resultados

        return $array;
     }

     //formatea como objetos los resultados de la consulta
     protected static function crearObjeto($registro){
        $objeto = new static; //crea una nueva instancia del constructor y objeto mismo

        foreach($registro as $key => $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
     }

     //Sincroniza el objeto en memoria con los cambios realizados por el usuario
     //itera y mapera propieaddes del objeto con llaves del arrelo y las une, las sincroniza
     public function sincronizar ($args = []){
      
      foreach($args as $key => $value){
        if(property_exists($this, $key) && !is_null($value)){
            $this->$key = $value;
        }
      }
     }
    
}