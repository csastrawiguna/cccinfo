<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{    
	public function getUser($userid)
	{
		$this->db->select('user.id AS userid');
		$this->db->select('user.name AS name');
		$this->db->select('user.access AS access');
		$this->db->select('user.access_level AS access_level');
		$this->db->select('user.area_scope AS area_scope');
		$this->db->select('user.password AS password');
		$this->db->select('user_role.role_name AS role_name');
		$this->db->select('user_role.icon AS icon');
		$this->db->where('user.id', $userid);
		$this->db->join('user_role', 'ON user.access = user_role.id');
		return $this->db->get('user')->row_array();
	}		
}
