<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{    
	public function updatePassword($data)
    {
        $this->db->where('id', $data['user_id']);
        $this->db->set('password', $data['password']);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function getUserById($userid)
    {
        $query = "SELECT * FROM user JOIN user_role ON user.access = user_role.id WHERE user.id = '$userid'";
        return $this->db->query($query)->row_array();
    }

    public function getCurrentProfileData($userid)
    {
        $this->db->where('id', $userid);
        return $this->db->get('user')->row_array();
    }
}
