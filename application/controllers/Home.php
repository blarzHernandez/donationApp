<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index(){
		if($this->session->userdata("autenticado") == TRUE){
			$this->load->model("Recipient_model");//cargamos nuestro modelo 
			$this->load->model("PaymentMethod_model");//cargamos nuestro modelo 
			$recipients = $this->Recipient_model->getAllrecipients(); //obtemos todos los paises       
			$data['recipientsList'] = $recipients;//Se lo pasamos a la vista como un array  

			$paymentMethodsList = $this->PaymentMethod_model->getAllpaymentMethodsList(); //obtemos todos los paises       
			$data['paymentMethodsList'] = $paymentMethodsList;//Se lo pasamos a la vista como un array  
			$data["dinamic"]= "dashboard"; // view

		}else{
			$data["dinamic"]= "users/loginForm"; // view
		}
		
		$this->load->view('template/main',$data);//render view
	}
}
