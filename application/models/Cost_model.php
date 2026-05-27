<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost_model extends CI_Model
{    
	public function getAllPartPrice()
	{
		return $this->db->get('part_price')->result_array();
	}

	public function getLatestPeriod()
	{
		$this->db->distinct();
		$this->db->select('period');
		return $this->db->get('part_price')->row_array();
	}	

	public function getPeriod()
	{
		$this->db->distinct();
		$this->db->select('period');
		return $this->db->get('part_price')->result_array();
	}

	public function getFreonacCostByModel($model)
	{
		$this->db->select('*');
		$this->db->where('model', $model);
		$this->db->join('svc_cost_freonac_type', 'ON svc_cost_freonac_model.type_capacity_id = svc_cost_freonac_type.id');
		return $this->db->get('svc_cost_freonac_model');
	}
}
