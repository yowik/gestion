<?php

class Adjuntos extends CI_Model 
{
    
    function __construct()
    {       

    }
    
    function add($adjunto, $id_tramite)
    {
        $sql =
            "INSERT INTO adjuntos 
            (archivo, mime, nombre, id_tramite) values
            ('".$adjunto->getArchivo()."', '".$adjunto->getTipo()."','".$adjunto->getNombre()."', '".$id_tramite."')";

        return $this->db->query($sql);               
    }     
       
   function get_adjuntos($id_tramite)
    {
        $sql = "SELECT * FROM adjuntos as a where a.id_tramite=".$id_tramite;              
        $query = $this->db->query($sql);                   
        return $query->result();   
    }       
     
    function get_blob($id)
    {
        $sql = "SELECT * FROM adjuntos as a where a.id_adjunto=".$id;                
        $query = $this->db->query($sql);                   
        return $query->result();   
    }   
        
}

?>