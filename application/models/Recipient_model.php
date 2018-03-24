<?php
class Recipient_model extends CI_Model { 
        
/**
 * Obtener todos los Beneficiarios/instituciones
 */
public function getAllrecipients() {
    
     try {
        $query = $this->db->get('recipient');  
        if(!$query){
                $error = $this->db->error(); 
                throw new Exception("Error Processing Request");
                
        }else{
             return $query->result_array();
        }
    } catch (Exception $e) {
        echo json_encode(array("response"=>"errors","message"=>"Errores al obtener los Beneficiarios" . $e->getMessage()));
    //  echo $e->getMessage();
    }

  
}
    

    
}