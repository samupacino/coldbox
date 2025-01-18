<?php

    include_once'../Modelo/Conexion.php';

    //use Modelo\Conexion;

    Class HomeController{

        private $planta;

        public function login(){
    
            return require_once'../vista/login.php';

        }
        public function getTextPlanta(){
            return $this->planta;
        }
        public function setTextPlanta($planta){
            $this->planta = 'instrumento_'.$planta;
        }
     
        public function validar_usuario(){
          
            if (session_status() === PHP_SESSION_NONE) {
                //session_start();  
            }
     
            $query = "SELECT *, (SELECT COUNT(*) FROM usuarios WHERE username = ? AND password = ?) AS Total  FROM usuarios WHERE username = ? AND password = ?";

            $conexion = new Conexion();

            $username = $_POST['username'];
            $password = md5($_POST['password']); // Comparar con la contraseña cifrada

            $datos = [$username,$password,$username,$password];

            $resultado = $conexion->obtenerFilas($query,$datos);
        
        
            if($resultado[0]['Total'] >= 1){

                $_SESSION['user_id'] = $resultado[0]['id'];
                $_SESSION['username'] = $resultado[0]['username'];
                $_SESSION['rol'] = $resultado[0]['rol'];

                return require_once'../vista/portada.php';

            }else {

                echo "Usuario o contraseña incorrectos.";

            }
            
    
        }
        public function eliminar_instrumento(){
            
            $sql = "DELETE FROM ".$this->getTextPlanta()." WHERE id = ?";
            $conexion = new Conexion();

            $id = $_POST['id'];
            $datos = [$id];
            $confirmacion_anulacion = $conexion->eliminar_instrumento($sql,$datos);

            if ($confirmacion_anulacion >= 1) {
                return ["success" => true];
            } else {
                return ["error" => $conn->error];
            }

        }
        public function editar_instrumento(){
          
            $sql = "UPDATE ".$this->getTextPlanta()." SET nombre = ? WHERE id = ?";
            $conexion = new Conexion();

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $datos = [$nombre,$id];
            $confirmacion_modificado =$conexion->editar_instrumento($sql,$datos);

            if ($confirmacion_modificado >= 1) {
                return ["success" => true];
            } else {
                return ["error" => $conn->error];
            }

        }
        public function buscar_instrumento(){     
            //$sql = "SELECT plataformas.nombre AS platform FROM ".$this->getTextPlanta()." JOIN plataformas ON ".$this->getTextPlanta().".plataforma = plataformas.id WHERE ".$this->getTextPlanta().".nombre REGEXP ?";
            //$sql = "SELECT plataformas.nombre AS platform FROM instrumento_pl2 JOIN plataformas ON instrumento_pl2.plataforma = plataformas.id WHERE instrumento_pl2.nombre REGEXP ?";
            
            $sql = "SELECT ".$this->getTextPlanta().".nombre, ".$this->getTextPlanta().".plataforma FROM ".$this->getTextPlanta()." JOIN plataformas ON ".$this->getTextPlanta().".plataforma = plataformas.id WHERE ".$this->getTextPlanta().".nombre REGEXP ?";
        
            $conexion = new Conexion();
   
            $buscar_tag = $_GET['nombre'];
            $buscar_tag = strtoupper(trim($buscar_tag));
            $buscar_tag = str_replace('-','',$buscar_tag);
            $buscar_tag = '^'.implode('-?',str_split($buscar_tag)).'$';
            
            $datos = [$buscar_tag];

            $resultado = $conexion->obtenerFilas($sql,$datos);

            return $resultado;

        }
        public function registro_instrumento(){

            $sql = "INSERT INTO ".$this->getTextPlanta()." (plataforma, nombre) VALUES (?,?)";
            $sql_validar = "SELECT COUNT(*) AS EXISTE FROM ".$this->getTextPlanta()." JOIN plataformas ON ".$this->getTextPlanta().".plataforma = plataformas.id WHERE ".$this->getTextPlanta().".nombre REGEXP ?";
        
            $registro = 0;
            $plataforma = $_POST['plataforma'];
            $nombre = $_POST['nombre'];

            $conexion = new Conexion();

            /////////
            $buscar_tag = $nombre;
            $buscar_tag = strtoupper(trim($buscar_tag));
            $buscar_tag = str_replace('-','',$buscar_tag);
            $buscar_tag = '^'.implode('-?',str_split($buscar_tag)).'$';
            
            $datos = [$buscar_tag];

            $resultado = $conexion->obtenerFilas($sql_validar,$datos);

            ////////
            if($resultado[0]['EXISTE']<=0){
                
                $datos = [strtoupper($plataforma),strtoupper($nombre)];
                $registro = $conexion->guardar_instrumento($sql,$datos);
          
            }
            if ($registro >= 1) {
                return ["success" => true];
            } else {
                return ["succes" => false, "message" => "El instrumento ya existe."];
            }
        }
        public function listar_plataforma($plataforma){

           
            $sql = "SELECT id, nombre FROM ".$this->getTextPlanta()." WHERE plataforma = ?";
            $conexion = new Conexion();

            $resultado = $conexion->obtenerFilas($sql,[$plataforma]);

            return $resultado;

        }
        public function index(){

            return require_once'../vista/portada.php';

        }
        public function coldbox($planta){
        
            if($planta == 'pl2'){
                return require_once'../vista/coldboxcajamarquilla.php';
            }else if($planta == 't155'){
                return require_once'../vista/coldboxpisco.php';
            }


        }
    }

?>