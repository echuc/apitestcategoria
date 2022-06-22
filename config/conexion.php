<?php 
    class Conectar {
        protected $bdhost;
        // función para conectarse a la BD
        protected function Conexion() {
            try {
                $conectar = $this->bdhost = new PDO("mysql:host=localhost;dbname=bd_apiwservice","root","");
                return $conectar;
            } catch (Exception $e) {
                print "!Error : ". $e->getMessage() . "<br>";
                die();
            }
        }
        // función para la codificación de caracteres
        public function set_names() {
            return $this->bdhost->query("SET NAMES 'utf8'");
        }
    } 

?>