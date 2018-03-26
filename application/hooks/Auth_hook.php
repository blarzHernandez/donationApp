<?php

/* 
 * Hook para  verificar si un usuario esta autenticado y tiene permisos
 * del controlador
 * @autor: Blarz
 */

class Auth_hook {
    /**
     *
     * @var object CI 
     */
    private $ci;
    
    /**
     * Especifica los Controllers permitidos para usuarios no autenticados
     * @var array
     */ 
    private $allowedControllers;
    
    /**
     * Especifica  los metodos permitidos para usuarios no autenticados
     * @var array;
     */
    private $allowedMethods;
    
    
    /**
     * Especifica los metodos no permitidos
     * @var array
     */
    private $disallowedMethod;
    
    //Construct
    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->library('session');
        $cia = $this->ci->input->post("cia");
        //$this->ci->session->set_userdata("cia",$cia);
       
        $this->allowedControllers   = ['home','userController','servicexxx'];//Controllers permitidos
        $this->allowedMethods       = ['login','signupRenderView',
                                       'renderView'];//Metodos permitidos
        
        
        $this->disallowedMethod     = ['index'];//Metodos no permitidos
      //  $this->ci->load->helper('url');
      
      
        
    }
    
    /** 
     * Verificar si esta autenticado
     */
    public function checkAutenticado(){
        $class      = $this->ci->router->class;
        $method     = $this->ci->router->method;    
        
        $sesionAut  = $this->ci->session->userdata('autenticado');
        
        if($sesionAut == FALSE && !in_array($class, $this->allowedControllers)){
       
            if(!in_array($method, $this->allowedMethods)){                
                
                    redirect(base_url('home'));
                
              
            }
        }
       
        
        
        
        
    }
       
    
    
}//End class