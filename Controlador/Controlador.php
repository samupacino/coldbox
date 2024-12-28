<?php

    include_once'../Modelo/Conexion.php';

    //use Modelo\Conexion;

    Class Controlador{


        public function login(){
    
            return require_once'../vista/login.php';

        }
        public function validar_usuario(){
          
            if (session_status() === PHP_SESSION_NONE) {
                session_start();  
            }
     
            $query = "SELECT *, (SELECT COUNT(*) FROM usuarios WHERE username = ? AND password = ?) AS Total  FROM usuarios WHERE username = ? AND password = ?";

            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');

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
            
            $sql = "DELETE FROM instrumentos WHERE id = ?";
            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');

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
          
            $sql = "UPDATE instrumentos SET nombre = ? WHERE id = ?";
            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');

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

            
            $sql = "SELECT plataformas.nombre AS platform 
                    FROM instrumentos 
                    JOIN plataformas ON instrumentos.plataforma = plataformas.id 
                    WHERE instrumentos.nombre REGEXP ?";
            

            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');
   

            $buscar_tag = $_GET['nombre'];
            $buscar_tag = trim($buscar_tag);
            $buscar_tag = str_replace('-','',$buscar_tag);
            $buscar_tag = '^'.implode('-?',str_split($buscar_tag)).'$';
            
            $datos = [$buscar_tag];

            $resultado = $conexion->obtenerFilas($sql,$datos);

            return $resultado;

        }
        public function registro_instrumento(){

            $sql = "INSERT INTO instrumentos (plataforma, nombre) VALUES (?,?)";
            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');

            $plataforma = $_POST['plataforma'];
            $nombre = $_POST['nombre'];
            $datos = [$plataforma,$nombre];

            $registro = $conexion->guardar_instrumento($sql,$datos);

            if ($registro >= 1) {
                return ["success" => true];
            } else {
                return ["error" => $conn->error];
            }
        }
        public function listar_plataforma(){

           
            $sql = "SELECT id, nombre FROM instrumentos WHERE plataforma = ?";
            $conexion = new Conexion('localhost', 'PlataformaDB', 'root', 'samuellujan1989');

            $plataforma = $_GET['plataforma'];
            $resultado = $conexion->obtenerFilas($sql,[$plataforma]);

            return $resultado;

        }
        public function index(){

            return require_once'../vista/portada.php';

        }
        public function coldboxcajamarquilla(){

            return require_once'../vista/coldboxcajamarquilla.php';

        }
    }

?>