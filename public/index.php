
<?php


    session_start();
    
    include_once'../Controlador/Controlador.php';
    
    $controlador = new Controlador();

    /*
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri,'/');
    $method = $_SERVER['REQUEST_METHOD'];
    echo $_GET['samuel'];
    echo '</br>';
    echo  $uri;*/
    
    

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getUserRole') {
   
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["error" => "No has iniciado sesión."]);
            exit;
        }

        echo json_encode(["success" => true, "rol" => $_SESSION['rol']]);
        exit;
    }

    if (isset($_SESSION['user_id'])) {
        //$rol = $_SESSION['rol'];
        //echo json_encode(["error" => "Acceso denegado. Por favor, inicia sesión."]);
        //exit;
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['columna'])) {

        if (!isset($_SESSION['user_id']) && isset($_POST['columna_sesion'])) {
            
            $controlador->validar_usuario();
        

            //$rol = $_SESSION['rol'];
        
            //echo json_encode(["error" => "Acceso denegado. Por favor, inicia sesión samuel."]);
           
        }else{
            echo $_SESSION['username'];
            session_unset();
            session_destroy();
            header("Location: /");
            exit;
        }
        

    }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Eliminar instrumento (solo admin)
        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }

        $datos = $controlador->eliminar_instrumento();
        echo json_encode($datos);
        exit;

    }else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['plataforma'])) {

        $instrumentos = $controlador->listar_plataforma();

        echo json_encode(["success" => true, "instrumentos" => $instrumentos]);
        exit;
 

    }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    // Editar instrumento (solo admin)
        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }

        $confirmacion = $controlador->editar_instrumento();
        echo json_encode($confirmacion);

        exit;

    }else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'searchInstrument') {
       // Buscar instrumento (todos los roles)
        
        $resultado = $controlador->buscar_instrumento();
    
        if (count($resultado) > 0) {
   
            echo json_encode(["success" => true, "platform" => $resultado[0]['platform']]);
        } else {
            echo json_encode(["success" => false, "message" => "Instrumento no encontrado."]);
        }
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {

        if ($_SESSION['rol'] !== 'admin') {
            echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
            exit;
        }
        $registro = $controlador->registro_instrumento();
        echo json_encode($registro);
        exit;

    }else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {

        session_unset();
        session_destroy();
        header("Location: /");
        exit;

    }else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['t155'])) {
        ob_start();   
        $controlador->coldboxcajamarquilla();
        $coldbox = ob_get_clean();
        echo $coldbox;

    }else{

        session_unset();
        session_destroy();
        $controlador->login();

    }
    

?>

*/