<?php

function is_login()
{
    $ci = get_instance();
    $menu = $ci->uri->segment(1);    
    if (!$ci->session->userdata('userid')) {
    	redirect('dashboard');
    } else {    	
        $access = $ci->session->userdata('useraccess');        
        $query = "SELECT menu.link AS link, menu.id AS id, menu_access.role_access AS role_access FROM menu JOIN menu_access ON menu.id = menu_access.menu_id WHERE menu.link = '$menu' AND menu_access.role_access = '$access'";
        $queryMenu = $ci->db->query($query);

       	if ($queryMenu->num_rows() < 1) {
            redirect('dashboard');
        }        
    }
}

function check_access()
{
    $ci = get_instance();
    $role_access = $ci->session->userdata('useraccess');
    $menu = $ci->uri->segment(1);
    $submenu = $ci->uri->segment(2);

    $queryMenu = $ci->db->get_where('menu', ['link' => $menu])->row_array();
    $menu_id = $queryMenu['id'];

    // Check is have access to menu or not
    $queryCheckMenuAccess = "SELECT menu.id, menu.menu_name, menu.link FROM menu_access JOIN menu ON menu.id = menu_access.menu_id WHERE menu_access.role_access = '$role_access' AND menu_access.menu_id = '$menu_id'";
    if ($ci->db->query($queryCheckMenuAccess)->num_rows() < 1) {
        redirect('dashboard');
        //redirect('dashboard');
    } else {
        // Check is have access to submenu or not
        $accessedSubmenu = $menu . "/" . $submenu;

        // Get submenu id
        $submenu_id = $ci->db->get_where('submenu', ['link' => $accessedSubmenu])->row_array()['id'];

        // Check existing on submenu access or not
        $queryCheckSubmenuAccess = "SELECT submenu.id, submenu.link, submenu_access.role_access FROM submenu_access JOIN submenu ON submenu.id = submenu_access.submenu_id WHERE submenu_access.role_access = '$role_access' AND submenu_access.submenu_id = '$submenu_id'";

        // Get allowed submenu access
        $queryAllowedSubmenu = "SELECT submenu.id, submenu.link, submenu_access.role_access FROM submenu_access JOIN submenu ON submenu.id = submenu_access.submenu_id WHERE submenu_access.role_access = '$role_access' AND submenu.menu_id = '$menu_id'";
        $allowedSubmenu = $ci->db->query($queryAllowedSubmenu)->row_array()['link'];
        
        if ($ci->db->query($queryCheckSubmenuAccess)->num_rows() < 1) {            
            redirect('dashboard');
        }
    }
}

function admin_access()
{
    $ci = get_instance();
    $role_access = $ci->session->userdata('useraccess');
    $allowed = ['1', '9'];

    if (!in_array($role_access, $allowed)) {
        redirect('dashboard');
    } 
}

function part_access()
{
    $ci = get_instance();
    $access_level = $ci->session->userdata('accesslevel');
    $allowed = ['cs-ccc-cc30', 'cs-ccc-cc90', 'cs-ccc-cc99'];

    if (!in_array($access_level, $allowed)) {
        $ci->session->set_flashdata('message', "Access Forbidden|error|Anda tidak punya akses!");
            redirect('partcode/index');
    }
}

function check_submenu_access($submenu, $role_access)
{
    $ci = get_instance();
    $ci->db->where('submenu_id', $submenu);
    $ci->db->where('role_access', $role_access);
    $result = $ci->db->get('submenu_access')->num_rows();

    if ($result > 0) {
        return 'checked = "checked"';
    }
}

function check_menu_access($menu_id, $role_access)
{
    $ci = get_instance();
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('role_access', $role_access);
    $result = $ci->db->get('menu_access')->num_rows();

    if ($result > 0) {
        return 'checked = "checked"';
    }
}

