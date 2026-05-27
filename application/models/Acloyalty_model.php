<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acloyalty_model extends CI_Model
{    
	public function getAllRegistration()
	{
		$this->db->order_by('joindate', 'ASC');
		return $this->db->get('acloyalty_registration')->result_array();
	}
}
