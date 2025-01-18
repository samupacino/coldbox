
<?php

    include_once'../Controlador/HomeController.php';
    include_once'../Controlador/QuimicaController.php';
    include_once'../core/SessionManager.php';
 
    SessionManager::startSession();

    if (!isset($_SESSION['user_id'])) {

        header('Location: /coldbox/login.php');
        exit();

    }else{

        $getAction= [
            "seleccionplanta"  => function($getParams = null){planta_seleccion($getParams);},
            "logout" => function($getParams = null){logout_app($getParams);},
            "searchInstrument" => function($getParams = null){buscando_instrumento($getParams);},
            "listxplataforma" => function($getParams = null){listar_plataforma($getParams);}
        ];
    
        $postAction= [
            "add" => function(){registro_instrument();},
            "edit" => function(){edit_instrument();},
            "delete" => function(){delete_instrumento();},
        ];


        if (!isset($_SESSION['controlador'])) {
            // Crear el controlador si no existe en la sesión
            $controlador = new HomeController();
            $_SESSION['controlador'] = serialize($controlador); // Guardar en la sesión
          
        }else if ((isset($_POST['action']) || isset($_GET['action'])) && isset($_GET['planta'])) {
            // Recuperar el controlador de la sesión
            $controlador = unserialize($_SESSION['controlador']);
         
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($postAction[$_POST['action']])) {
                
                $postAction[$_POST['action']]();
                exit;
            }else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && isset($getAction[$_GET['action']])) {// action="buscar_instrumento"

                $getParams = $_GET; 
                $getAction[$_GET['action']]($getParams);
                exit;
            }
        }else if ((isset($_POST['action']) || isset($_GET['action'])) && isset($_GET['planta']) && $_GET['calculo'] == 'quimica') {
            

            exit;
            if (!isset($_SESSION['QuimicaControlador'])) {
                // Crear el controlador si no existe en la sesión
                $quimica_controlador = new QuimicaController();
                $_SESSION['QuimicaControlador'] = serialize($quimica_controlador); // Guardar en la sesión
              
            }
        
            ob_start();
            $quimica_controlador = unserialize($_SESSION['QuimicaControlador']);
            $quimica_vista = $quimica_controlador->index();
            echo $quimica_vista;
            exit;

        }else{

            SessionManager::destroySession();
            header('Location: /coldbox/login.php');
            exit;
        } 
    }

    return require_once'../vista/portada.php';
    exit;



   
    /*
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if ($requestMethod === 'POST') {
        $action = isset($_POST['action']) ? $_POST['action'] : null;
    } else {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
    }

    // Obtener parámetros GET adicionales
    $getParams = $_GET; */
    


 

  
    /*
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri,'/');
    $method = $_SERVER['REQUEST_METHOD'];
    echo $_GET['samuel'];
    echo '</br>';
    echo  $uri;*/
    
    /*

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getUserRole') {
   
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["error" => "No has iniciado sesión."]);
            exit;
        }

        echo json_encode(["success" => true, "rol" => $_SESSION['rol']]);
        exit;
    }*/


    
    function delete_instrumento(){
        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }
        $controlador = unserialize($_SESSION['controlador']);
        $datos = $controlador->eliminar_instrumento();
        echo json_encode($datos);
        exit;
    }
    function listar_plataforma($getParams = null){
 
        $numero_plataforma = $getParams['plataforma'];
        $controlador = unserialize($_SESSION['controlador']);

        $instrumentos = $controlador->listar_plataforma($numero_plataforma);
        echo json_encode(["success" => true, "instrumentos" => $instrumentos]);
        exit;
    }
    function edit_instrument(){
        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }
        $controlador = unserialize($_SESSION['controlador']);
        $confirmacion = $controlador->editar_instrumento();
        echo json_encode($confirmacion);

        exit;
    }
    function buscando_instrumento($getParams = null){

        $controlador = unserialize($_SESSION['controlador']);
        $resultado = $controlador->buscar_instrumento();
     
        if (count($resultado) > 0) {
            echo json_encode(["success" => true, "platform" => $resultado]);
            //echo json_encode(["success" => true, "platform" => $resultado[0]['platform']]);
        } else {
            echo json_encode(["success" => false, "message" => "Instrumento no encontrado."]);
        }
        exit;
    }

    function registro_instrument(){
        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }
        $controlador = unserialize($_SESSION['controlador']);
        $registro = $controlador->registro_instrumento();
        echo json_encode($registro);
        exit;
    }
    function logout_app($getParams = null){
        SessionManager::destroySession();
        header("Location: login.php");
        exit;
    }
    function planta_seleccion($getParams = null){
        $planta = ['pl2','t155'];

        if (isset($_SESSION['planta']) && isset($_SESSION['controlador'])) {
            echo $_SESSION['controlador'];
            unset($_SESSION['planta']);
            unset($_SESSION['controlador']);
        }


        if(in_array($getParams['planta'],$planta)){
            ob_start();   
            //echo ini_get('session.auto_start') ? 'session.auto_start está habilitado' : 'session.auto_start está deshabilitado';
        
            // Estados posibles:
            // 0 = PHP_SESSION_DISABLED (Sesiones deshabilitadas)
            // 1 = PHP_SESSION_NONE (Sesión no iniciada)
            // 2 = PHP_SESSION_ACTIVE (Sesión activa)
        
            $_SESSION['planta'] = $_GET['planta'];

            $controlador = new HomeController();
            $_SESSION['controlador'] = serialize($controlador);

            $controlador = unserialize($_SESSION['controlador']);
            $controlador->setTextPlanta($_GET['planta']);

            $_SESSION['controlador'] = serialize($controlador);

            $controlador->coldbox($_GET['planta']);
        
            $coldbox = ob_get_clean();
            echo $coldbox;
        }else{
            echo "";
        }
        
    }
    
?>
