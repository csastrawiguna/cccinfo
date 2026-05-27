<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Technician_model extends CI_Model
{
    var $table = 'technician';
    //set kolom order, terakhir null untuk kolom edit dan hapus
    var $column_order = [null, 'svc_group', 'name', 'phone1', 'phone2', 'phone3', 'phone4', 'remark', null];

    var $column_search = ['svc_group', 'name', 'remark', 'phone1', 'phone2', 'phone3', 'phone4'];
    // default order 
    var $order = ['name' => 'asc'];

    public $complaint;

    public function __construct()
    {
        parent::__construct();
        $this->complaint = $this->load->database('complaint', TRUE);;
    }

    private function _get_datatables_query()
    {
        $this->complaint->from('technician');
        $this->complaint->where('is_active', 1);
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

    public function getAllTechnicianByBranch($branch)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $complaint->select('branch_service.svc_name_group AS svc_name_group');
        $complaint->select('technician.id AS id');
        $complaint->select('technician.name AS name');
        $complaint->select('technician.phone1 AS phone1');
        $complaint->select('technician.phone2 AS phone2');
        $complaint->select('technician.phone3 AS phone3');
        $complaint->select('technician.phone4 AS phone4');
        $complaint->select('technician.phone1_remark AS phone1_remark');
        $complaint->select('technician.phone2_remark AS phone2_remark');
        $complaint->select('technician.phone3_remark AS phone3_remark');
        $complaint->select('technician.phone4_remark AS phone4_remark');
        $complaint->select('technician.remark AS remark');
        $complaint->select('technician.saved_by AS saved_by');
        $complaint->select('technician.saved_at AS saved_at');
        $complaint->select('technician.updated_by AS updated_by');
        $complaint->select('technician.updated_at AS updated_at');
        $complaint->join('branch_service', 'ON technician.svc_group = branch_service.svc_name_group');
        $complaint->where('branch_service.svc_name_group', $branch);
        $complaint->where('technician.is_active', 1);
        $complaint->group_by('technician.name');
        $complaint->order_by('branch_service.svc_type', 'ASC');
        $complaint->order_by('branch_service.svc_name_group', 'ASC');
        $complaint->order_by('technician.name', 'ASC');
        return $complaint->get('technician')->result_array();
    }

    public function getAllTechnician()
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $complaint->select('branch_service.svc_name_group AS svc_name_group');
        $complaint->select('technician.id AS id');
        $complaint->select('technician.name AS name');
        $complaint->select('technician.phone1 AS phone1');
        $complaint->select('technician.phone2 AS phone2');
        $complaint->select('technician.phone3 AS phone3');
        $complaint->select('technician.phone4 AS phone4');
        $complaint->select('technician.phone1_remark AS phone1_remark');
        $complaint->select('technician.phone2_remark AS phone2_remark');
        $complaint->select('technician.phone3_remark AS phone3_remark');
        $complaint->select('technician.phone4_remark AS phone4_remark');
        $complaint->select('technician.remark AS remark');
        $complaint->select('technician.saved_by AS saved_by');
        $complaint->select('technician.saved_at AS saved_at');
        $complaint->select('technician.updated_by AS updated_by');
        $complaint->select('technician.updated_at AS updated_at');
        $complaint->join('branch_service', 'ON technician.svc_group = branch_service.svc_name_group');
        $complaint->where('technician.is_active', 1);
        $complaint->group_by('technician.id');
        $complaint->order_by('branch_service.svc_type', 'ASC');
        $complaint->order_by('branch_service.svc_name_group', 'ASC');
        $complaint->order_by('technician.name', 'ASC');
        return $complaint->get('technician')->result_array();
    }

    public function getAllSvcBranch()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->distinct();
        $complaint->select('branch_service.id AS svc_id');
        $complaint->select('branch_service.svc_name_group AS svc_name_group');
        $complaint->order_by('branch_service.svc_name_group', 'ASC');
        $complaint->join('branch_service', 'ON technician.svc_group = branch_service.svc_name_group');
        $complaint->where('technician.is_active', 1);
        return $complaint->get('technician')->result_array();
    }

    public function checkExisting($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $complaint->like('phone1', $data, 'none', false);
        $complaint->or_like('phone2', $data, 'none', false);
        $complaint->or_like('phone3', $data, 'none', false);
        $complaint->or_like('phone4', $data, 'none', false);
        return $complaint->get('technician')->num_rows();
    }

    public function insertSingleData($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->insert('technician', $data);
        return $complaint->affected_rows();
    }

    public function deleteTechnician($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->delete('technician');
        return $complaint->affected_rows();
    }

    public function getTechnicianById($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('technician.id AS id');
        $complaint->select('technician.svc_group');
        $complaint->select('technician.name AS name');
        $complaint->select('technician.phone1 AS phone1');
        $complaint->select('technician.phone2 AS phone2');
        $complaint->select('technician.phone3 AS phone3');
        $complaint->select('technician.phone4 AS phone4');
        $complaint->select('technician.phone1_remark AS phone1_remark');
        $complaint->select('technician.phone2_remark AS phone2_remark');
        $complaint->select('technician.phone3_remark AS phone3_remark');
        $complaint->select('technician.phone4_remark AS phone4_remark');
        $complaint->select('technician.remark AS remark');
        $complaint->select('technician.status AS status');
        $complaint->select('technician.is_active AS is_active');
        $complaint->select('branch_service.svc_type AS svc_type');
        $complaint->join('branch_service', 'ON branch_service.svc_name_group = technician.svc_group');
        $complaint->where('technician.id', $id);
        return $complaint->get('technician')->row_array();
    }

    public function updateSingleData($data)
    {        
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $data['id']);
        $complaint->update('technician', $data);
        return $complaint->affected_rows();
    }

    public function getAllInactiveTechnician()
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $complaint->select('branch_service.svc_name_group AS svc_name_group');
        $complaint->select('technician.id AS id');
        $complaint->select('technician.name AS name');
        $complaint->select('technician.phone1 AS phone1');
        $complaint->select('technician.phone2 AS phone2');
        $complaint->select('technician.phone3 AS phone3');
        $complaint->select('technician.phone4 AS phone4');
        $complaint->select('technician.phone1_remark AS phone1_remark');
        $complaint->select('technician.phone2_remark AS phone2_remark');
        $complaint->select('technician.phone3_remark AS phone3_remark');
        $complaint->select('technician.phone4_remark AS phone4_remark');
        $complaint->select('technician.remark AS remark');
        $complaint->select('technician.saved_by AS saved_by');
        $complaint->select('technician.saved_at AS saved_at');
        $complaint->select('technician.updated_by AS updated_by');
        $complaint->select('technician.updated_at AS updated_at');
        $complaint->join('branch_service', 'ON technician.svc_group = branch_service.svc_name_group');
        $complaint->where('technician.is_active', 0);
        $complaint->group_by('technician.id');
        $complaint->order_by('branch_service.svc_type', 'ASC');
        $complaint->order_by('branch_service.svc_name_group', 'ASC');
        $complaint->order_by('technician.name', 'ASC');
        return $complaint->get('technician')->result_array();
    }


}
