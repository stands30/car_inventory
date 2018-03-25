<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Carmodel_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
   public function CarmdlInsert()
   {

    	$mdl_data = array();
      $mdl_data['mdl_mfr_id']   = $this->input->post('mdl_mfr_id');
      $mdl_data['mdl_name']     = $this->input->post('mdlName');
    	$mdl_data['mdl_count']     = $this->input->post('mdlCount');
    	$mdl_data['mdl_status']   = ACTIVE_STATUS;
    	$mdl_id = $this->Home_model->insert('model', $mdl_data);
      return $mdl_id;
   }
   public function CarmdlUpdate()
   {
      $mdl_data = array();
      $mdl_data['mdl_mfr_id']   = $this->input->post('mdl_mfr_id');
      $mdl_data['mdl_name']     = $this->input->post('mdlName');
      $mdl_data['mdl_count']     = $this->input->post('mdlCount');
      $mdl_id = $this->Home_model->update('mdl_id',$this->input->post('mdlId'),$mdl_data,'model');
      return true;
   }
   public function getCarmdlData()
   {
    $sql = "SELECT mdl_id,mdl_name,mdl_crtd_dt,mdl_mfr_id,mdl_count,(SELECT mfr_name from manufacturer where mfr_id=mdl_mfr_id) mfr_name from model where mdl_status='".ACTIVE_STATUS."' ";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
   }
  public function updateSoldData($count,$mdlId,$status)
   {
      $mdl_data = array();
      $mdl_data['mdl_count']     = $count;
      $mdl_data['mdl_status']    = $status;
      $mdl_id = $this->Home_model->update('mdl_id',$mdlId,$mdl_data,'model');
      return true;
   }
}

?>