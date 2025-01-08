<?php
    require_once '../core/SessionManager.php';
    require_once '../Controlador/LoginController.php';

    SessionManager::startSession();


  
    if(isset($_GET['iniciar_sesion'])){
       
        $controlador_login = new LoginController();
        $resultado = $controlador_login->validar_usuario($_POST['username'],$_POST['password']);
        echo json_encode($resultado);
        exit;

    }else{

        require_once '../vista/login/LoginForm.php';

    }

?>
