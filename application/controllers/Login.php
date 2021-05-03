<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function log($error=0){
		session_start();
		session_destroy();
		$data["error"] = $error;
		$data["base_url"] = $this->config->item('base_url');
		$this->load->view('login.php', $data);
	}
	public function checklog()
	{
		session_start();
		$this->load->model('Admin_model');
		$check= $this->Admin_model->connect($_POST["username"], $_POST["mdp"]);
		if ($check["status"]=="error") {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-1.html');
		}else{
			$_SESSION["token"] = $check["data"];
			header('Location:'.$this->config->item('base_url').'information-covid-19-0.html');
		}
	}
	public function index() //page de connection
	{
		session_start();
		session_destroy();
		header('Location:' . $this->config->item('base_url') . 'login-administrateur-site-coronavirus-0.html');
	}
	public function logOut()
	{
		session_start();
		session_destroy();
		header('Location:' . $this->config->item('base_url') . 'login-administrateur-site-coronavirus-0.html');
	}
}
