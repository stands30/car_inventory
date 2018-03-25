<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model 
{
	
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}
	function getCombo($sql,$value=false)
	{

		$query=$this->db->query($sql);
		$str='<option value="">Please Select </option>';
		foreach($query->result() as $row)
		{
			$selected="";
			if($value)
			{
				if($value==$row->f1)
				{
					$selected=" selected='selected'";
				}
			}
			$str.="<option value= ".$row->f1." ".$selected.">".$row->f2."</option>";
		}

		return $str;
	}
	function update($field, $id, $array, $table)
	{
		$this->db->where($field, $id);
		$this->db->update($table, $array);
	}
	function insert($table, $array)
	{
		$this->db->insert($table, $array);
		$id = $this->db->insert_id();
		return $id;
	}

	
}

?>