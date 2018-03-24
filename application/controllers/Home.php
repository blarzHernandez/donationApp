<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index(){
		$data["dinamic"]= "users/loginForm"; // view
		$this->load->view('template/main',$data);//render view
	}
}
