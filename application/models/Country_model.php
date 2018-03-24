<?php
class Country_model extends CI_Model { 
        
/**
 * Obtener todos los paises
 */
public function getAllCountries() {
     $query = $this->db->get('country');  
     $countriesList= array();
     foreach ($query->result() as $key => $value) {
        $countriesList[]=array("COUNTRY_ID"=>$value->country_id,"NAME"=>$value->name);
      
      }
     return $countriesList;
}
    

/**
 * Obtener pais por ID
 */
public function getCountryById($id) {
    $this->db->get('country');  
    $query = $this->db->where('country_id', $id);          
     return  $query->result();
}
    
}