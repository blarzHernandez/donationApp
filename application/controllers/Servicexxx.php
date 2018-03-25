<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "/libraries/REST_Controller.php";
class Servicexxx extends REST_Controller {
  
    public function __construct(){
        parent::__construct();
       $this->load->model("Donation_model");
       
    }

    /**
     * Get Request
     */
    public function index_get(){
        $donations = $this->Donation_model->getAllDonations();
        if(!is_null($donations)){
            $this->response(array("response"=>$donations),200);
        }else{
            $this->response(array("response"=>"No hay Donaciones"),400);
        }
    }
      /**
     * Find Request
     */
    public function find_get($id){
        $donation = $this->Donation_model->getDonation($id);
        if(!is_null($donation)){
            $this->response(array("response"=>$donation),200);
        }else{
            $this->response(array("response"=>"No Se encontro el Recurso"),400);
        }
    }

    /**
     * POST Request
     */
    public function index_post(){
        
    }

    /**
     * Put Request
     */
    public function index_put($id){
        
    }

      /**
     * delete Request
     */
    public function index_delete($id){
        
    }





}