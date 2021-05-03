<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function viewajout($error=0)
	{
		session_start();
		if (!isset($_SESSION["token"])) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}elseif ($_SESSION["token"]==null) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}
		$this->load->model('Information_model');
		$data["info"]= $this->Information_model->findAllInformation();
		$data["error"] = $error;
		$data["title"] = "information covid-19";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "mis a jour et ajout de l' information sûr le COVID-19 du site..";
		$this->load->view('nav.php', $data);
		$this->load->view('information.php');
	}
	public function supprim($id=0)
	{
		$this->load->model('Information_model');
		if ($this->Information_model->delete($id) == "succes") {
			header('Location:' . $this->config->item('base_url') . 'information-covid-19-4.html');
		} else {
			header('Location:' . $this->config->item('base_url') . 'information-covid-19-3.html');
		}
	}
	public function ajout(){
		$this->load->model('Information_model');
		if ($this->Information_model->insert(new Information_model($_POST["categorie"], $_POST["descri"])) == "succes") {
			header('Location:'.$this->config->item('base_url').'information-covid-19-2.html');
		}else{
			header('Location:'.$this->config->item('base_url').'information-covid-19-1.html');
		}
	}
	public function index()
	{
		header('Location:'.$this->config->item('base_url').'information-covid-19-0.html');
	}
	
}
