<?php
class Conexion extends PDO{
    private $hostbd = 'localhost';
    private $nombrebd = 'analisis_ii';
    private $usuariobd = 'root';
    private $passwordbd = '';

    public function __construct(){
        try{
            parent::__construct('mysql:host=' . $this->hostbd . ';dbname='  . $this->nombrebd . ';charset=utf8', $this->usuariobd, $this->passwordbd,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
            
        }catch(PDOException $e){
            echo 'error: '.$e->getMessage();
        }
    }
}
?>