<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function index()
	{
		$data["_title"] = "Dashboard";
		$this->layout->add_static_css("dashboard.css");
		$this->layout->display("welcome", $data);
	}

	public function generate_password(){
		$username = "sdm2";
		$salt = "R4h4s1A";
		$password = "sdm2";
		$encrypted_pass = sha1($password. $salt . $username);
		var_dump($encrypted_pass);
	}
}
