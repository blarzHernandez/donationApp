<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
    public function __constructor(){
        parent::__constructor();
    
       
    }
   
    
    public function index(){          
        $data["dinamic"]= "dashboard"; // view    
       
            
    
        $this->load->view('template/main',$data);//render view
    }
    
 }