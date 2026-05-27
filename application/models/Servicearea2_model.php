<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servicearea2_model extends CI_Model
{
    var $table = 'bc_svc_area';
    //set kolom order, terakhir null untuk kolom edit dan hapus
    var $column_order = [null, 'address', 'subdistrict', 'district', 'city', 'province',  'postal_code', 'under_svc', 'remark'];

    var $column_search = [null, 'address', 'subdistrict', 'district', 'city', 'province', 'postal_code', 'under_svc', 'remark'];
    // default order 
    var $order = ['under_svc' => 'asc'];

    public $complaint;

    public function __construct()
    {
        parent::__construct();
        $this->complaint = $this->load->database('complaint', TRUE);;
    }

    private function _get_query() {
        $this->complaint->from($this->table);
        
        // 1. Individual Column Search
        // Pake group_start supaya query AND (kolom search) henteu kaganggu ku OR (global search)
        foreach ($this->column_search as $i => $item) {
            if ($item) { // Cek lamun ngaran kolomna aya (lain null)
                $val = $this->input->post('columns')[$i]['search']['value'];
                if ($val) {
                    $this->complaint->like($item, $val);
                }
            }
        }

        // 2. Global Search
        $search_value = $this->input->post('search')['value'];
        if ($search_value) {
            $this->complaint->group_start(); // Mimitian kurung (
            foreach ($this->column_search as $i => $item) {
                if ($item) { // Skip index 0 anu isina null
                    if ($i === 1) { // Anu mimiti pake LIKE
                        $this->complaint->like($item, $search_value);
                    } else { // Saterusna pake OR LIKE
                        $this->complaint->or_like($item, $search_value);
                    }
                }
            }
            $this->complaint->group_end(); // Tutup kurung )
        }

        // 3. Ordering
        if ($this->input->post('order')) {
            $order_col = $this->column_order[$this->input->post('order')['0']['column']];
            if($order_col) {
                $this->complaint->order_by($order_col, $this->input->post('order')['0']['dir']);
            }
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->complaint->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables() {
        $this->_get_query();
        if ($this->input->post('length') != -1)
            $this->complaint->limit($this->input->post('length'), $this->input->post('start'));
        return $this->complaint->get()->result();
    }

    public function count_filtered() {
        $this->_get_query();
        return $this->complaint->get()->num_rows();
    }

    public function count_all() {
        return $this->complaint->count_all_results($this->table);
    }

    public function getAllArea()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->order_by('subdistrict', 'DESC');
    	return $complaint->get('svc_area')->result_array();
    }

    public function getAllSvccenter()
    {
        $complaint = $this->load->database('complaint', TRUE);
    	$complaint->select('svc_type');
    	$complaint->select('svc_name');
    	$complaint->where('svc_type !=', 'SASS');    	
    	$complaint->order_by('svc_type', 'ASC');
    	$complaint->order_by('svc_name', 'ASC');
    	return $complaint->get('branch_service')->result_array();
    }

    public function getAreaById($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        return $complaint->get('svc_area')->row_array();
    }

    public function updateArea($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $data['id']);
        $complaint->update('svc_area', $data);
        return $complaint->affected_rows();
    }

    public function addArea($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->insert('svc_area', $data);
        return $complaint->affected_rows();
    }

    public function delete($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->delete('svc_area');
        return $complaint->affected_rows();
    }

}