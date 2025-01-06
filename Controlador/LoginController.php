<?php


include_once'../Modelo/Conexion.php';


class LoginController {
 
    public function validar_usuario($username,$password){
      
 
        $query = "SELECT *, (SELECT COUNT(*) FROM usuarios WHERE username = ? AND password = ?) AS Total  FROM usuarios WHERE username = ? AND password = ?";

        $conexion = new Conexion();

        $username = $username;
        $password = md5($password); // Comparar con la contraseña cifrada

        $datos = [$username,$password,$username,$password];

        $resultado = $conexion->obtenerFilas($query,$datos);
    
    
        if($resultado[0]['Total'] >= 1){

            $_SESSION['user_id'] = $resultado[0]['id'];
            $_SESSION['username'] = $resultado[0]['username'];
            $_SESSION['rol'] = $resultado[0]['rol'];
            
            return ['success' => true];

        }else {

            return ['success' => false, 'message' => 'Usuario o contraseña incorrectos.'];
    
        }
        

    }
}
?>
