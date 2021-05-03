<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actualite extends CI_Controller {

	public function viewajout($error=0)
	{
		session_start();
		if (!isset($_SESSION["token"])) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}elseif ($_SESSION["token"]==null) {
			header('Location:'.$this->config->item('base_url').'login-administrateur-site-coronavirus-0.html');
		}
		$this->load->model('Actualite_model');
		$data["actu"] = $this->Actualite_model->findactualites(1);
		$data["error"] = $error;
		$data["title"] = "actualite covid-19";
		$data["base_url"] = $this->config->item('base_url');
		$data["metacontent"] = "mis a jour et ajout de l' actualite sûr le COVID-19 du site..";
		$this->load->view('nav.php', $data);
		$this->load->view('actualite.php');
	}
	public function ajout(){
		$this->load->model('Actualite_model');
		if ($this->Actualite_model->insert(new Actualite_model($_POST["titre"], $_POST["evenement"], $_POST["dateevent"], $_POST["lieu"])) == "succes") {
			header('Location:'.$this->config->item('base_url').'actualite-covid-19-2.html');
		}else{
			header('Location:'.$this->config->item('base_url').'actualite-covid-19-1.html');
		}
	}
	public function supprim($id = 0)
	{
		$this->load->model('Actualite_model');
		if ($this->Actualite_model->delete($id) == "succes") {
			header('Location:' . $this->config->item('base_url') . 'actualite-covid-19-4.html');
		} else {
			header('Location:' . $this->config->item('base_url') . 'actualite-covid-19-3.html');
		}
	}
	public function index()
	{
		header('Location:'.$this->config->item('base_url').'actualite-covid-19-0.html');
	}
	
}
