<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarModel extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Carmodel_model');		
	}
	public function index()
	{
		$data['Carmodel_'] =$this->Carmodel_model->getCarmdlData();
		$this->load->view('model_list',$data);
	}
	public function carMdlSaveData()
	{
		$success    = false;
		$successMsg = "";
		$mdlId = $this->input->post('mdlId');
			if($mdlId == '')
			{
				//INSERT DATA
			    $carmdlInsertId = $this->Carmodel_model->CarmdlInsert();
			    if($carmdlInsertId != '-1')
			    {
			    	$success    = true;
				    $successMsg = "Manufacturer Added Successfully";
			    }
				
			}
			else
			{
				//Update Data
				$carMdlUpdate= $this->Carmodel_model->CarmdlUpdate();
				if($carMdlUpdate)
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
	public function inventory_list()
	{
		$data['inventory'] =$this->Carmodel_model->getCarmdlData();
		$this->load->view('inventory_list',$data);
	}
	public function updateSoldData()
	{
		 $mdlid    = $this->input->post('mdlId');
		 $mdlCount = $this->input->post('mdlCount');
		 if($mdlCount <= 1)
		 {
		 	$mdl = $this->Carmodel_model->updateSoldData($mdlCount,$mdlid,INACTIVE_STATUS);
		 }
		 else
		 {
		 	 $count = $mdlCount-1;
		 	$mdl = $this->Carmodel_model->updateSoldData($count,$mdlid,ACTIVE_STATUS);
		 }
		 if($mdl)
		 {
		 	$success = true;
		 	$message = 'Data Updated Successfully';
		 }
		 else
		 {
		 	$success = false;
		 	$message = 'Some error occured';

		 }
		 $response = array('success'=>$success,'message'=>$message);
		    echo json_encode($response);
	}
}
?>