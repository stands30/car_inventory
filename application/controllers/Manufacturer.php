<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Manufacturer_model');		
	}
	public function index()
	{
		$data['manufacturer'] =$this->Manufacturer_model->getMfrData();
		$this->load->view('manufacturer_list',$data);
	}
	public function manufacturerSaveData()
	{
		$success    = false;
		$successMsg = "";
		$mfrId = $this->input->post('mfrId');
			if($mfrId == '')
			{
				//INSERT DATA
			    $mfrInsertId = $this->Manufacturer_model->mfrInsert();
			    if($mfrInsertId != '-1')
			    {
			    	$success    = true;
				    $successMsg = "Manufacturer Added Successfully";
			    }
				
			}
			else
			{
				//Update Data
				$mfrUpdate= $this->Manufacturer_model->mfrUpdate();
				if($mfrUpdate)
				{
				    $success    = true;
				    $successMsg = "Manufacturer Updated Successfully";
				}
			}
			if($success != true)
			{
				$successMsg = "Some Error Occured";

			}
	
		$response = array('success'=>$success,'message'=>$successMsg);
		echo json_encode($response);
	}
}
?>