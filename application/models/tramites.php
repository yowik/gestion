<?php

class Tramites extends CI_Model 
{
    
    function __construct()
    {
    }
    
            
            
    function get_tipos_tramite_by_gestion($id_tipos_gestion)
    {
        $sql = "SELECT * FROM tipos_tramite WHERE id_tipos_gestion = ".$id_tipos_gestion;                
        //die($sql);
        $query = $this->db->query($sql);                   
        return $query->result();        
    } 
    
    function insert_tramite($tramiteParams)
    {
        $id_tramite = 0;
        $this->db->insert('tramites', $tramiteParams);   
        $id_tramite = $this->db->insert_id();
        return $id_tramite;
    }    
   
    function modificar_tramite($tramiteParams)
    {
        $this->db->where('id_tramite', $tramiteParams['id_tramite']);
        $this->db->update('tramites', $tramiteParams);
        return($this->db->affected_rows() > 0);
    }          
                
    function get_tramites($id_gestion = 0)
    {
        $sql = "SELECT * FROM tramites";   
        if($id_gestion > 0)
            $sql .= " WHERE id_gestion = ".$id_gestion;             
        $query = $this->db->query($sql);                   
        return $query->result();         
    }   
    
    function getById($id)
    {
        $query = $this->db->get_where('tramites', array('id_tramite' => $id));
        if ($query->num_rows > 0) return $query->result();
        return false;        
    }

    function getTipoTramiteById($id)
    {
        $query = $this->db->get_where('tipos_tramite', array('id_tipo_tramite' => $id));
        if ($query->num_rows > 0) return $query->result();
        return false;        
    }
                 
    function eliminar($id_tramite)
    {
        $this->db->delete('tramites', array('id_tramite' => $id_tramite));
        return($this->db->affected_rows() > 0);
              
    }                 
}

?>