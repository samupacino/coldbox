<?php
//session_start();
header("Content-Type: application/json");

//(este agregue)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getUserRole') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["error" => "No has iniciado sesión."]);
        exit;
    }

    echo json_encode(["success" => true, "rol" => $_SESSION['rol']]);
    exit;
}
//(este agregue)
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Acceso denegado. Por favor, inicia sesión."]);
    exit;
}
$rol = $_SESSION['rol'];
$host = "localhost"; // Cambia si tu host es diferente
$user = "root"; // Cambia según tu configuración
$password = "root"; // Cambia según tu configuración
$dbname = "PlataformaDB";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Registrar instrumento (solo admin)(este agregue)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    if ($rol !== 'admin') {
        echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
        exit;
    }

    $plataforma = $_POST['plataforma'];
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO instrumentos (plataforma, nombre) VALUES ('$plataforma', '$nombre')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
    exit;
}
// Editar instrumento (solo admin)(este agregue)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    if ($rol !== 'admin') {
        echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
        exit;
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $sql = "UPDATE instrumentos SET nombre = '$nombre' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
    exit;
}
// Eliminar instrumento (solo admin) (este agregue)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    if ($rol !== 'admin') {
        echo json_encode(["error" => "No tienes permisos para realizar esta acción."]);
        exit;
    }

    $id = $_POST['id'];
    $sql = "DELETE FROM instrumentos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
    exit;
}

// Listar instrumentos de una plataforma (este agregue)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['plataforma'])) {
    $plataforma = $_GET['plataforma'];
    $sql = "SELECT id, nombre FROM instrumentos WHERE plataforma = '$plataforma'";
    $result = $conn->query($sql);
    $instrumentos = [];
    while ($row = $result->fetch_assoc()) {
        $instrumentos[] = $row;
    }
    echo json_encode(["success" => true, "instrumentos" => $instrumentos]);
    exit;
}

// Buscar instrumento (todos los roles)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'searchInstrument') {
    $nombre = $_GET['nombre'];
    $sql = "SELECT plataformas.nombre AS platform 
            FROM instrumentos 
            JOIN plataformas ON instrumentos.plataforma = plataformas.id 
            WHERE instrumentos.nombre = '$nombre' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["success" => true, "platform" => $row['platform']]);
    } else {
        echo json_encode(["success" => false, "message" => "Instrumento no encontrado."]);
    }
    exit;
}

$conn->close();
?>
