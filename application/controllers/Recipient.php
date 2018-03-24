<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipient extends CI_Controller {
  
    public function __constructor(){
        parent::__constructor();
    
       
    }
   
    
    public function getAllRecipients(){          
        $this->load->model("Recipient_model");//cargamos nuestro modelo      
        $data["dinamic"]= "users/signUpForm"; // view
        $recipients = $this->Recipient_model->getAllrecipients(); //obtemos todos los paises       
        $data['recipientsList'] = $recipients;//Se lo pasamos a la vista como un array
 
        
        $this->load->view('template/main',$data);//render view
    }
    
 }