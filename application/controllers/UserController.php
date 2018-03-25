<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
  
    public function __constructor(){
        parent::__constructor();
    
       
    }
   
    
    public function signupRenderView(){

        
            $this->load->model("Country_model");//cargamos nuestro modelo
            $this->load->model("Department_model");//cargamos nuestro modelo
            $data["dinamic"]= "users/signUpForm"; // view
            $countries = $this->Country_model->getAllCountries(); //obtemos todos los paises       
            $data['countriesList'] = $countries;//Se lo pasamos a la vista como un array
    
    
            $deparments = $this->Department_model->getAllDepartments(); //obtemos todos los departamentos       
            $data['departmentsList'] = $deparments;//Se lo pasamos a la vista como un array    
    
            $this->load->view('template/main',$data);//render view
    }

    public function renderView(){

        $data["dinamic"]= "donations/kindUser"; // view
        $this->load->view('template/main',$data);//render view
    }

    /**
     * Guardar datos del Usuario
     */
    public function saveUser(){

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('names', 'Names', 'required');
            $this->form_validation->set_rules('surnames', 'Surname', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('department', 'Department', 'required');

            //Validamos valores enviamos via POST
            if ($this->form_validation->run() == TRUE){
                $this->load->model("user_model");
                //Pick up our post params
                $data["username"] = $this->input->post("email");
                $data["password"] = md5($this->input->post("password"));
                $data["names"] = $this->input->post("names");  
                $data["surnames"] = $this->input->post("surnames");              
                $data["address"] = $this->input->post("address");
                $data["country"] = $this->input->post("country");
                $data["department"] = $this->input->post("department");
    
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
    

     /**
     * Login  del Usuario
     */
    public function login(){
        $this->load->model("user_model");
        //Pick up our post params
        $this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
  
        $data["username"] = $this->input->post("email");
        $data["password"] = md5($this->input->post("password"));
        
        if ($this->form_validation->run() == TRUE){
                //Call to our model
            $res = $this->user_model->login($data);   
                
            if($res != NULL){
                 
             echo json_encode(array("response"=>"success" ,"message"=>"Usuario Autenticado!"));
                $this->session->set_userdata("autenticado",true);            
                $this->session->set_userdata("user",$data["username"]);            
              //  redirect('/home');
            
            }else if($res === FALSE){
                echo json_encode(array("response"=>"errors","message"=>"Errores al Autenticarse" ));
            }else {
                    echo $res;
            }
  
        }else{
            echo json_encode(array("response" => "errors", "message" => validation_errors()));
        }
     
    }
/**
 * Cerrar Session
 */
    public function signOut(){
         $this->session->sess_destroy();  //Destruimos session      
        redirect('home');//redirigimos
    }
    
    
 }