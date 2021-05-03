<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistique extends CI_Controller {

	public function viewajout($error=0)
	{
		session_start();
		if (!isset($_SESSION["token"])) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}elseif ($_SESSION["token"]==null) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}
		$this->load->model('Statistique_model');
		$data["statlocal"] = $this->Statistique_model->findStatistiques(2);
		$data["statmondiale"] = $this->Statistique_model->findStatistiques(1);
		$data["error"] = $error;
		$data["title"] = "statistique covid-19";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "mis a jour et ajout de la statistique des cas sûr le COVID-19 du site..";
		$this->load->view('nav.php', $data);
		$this->load->view('statistique.php');
	}
	public function supprim()
	{
		$this->load->model('Statistique_model');
		if ($this->Statistique_model->resetAll() == "succes") {
			header('Location:' . $this->config->item('base_url') . 'statistique-covid-19-4.html');
		} else {
			header('Location:' . $this->config->item('base_url') . 'statistique-covid-19-3.html');
		}
	}
	public function ajout(){
		$this->load->model('Statistique_model');
		if ($this->Statistique_model->insert(new Statistique_model($_POST["nouveaucas"], $_POST["gueris"], $_POST["deces"], $_POST["lieu"])) == "succes") {
			header('Location:'.$this->config->item('base_url').'statistique-covid-19-2.html');
		}else{
			header('Location:'.$this->config->item('base_url').'statistique-covid-19-1.html');
		}
	}
	public function index()
	{
		header('Location:'.$this->config->item('base_url').'statistique-covid-19-0.html');
	}
	
}
