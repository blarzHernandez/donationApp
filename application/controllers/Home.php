<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index(){
		$data["dinamic"]= "users/loginForm"; // view
		$this->load->view('template/main',$data);//render view
	}


	public function signup(){
		$data["dinamic"]= "users/signUpForm"; // view
		$data['countriesList'] = array(
			array("COUNTRY_ID"=>1,"AB"=>"SV","NAME"=>'El Salvador'),
			array("COUNTRY_ID"=>2,"AB"=>"HD","NAME"=>'Honduras'),
			array("COUNTRY_ID"=>3,"AB"=>"GT","NAME"=>'Guatemala')
		);


		$data['departmentList'] = array(
			array("DEPARTMENT_ID"=>1,"AB"=>"SV","NAME"=>'San Vicente'),
			array("DEPARTMENT_ID"=>2,"AB"=>"SM","NAME"=>'San Migue'),
			array("DEPARTMENT_IDID"=>3,"AB"=>"SS","NAME"=>'San Salvador')
		);


		$this->load->view('template/main',$data);//render view
	}



}
