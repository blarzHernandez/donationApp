<?php
class PaymentMethod_model extends CI_Model { 
        
/**
 * Obtener todos los Metodo de Donacion
 */
public function getAllpaymentMethodsList() {
    
     try {
        $query = $this->db->get('payment_method');  
        if(!$query){
                $error = $this->db->error(); 
                throw new Exception("Error Processing Request");
                
        }else{
             return $query->result_array();
        }
    } catch (Exception $e) {
        echo json_encode(array("response"=>"errors","message"=>"Errores al obtener los Metodos de Donacion" . $e->getMessage()));
    //  echo $e->getMessage();
    }

  
}
    

    
}