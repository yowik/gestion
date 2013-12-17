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

    public function agregarCliente($paramsCliente, $paramsAdjuntos=array()) 
    {
        return $this->sp->agregarCliente($paramsCliente,$paramsAdjuntos);    
    }
  
    public function modificarCliente($Cliente) 
    {
        return $this->sp->modificarCliente($Cliente);    
    }
      
    public function getClientes($limit = 0, $offset = -1) 
    {
        return $this->sp->getClientes($limit, $offset);
    }
    
    public function getByCI($ci)
    {
        return $this->sp->getByCI($ci);
    }
    
    public function eliminarByCI($ci)
    {
        return $this->sp->eliminarByCI($ci);
    }
    
    public function getBlobDatoComplementario($id)
    {
        return $this->sp->getBlob($id);    
    }    

    /* GESTIONES */
    
    public function getTiposGestion()
    {
        return $this->sg->getTiposGestion();
    }    
    
    public function getTiposTramiteByGestion($id_tipos_gestion)
    {        
        return $this->sg->getTiposTramiteByGestion($id_tipos_gestion);
    }      
    
    public function agregarGestion($paramsGestion) 
    {
        return $this->sg->agregarGestion($paramsGestion);    
    }
      
    public function agregarTramite($paramsTramite, $paramsAdjuntos=array())  
    {
        return $this->sg->agregarTramite($paramsTramite, $paramsAdjuntos);     
    }
                
    public function getTramites($id_gestion = 0) 
    {
        return $this->sg->getTramites($id_gestion);    
    }            
    
    public function getTramiteById($id)
    {
        return $this->sg->getTramiteById($id);    
    }
    
    public function getBlobAdjunto($id)
    {
        return $this->sg->getBlob($id);    
    }    
    
    
}


?>