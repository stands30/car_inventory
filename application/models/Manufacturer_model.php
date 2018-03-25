<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Manufacturer_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
	
	
   public function mfrInsert()
   {
    	$mfr_data = array();
    	$mfr_data['mfr_name']     = $this->input->post('mfrName');
    	$mfr_data['mfr_status']   = ACTIVE_STATUS;

    	$mfr_id = $this->Home_model->insert('manufacturer', $mfr_data);
      return $mfr_id;
   }
     public function mfrUpdate()
   {
      $mfr_data = array();
      $mfr_data['mfr_name']     = $this->input->post('mfrName');
      $mfr_data['mfr_status']   = ACTIVE_STATUS;

      $mfr_id = $this->Home_model->update('mfr_id',$this->input->post('mfrId'),$mfr_data,'manufacturer');
      return true;
   }
   public function getMfrData()
   {
    $sql = "SELECT mfr_id,mfr_name,mfr_crtd_dt from manufacturer where mfr_status='".ACTIVE_STATUS."' ";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
   }
   
}

?>