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
      

            //Validamos valores enviamos via POST
            if ($this->form_validation->run() == TRUE){
                $this->load->model("user_model");
                //Pick up our post params
                $data["recipient"] = $this->input->post("recipient");
                $data["amount"] = md5($this->input->post("amount"));
                $data["methodPayment"] = $this->input->post("methodPayment");  
              
    
                //Call to our model
                $res = $this->user_model->insert_entry($data);          
                if($res != NULL){
                    echo json_encode(array("response"=>"success" ,"message"=>"Datos Guardados Correctamente"));
                
                }else{
                    echo $res;
                }

            }else {
                echo json_encode(array("response" => "errors", "message" => validation_errors()));
            }
           
          
        }
    
   
    
 }