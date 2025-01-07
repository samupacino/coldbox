<?php
    require_once '../core/SessionManager.php';
    require_once '../Controlador/LoginController.php';

    SessionManager::startSession();


  
    if(isset($_GET['iniciar_sesion'])){
       
        if (isset($_SESSION['user_id'])) {
            header('Location: /coldbox/index.php');
            exit();
        }
        
       
        $controlador_login = new LoginController();
        $resultado = $controlador_login->validar_usuario($_POST['username'],$_POST['password']);
        echo json_encode($resultado);
        exit;

    }else{

        require_once '../vista/login/LoginForm.php';

    }

?>
