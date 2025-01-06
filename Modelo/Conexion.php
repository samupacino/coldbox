<?php
    include_once'../config/config.php';
    //namespace Modelo;

    class Conexion {
        private $host;
        private $dbName;
        private $username;
        private $password;
        private $charset;
        private $pdo;

        public function __construct() {
            $this->host = DB_HOST;
            $this->dbName = DB_NAME;
            $this->username = DB_USER;
            $this->password = DB_PASS;
            $this->charset = DB_CHARSET;
            $this->pdo = null;
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

        public function ejecutarConsulta($sql, $params = []) {
            try {
                $stmt = $this->conectar()->prepare($sql);
                $stmt->execute($params);
                return $stmt;
            } catch (PDOException $e) {
                die("Error en la consulta: " . $e->getMessage());
            }
        }

        public function obtenerFilas($sql, $params = []) {
            $stmt = $this->ejecutarConsulta($sql, $params);
            return $stmt->fetchAll();
        }

        public function obtenerFila($sql, $params = []) {
            $stmt = $this->ejecutarConsulta($sql, $params);
            return $stmt->fetch();
        }
        public function guardar_instrumento($sql, $params = []){
            $stmt = $this->ejecutarConsulta($sql, $params);
            return $stmt->rowCount();
        }
        public function eliminar_instrumento($sql, $params){
            $stmt = $this->ejecutarConsulta($sql, $params);
            return $stmt->rowCount();
        }
        public function editar_instrumento($sql, $params){
            $stmt = $this->ejecutarConsulta($sql, $params);
            return $stmt->rowCount();
        }
    }
?>