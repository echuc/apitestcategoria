<?php 
    class Conectar {
        protected $bdhost;
        // función para conectarse a la BD
        protected function Conexion() {
            try {
                // $conectar = $this->bdhost = new PDO("mysql:host=localhost;dbname=bd_apiwservice","root","");
                // Cadena de conexión
                $conectar = $this->bdhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_6a0362840d6f267","b8bb15def1d288","580b71ff");
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