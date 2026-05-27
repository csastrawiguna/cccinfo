<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accessmanagement_model extends CI_Model
{    
	public function getAllAccessLevelWithoutSuperadmin()
	{
		return $this->db->get_where('user_role', ['id !=' => 9])->result_array();
	}	
	
	public function getAllAccessLevel()
	{
		return $this->db->get('user_role')->result_array();
	}

	// public function getAllAccessLevelWithoutSuperadmin()
	// {
	// 	$this->db->select('id');
	// 	$this->db->select('role_name');
	// 	$this->db->select('icon');
	// 	$this->db->where('id !=', 9);
	// 	return $this->db->get('user_role')->result_array();
	// }

	public function getAllMenuAccessWithoutSuperadmin($roleAccess = 1)
	{
		$this->db->select('menu.id AS id');
		$this->db->select('menu.menu_name AS menu_name');
		$this->db->select('menu.link AS link');
		$this->db->select('menu.icon AS icon');
		$this->db->select('menu.need_session AS need_session');
		$this->db->select('menu_access.role_access AS role_access');
		$this->db->join('menu_access', 'ON menu_access.menu_id = menu.id');
		$this->db->where('menu.id !=', 99);
		$this->db->where('menu.id !=', 98);
		$this->db->where('menu_access.role_access !=', 9);
		$this->db->order_by('menu.id', 'ASC');
		$this->db->where('menu_access.role_access', $roleAccess);
		return $this->db->get('menu')->result_array();
	}	
	
	public function getAllMenuAccess($roleAccess)
	{
		$this->db->select('menu.id AS id');
		$this->db->select('menu.menu_name AS menu_name');
		$this->db->select('menu.link AS link');
		$this->db->select('menu.icon AS icon');
		// $this->db->select('menu.need_session AS need_session');
		$this->db->select('menu_access.role_access AS role_access');
		$this->db->join('menu_access', 'ON menu_access.menu_id = menu.id');
		$this->db->order_by('menu.id', 'ASC');
		$this->db->where('menu_access.role_access', $roleAccess);
		return $this->db->get('menu')->result_array();
	}

	public function getUnassignedMenu($roleAccess)
	{
		$query = "SELECT menu.id AS menu_id, menu.icon AS menu_icon, menu.menu_name AS menu_name FROM menu WHERE menu.id NOT IN (SELECT menu_access.menu_id AS menu_id FROM menu_access WHERE menu_access.role_access = '$roleAccess') AND menu.id NOT LIKE 98";
        return $this->db->query($query)->result_array();
	}

	public function getRoleByAccessLevel($roleAccess)
    {
        $this->db->where('id', $roleAccess);
        return $this->db->get('user_role')->row_array()['role_name'];
    }

	public function getAllSubmenuAccess($roleAccess)
	{
		$this->db->select('submenu.id AS id');
		$this->db->select('submenu.name AS submenu_name');
		$this->db->select('submenu.link AS link');
		$this->db->select('submenu_access.role_access AS role_access');
		$this->db->join('submenu_access', 'ON submenu_access.submenu_id = submenu.id');
		$this->db->order_by('submenu.id', 'ASC');
		$this->db->where('submenu_access.role_access', $roleAccess);
		return $this->db->get('submenu')->result_array();
	}

	public function getUnassignedSubmenu($roleAccess)
	{
		$query = "SELECT submenu.id AS submenu_id, submenu.name AS submenu_name FROM submenu WHERE submenu.id NOT IN (SELECT submenu_access.submenu_id AS submenu_id FROM submenu_access WHERE submenu_access.role_access = '$roleAccess')";
        return $this->db->query($query)->result_array();
	}

	public function getAllMenus($access_level)
    {
        $this->db->where('role_access', $access_level);
        // $this->db->where('menu_access.menu_id !=', 97);
        $this->db->where('menu_access.menu_id !=', 98);
        // $this->db->where('menu_access.menu_id !=', 99);
        $this->db->join('menu', 'menu.id = menu_access.menu_id');
        $this->db->order_by('menu.id', 'ASC');
        return $this->db->get('menu_access')->result_array();
    }

    public function performDismissMenuAccess($menuid, $roleAccess)
    {
        $this->db->where('menu_id', $menuid);
        $this->db->where('role_access', $roleAccess);
        $this->db->delete('menu_access');
        return $this->db->affected_rows();
    }

    public function performAddMenuAccess($data)
    {    	
        $this->db->insert_batch('menu_access', $data);
        return $this->db->affected_rows();
    }

    public function deleteSubmenuAccess($submenuid, $roleaccess)
    {
        $this->db->where('submenu_id', $submenuid);
        $this->db->where('role_access', $roleaccess);
        $this->db->delete('submenu_access');
        return $this->db->affected_rows();
    }

    public function addSubmenuAccess($submenuid, $roleaccess)
    {
        $data = [
            'submenu_id' => $submenuid,
            'role_access' => $roleaccess
        ];
        $this->db->insert('submenu_access', $data);
        return $this->db->affected_rows();
    }
}
