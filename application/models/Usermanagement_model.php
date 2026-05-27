<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement_model extends CI_Model {

	public function getAllUser()
	{
		$this->db->select('user.id AS id');
		$this->db->select('user.name AS name');
		$this->db->select('user_role.role_name AS role_name');
		$this->db->order_by('user_role.role_name', 'ASC');
		$this->db->join('user_role', 'ON user_role.id = user.access');
		return $this->db->get('user')->result_array();
	}

	public function addNewUser($data)
	{
		$this->db->insert('user', $data);
		return $this->db->affected_rows();
	}

	public function deleteUserById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		return $this->db->affected_rows();
	}

	public function updatePassword($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->set('password', $data['password']);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function setLoginFrom($data)
    {
    	$this->db->where('id', $data['userid']);
        $this->db->set('latest_login_on', $data['ip_address']);
        $this->db->set('latest_login_at', $data['latest_login']);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function deleteLoginFrom($data)
    {
    	$this->db->where('id', $data['userid']);
        $this->db->set('latest_login_on', null);
        $this->db->set('latest_login_at', null);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function resetDefaultPassword($data)
    {
        $this->db->where('id', $data['userid']);
        $this->db->set('latest_login_on', null);
        $this->db->set('latest_login_at', null);
        $this->db->set('password', $data['password']);
        $this->db->update('user');
        return $this->db->affected_rows();   
    }

    public function getAllAccessLevel()
    {
        return $this->db->get('user_role')->result_array();      
    }
}
