<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

 // $this->config->item('base_url');
	public function index()
	{
		$this->load->view('inventory_list');
	}
}
?>