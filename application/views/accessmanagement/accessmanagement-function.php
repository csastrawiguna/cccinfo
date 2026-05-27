<?php 

// menu access
if (!$this->input->post('accessMenuSelectLevel')){
	$selectUserAccessId = $this->session->userdata('useraccess');
	$selectUserAccessName = $this->session->userdata('useraccessname');
} else {
	$selectUserAccessId = $this->input->post('accessMenuSelectLevel');
	$selectUserAccessName = $this->db->get_where('user_role', ['id' => $this->input->post('accessMenuSelectLevel')])->row_array()['role_name'];
}

if (!$this->input->post('accessSubmenuSelectLevel')){
	$selectUserAccessId = $this->session->userdata('useraccess');
	$selectUserAccessName = $this->session->userdata('useraccessname');
} else {
	$selectUserAccessId = $this->input->post('accessSubmenuSelectLevel');
	$selectUserAccessName = $this->db->get_where('user_role', ['id' => $this->input->post('accessSubmenuSelectLevel')])->row_array()['role_name'];
}


?>