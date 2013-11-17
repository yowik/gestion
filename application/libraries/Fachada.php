<?php
require_once('ServiciosPersona.php');
require_once('ServiciosGestion.php');
/**
 * class Fachada
 * autor: gestion
 * 
 */

class Fachada 
{
    
    private $sp;
    private $sg;    
    
    private static $Instancia = null;
    
    /* Constructor */
    private function __construct()
    {
        $this->sp = new ServiciosPersona();
        $this->sg = new ServiciosGestion();
    }
    
    public static function getInstancia()
    {
        if(is_null(self::$Instancia)){
            self::$Instancia = new Fachada();         
        }
        return self::$Instancia;
    }

    public function agregarCliente($paramsCliente) 
    {
        return $this->sp->agregarCliente($paramsCliente);    
    }
  
    public function getClientes($limit = 0, $offset = -1) 
    {
        return $this->sp->getClientes($limit, $offset);
    }              
}


?>