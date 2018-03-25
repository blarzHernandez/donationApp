<?php
class Donation_model extends CI_Model {
    
  
     /**
      * Insertar Datos a la BD
    */
        public function insert_entry($recipient){
                
                    $this->username         = $recipient['username'];
                    $this->amount            =  $recipient['amount'];
                    $this->recipient_id         =  $recipient['recipient_id'];
                    $this->payment_id          =  $recipient['payment_id'];
                    $this->country_id          =  $recipient['country_id'];
                    $this->donation_date    = date('Y-m-d H:i:s');

                  
                    try {
                       
                        

                        if(!$this->db->insert('donation', $this)){
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

        public function getMyDonations($user){
                
                if(!empty($user)){
                     
                   try {
                        $this->db->select('donation.donation_id,recipient.name , donation.amount,country.name as country_name, donation.donation_date');
                        $this->db->from('donation');
                        $this->db->join('recipient', 'recipient.recipient_id = donation.recipient_id');
                        $this->db->join('country', 'country.country_id = donation.country_id');
                        $this->db->where('username', $user);
                        $query = $this->db->get();                     
         
                         if(!$query){ 
                           $error = $this->db->error(); 
                           throw new Exception("Error Processing Request");
                                         
                        }else{
                                return $query->result_array();
                        }
                       } catch (Exception $e) {
                                 echo json_encode(array("response"=>"errors","message"=>"Errores al Consultar el Registro" . $e->getMessage()));                        
                        }    
                }
        }


/**
 * Validar que no se dupliquen donaciones por pais y por beneficiario
 */
public function checkLastDateDonation($recipient,$country,$username){
                $currentMonth = date('m');
                try {
                        $this->db->select('donation.donation_date');
                        $this->db->from('donation');
                        $this->db->join('recipient', 'recipient.recipient_id = donation.recipient_id');
                        $this->db->join('country', 'country.country_id = donation.country_id');
                        $where = "donation.username='".$username."' AND recipient.recipient_id=$recipient AND country.country_id=$country";
                        $this->db->where($where);
                        $query = $this->db->get();                     
         
                         if(!$query){ 
                           $error = $this->db->error(); 
                           throw new Exception("Error Processing Request");
                                         
                        }else{
                        
                              foreach ($query->result_array() as $key => $value) {
                                      
                                $month = date("m",strtotime($value["donation_date"]));
                                if( $month  == $currentMonth ){
                                        return true;
                                }
                              }
                              return false;
                        }
                       } catch (Exception $e) {
                                 echo json_encode(array("response"=>"errors","message"=>"Errores al Consultar el Registro" . $e->getMessage()));                        
                        }    
                
        }

/**
 * Obtener todos las Donaciones
 */
public function getAllDonations() {
        $query = $this->db->get('donation');      
        return $query->result_array();
    }


    public function getDonation($id) {
        $this->db->select('donation.donation_id,recipient.name recipient ,donor.names donor_name, donor.surnames, donation.amount,country.name as country_name, donation.donation_date');
        $this->db->from('donation');
        $this->db->join('recipient', 'recipient.recipient_id = donation.recipient_id');
        $this->db->join('country', 'country.country_id = donation.country_id');
        $this->db->join('donor', 'donor.country_id = donation.country_id');
        $this->db->where('donation_id', $id);
        $res = $this->db->get();

        if($res->num_rows() > 0){
                return $res->result_array();
        }else{
                return NULL;
        }
        
    }

    
       
}





    