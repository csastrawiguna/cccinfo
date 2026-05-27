<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servicearea_model extends CI_Model
{
    var $table = 'svc_area';
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
        $this->complaint->order_by('subdistrict', 'DESC');
    	return $this->complaint->get('svc_area')->result_array();
    }

    public function getAllSvccenter()
    {
    	$this->complaint->select('svc_type');
    	$this->complaint->select('svc_name');
    	$this->complaint->where('svc_type !=', 'SASS');    	
    	$this->complaint->order_by('svc_type', 'ASC');
    	$this->complaint->order_by('svc_name', 'ASC');
    	return $this->complaint->get('branch_service')->result_array();
    }

    public function getAreaById($id)
    {
        $this->complaint->where('id', $id);
        return $this->complaint->get('svc_area')->row_array();
    }

    public function updateArea($data)
    {
        $this->complaint->where('id', $data['id']);
        $this->complaint->update('svc_area', $data);
        return $this->complaint->affected_rows();
    }

    public function addArea($data)
    {
        $this->complaint->insert('svc_area', $data);
        return $this->complaint->affected_rows();
    }

    public function delete($id)
    {
        $this->complaint->where('id', $id);
        $this->complaint->delete('svc_area');
        return $this->complaint->affected_rows();
    }

    public function getAllProvinces()
    {
        $this->complaint->distinct();
        $this->complaint->select('province');
        $this->complaint->order_by('province');
        return $this->complaint->get('svc_area')->result_array();
    }

    public function getAreaByPostalcode($postalcode)
    {
        $this->complaint->where('postal_code', $postalcode);
        return $this->complaint->get('svc_area')->row_array();
    }

    public function getCityByProvince($province)
    {
        $this->complaint->select('city, MIN(id) AS id');
        $this->complaint->where('province', $province);
        $this->complaint->group_by('city');
        $this->complaint->order_by('city');
        return $this->complaint->get('svc_area')->result_array();
    }

    public function getDistrictByCity($province, $cities)
    {
        $this->complaint->select('district, city, MIN(id) AS id');
        $this->complaint->where('province ', $province);
        $this->complaint->where_in('city ', $cities);
        $this->complaint->group_by('district');
        $this->complaint->order_by('city');
        $this->complaint->order_by('district');
        return $this->complaint->get('svc_area')->result_array();
    }

    public function getSubdistrictByDistrict($province, $cities, $district)
    {
        $this->complaint->select('subdistrict, district, city, MIN(id) AS id');
        $this->complaint->where('province ', $province);
        $this->complaint->where_in('city', $cities);
        $this->complaint->where_in('district', $district);
        $this->complaint->group_by('subdistrict');
        $this->complaint->order_by('city');
        $this->complaint->order_by('district');
        $this->complaint->order_by('subdistrict');
        return $this->complaint->get('svc_area')->result_array();
    }

    public function getCoveredServiceCenter($city = '', $districts = '')
    {
        $this->complaint->select('under_svc, sap_code, notif_type, remark, MIN(id) AS id');
        if (!empty($city) && is_array($city)) {
            $this->complaint->where_in('city', $city);
        }
        if (!empty($districts) && is_array($districts)) {
            $this->complaint->where_in('district', $districts);
        }
        $this->complaint->group_by('under_svc');
        return $this->complaint->get('svc_area')->result_array();
    }

    public function updateMultiArea($data)
    {
        if (!empty($data['cityList']) && is_array($data['cityList'])) {
            $this->complaint->where_in('city', $data['cityList']);
        }
        if (!empty($data['districtList']) && is_array($data['districtList'])) {
            $this->complaint->where_in('district', $data['districtList']);
        }
        if (!empty($data['subdistrictList']) && is_array($data['subdistrictList'])) {
            $this->complaint->where_in('subdistrict', $data['subdistrictList']);
        }
        $data_update = [
            'under_svc'  => $data['under_svc'],
            'notif_type' => $data['notif_type'],
            'sap_code'   => $data['sap_code'],
            'remark'     => $data['remark']
        ];
        $this->complaint->update('svc_area', $data_update);
        return $this->complaint->affected_rows();
    }

}