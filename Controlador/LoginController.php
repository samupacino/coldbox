<?php


include_once'../Modelo/Conexion.php';


class LoginController {
 
    public function validar_usuario($username,$password){
      
 
        $query = "SELECT *, (SELECT COUNT(*) FROM usuarios WHERE username = ? AND password = ?) AS Total  FROM usuarios WHERE username = ? AND password = ?";

        $conexion = new Conexion();

        $username = $username;
        $password = md5($password); // Comparar con la contraseña cifrada

        $datos = [$username,$password,$username,$password];

        $resultado = $conexion->obtenerFila($query,$datos);
       
        if($resultado && $resultado['Total'] >= 1){

            $_SESSION['user_id'] = $resultado['id'];
            $_SESSION['username'] = $resultado['username'];
            $_SESSION['name_complete'] = $resultado['name_complete'];
            $_SESSION['rol'] = $resultado['rol'];
            
            return ['success' => true];

        }else {

            return ['success' => false, 'message' => 'Usuario o contraseña incorrectos.'];
    
        }
        

    }
}
?>