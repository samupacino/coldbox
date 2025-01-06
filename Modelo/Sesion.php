<?php
/*
No es estrictamente necesario poner session_start() directamente en el encabezado del archivo, 
aunque es muy recomendable hacerlo al principio del script para evitar problemas de encabezados. Sin embargo, puedes 
encapsularlo dentro de una función y llamarlo posteriormente en el flujo del código, siempre que no se haya enviado 
ninguna salida al navegador antes de ejecutarlo.

*/
namespace App\Database;

use PDO;
use PDOException;

class Conexion {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $charset;
    private $pdo;

    public function __construct($host, $dbName, $username, $password, $charset = 'utf8mb4') {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
        $this->charset = $charset;
        $this->pdo = null;

        // Iniciar sesión al crear la instancia
        $this->iniciarSesion();
    }

    public function conectar() {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => true,
                ];
                $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    public function desconectar() {
        $this->pdo = null;
    }

    /**
     * Iniciar sesión si aún no está iniciada
     */
    public function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            //session_start();
        }
    }

    /**
     * Almacenar un valor en la sesión
     * @param string $clave
     * @param mixed $valor
     */
    public function guardarEnSesion($clave, $valor) {
        $this->iniciarSesion();
        $_SESSION[$clave] = $valor;
    }

    /**
     * Obtener un valor de la sesión
     * @param string $clave
     * @return mixed|null
     */
    public function obtenerDeSesion($clave) {
        $this->iniciarSesion();
        return $_SESSION[$clave] ?? null;
    }

    /**
     * Eliminar un valor de la sesión
     * @param string $clave
     */
    public function eliminarDeSesion($clave) {
        $this->iniciarSesion();
        unset($_SESSION[$clave]);
    }

    /**
     * Cerrar la sesión completamente
     */
    public function cerrarSesion() {
        $this->iniciarSesion();
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
    }
}

?>
