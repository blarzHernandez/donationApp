<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donations extends CI_Controller {
  
    public function __constructor(){
        parent::__constructor();
    
       
    }
   
    
    /**
     * Guardar datos del Usuario
     */
    public function saveDonation(){

            $this->form_validation->set_rules('recipient', 'Recipient', array('required'));
            $this->form_validation->set_rules('amount', 'Amount', array('required','greater_than[0]'));
            $this->form_validation->set_rules('methodPayment', 'Payment Method', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
      

            //Validamos valores enviamos via POST
            if ($this->form_validation->run() == TRUE){
                $this->load->model("Donation_model");
                //Pick up our post params
                $data["recipient_id"] = $this->input->post("recipient");
                $data["username"] = $this->session->userdata("user");
                $data["amount"] =$this->input->post("amount");                
                $data["payment_id"] = $this->input->post("methodPayment");  
                $data["country_id"] = $this->input->post("country");  
              
    
                //Call to our model
                $check = $this->Donation_model->checkLastDateDonation( $data["recipient_id"] ,   $data["country_id"] , $data["username"] );
              if($check != TRUE) {
                    $res = $this->Donation_model->insert_entry($data);          
                    if($res != NULL){
                        echo json_encode(array("response"=>"success" ,"message"=>"Datos Guardados Correctamente"));
                    
                    }else{
                        echo $res;
                    }
              }else {
                echo json_encode(array("response" => "errors", "message" => "El sistema no permite duplicar donaciones para el mismo pais y el mismo beneficiario"));
              }
               

            }else {
                echo json_encode(array("response" => "errors", "message" => validation_errors()));
            }
           
          
        }
    
        /**
         * Listar las donaciones hechas por el usuario actual
         */

        public function getMyDonations() {
            $arrJson = array();   
            $this->load->model("Donation_model");
            $donations = $this->Donation_model->getMyDonations($this->session->userdata("user"));
    
            if (is_array($donations)) {
                foreach ($donations as $value) {
                    $arrJson [] = array(
                        $value["donation_id"],
                        $value["name"],
                        $value["amount"],
                        $value["country_name"],
                        $value["donation_date"]
                    
                    );
                }
            }
    
            $response['data'] = $arrJson;
            echo json_encode($response);
        }
   
    
 }