<?php
class Department_model extends CI_Model { 
        
/**
 * Obtener todos los paises
 */
public function getAllDepartments() {
     $query = $this->db->get('department');  
     $departmentList= array();
     foreach ($query->result() as $key => $value) {
        $departmentList[]=array("DEPARTMENT_ID"=>$value->department_id,"NAME"=>$value->name);
      
      }
  
     return $departmentList;
}
    

/**
 * Obtener Departamento por ID
 */
public function getDepartmentById($id) {
    $this->db->get('department');  
    $query = $this->db->where('Department_id', $id);          
     return  $query->result();
}

/**
 * Obtener Departamento por ID y PAIS
 */
public function getDepartmentByIdAnCountry($id, $pais) {
  $this->db->get('department');  
  $query = $this->db->where(array('department_id'=> $id,"country_id"=>$pais));          
   return  $query->result();
}
    
}