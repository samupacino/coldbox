<?php
    require_once '/Applications/MAMP/htdocs/coldbox/core/SessionManager.php';
    require_once '/Applications/MAMP/htdocs/coldbox/Controlador/LoginController.php';

    SessionManager::startSession();


  
    if(isset($_GET['iniciar_sesion'])){
       
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php');
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
