<?php 
    class conectar {
        public $dbh;

        public function conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=webservices", "root", "");
                echo "Conexión exitosa a la base de datos.<br>";
                return $conectar;
            } catch (Exception $e) {
                print "Error en la base de datos: " . $e->getMessage() . "<br>";
                die();
            }
        }

        public function set_names(){
            if($this->dbh) {
                return $this->dbh->query("SET NAMES 'utf8'");
            } else {
                echo "No hay conexión a la base de datos.<br>";
                return false;
            }
        }
    }

    $db = new conectar();
    $db->set_names();
    $conectar = $db->conexion();
?>
