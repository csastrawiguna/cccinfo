<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servicearea_model extends CI_Model
{
    var $table = 'svc_area';
    //set kolom order, terakhir null untuk kolom edit dan hapus
    var $column_order = [null, 'address', 'subdistrict', 'district', 'city', 'province', 'under_svc', 'remark', null];

    var $column_search = ['address', 'subdistrict', 'district', 'city', 'province', 'remark'];
    // default order 
    var $order = ['under_svc' => 'asc'];

    public $complaint;

    public function __construct()
    {
        parent::__construct();
        $this->complaint = $this->load->database('complaint', TRUE);;
    }

    private function _get_datatables_query()
    {
        $this->complaint->from('svc_area');
        $i = 0;
        foreach ($this->column_search as $item) // loop kolom 
        {
            if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
            {
                if ($i === 0) // looping pertama
                {
                    $this->complaint->group_start();
                    $this->complaint->like($item, $this->input->post('search')['value']);
                } else {
                    $this->complaint->or_like($item, $this->input->post('search')['value']);
                }
                if (count($this->column_search) - 1 == $i) //looping terakhir
                    $this->complaint->group_end();
            }
            $i++;
        }

        // jika datatable mengirim POST untuk order
        if ($this->input->post('order')) {
            $this->complaint->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->complaint->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->complaint->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->complaint->get();
        return $query->result_array();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->complaint->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->complaint->from($this->table);
        return $this->complaint->count_all_results();
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
