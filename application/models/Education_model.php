<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education_model extends CI_Model
{
 	public function getAllBasicProducts()
 	{
 		return $this->db->get_where('education_material', ['group_category' => 'Product'])->result_array();
 	}
}
