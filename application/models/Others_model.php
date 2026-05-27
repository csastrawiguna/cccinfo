<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Others_model extends CI_Model
{
	public function getAllUser()
	{
		$this->db->order_by('share', 'DESC');
		$this->db->order_by('access', 'DESC');
		$this->db->order_by('username', 'ASC');
		return $this->db->get('sap_user')->result_array();
	}

	public function getAllSerialNumberCode()
	{
		$this->db->order_by('category', 'DESC');
		$this->db->order_by('model', 'DESC');
		return $this->db->get('serial_number_code')->result_array();
	}

	public function getSapdataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('sap_user')->row_array();
	}

	public function updateSapById($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->set('username', $data['username']);
		$this->db->set('name', $data['name']);
		$this->db->set('password', $data['password']);
		$this->db->set('access', $data['access']);
		$this->db->set('share', $data['share']);
		$this->db->set('remark', $data['remark']);
		$this->db->set('updated_by', $data['updated_by']);
		$this->db->set('updated_at', $data['updated_at']);
		$this->db->update('sap_user', $data);
		return $this->db->affected_rows();
	}

	public function getSingleSerial($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('serial_number_code')->row_array();
	}

	public function addNewSerial($data)
	{
		$this->db->insert('serial_number_code', $data);
		return $this->db->affected_rows();	
	}

	public function updateSerial($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('serial_number_code', $data);
		return $this->db->affected_rows();	
	}

	public function deleteSerial($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('serial_number_code');
		return $this->db->affected_rows();
	}

	public function uploadSerialFromExcel($data)
	{
		$this->db->insert_batch('serial_number_code', $data);
		return $this->db->affected_rows();
	}
}
