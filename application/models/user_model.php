<?php
class user_model extends CI_Model {
    
  
     /**
      * Insertar Datos a la BD
    */
        public function insert_entry($user){
                
                    $this->password         = $user['password'];
                    $this->names            =  $user['names'];
                    $this->surnames         =  $user['surnames'];
                    $this->country_id          =  $user['country'];
                    $this->username         =  $user['username'];
                    $this->department_id    =  $user['department'];
                    try {
                       

                        if(!$this->db->insert('donor', $this)){
                                $error = $this->db->error(); 
                                throw new Exception("Error Processing Request");
                                
                        }else{
                                return TRUE;
                        }
                    } catch (Exception $e) {
                        echo json_encode(array("response"=>"errors","message"=>"Errores al Insertar el Registro" . $e->getMessage()));
                      //  echo $e->getMessage();
                    }
                    
                   
            }
    
        public function login($data){
                $this->username         =  $data['username'];
                $this->password         = $data['password'];
                           
                try {
                        $res = $this->db->get_where('donor', array('username' => $this->username,"password"=>$this->password));
                        if(!$res){
                                $error = $this->db->error(); 
                                throw new Exception("Error Processing Request");
                                
                        }else{
                             if($res->num_rows() > 0){
                                     return TRUE;
                             }else {
                                     return FALSE;
                             }
                        }
                } catch (Exception $e) {
                    echo json_encode(array("response"=>"errors","message"=>"Errores al Autenticarse" . $e->getMessage()));
                  //  echo $e->getMessage();
                }
            }
    
    }
    