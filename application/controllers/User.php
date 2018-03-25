<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

 // $this->config->item('base_url');
	public function index()
	{
		$this->load->view('user_list');
	}
}
?>