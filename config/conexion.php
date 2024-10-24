<?php 
    class Database {
        protected $dbh;

        protected function conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=webservices", "root", "");
                print "Conexión exitosa a la base de datos.<br>";
                return $conectar;
            } catch (Exception $e) {
                print "Error en la base de datos: " . $e->getMessage() . "<br>";
                die();
            }
        }
        public function iniciar_conexion(){
            return $this -> conexion();
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>