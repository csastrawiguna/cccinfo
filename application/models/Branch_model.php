<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch_model extends CI_Model
{
 	public function getAllBranches()
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->select('branch_service.id AS id');
 		$complaint->select('branch_service.svc_type AS svc_type');
 		$complaint->select('branch_service.svc_name AS svc_name');
 		$complaint->select('branch_service.svc_name_group AS svc_name_group');
 		$complaint->select('branch_service.sap_code AS sap_code');
 		$complaint->select('branch_service.remark AS remark');
 		$complaint->select('branch_service.phone1 AS phone1');
 		$complaint->select('branch_service.phone2 AS phone2');
 		$complaint->select('branch_service.phone3 AS phone3');
 		$complaint->select('branch_service.phone4 AS phone4');
 		$complaint->select('branch_service.phone_ext AS phone_ext');
 		$complaint->select('branch_service.address AS address');
 		$complaint->select('branch_service.under_branch AS under_branch');
 		$complaint->select('branch_service.email AS email');
 		$complaint->select('branch_service.timezone AS timezone');
 		$complaint->select('branch_service.status AS status');
 		$complaint->select('technician.name AS head_name');
 		$complaint->select('technician.phone1 AS head_phone1');
 		$complaint->select('technician.phone2 AS head_phone2');
 		$complaint->select('technician.phone3 AS head_phone3');
 		$complaint->select('technician.phone4 AS head_phone4');
 		//$complaint->order_by('branch_service.svc_type', 'ASC');
 		$complaint->order_by('sap_code', 'ASC');
                $complaint->group_by('branch_service.svc_name_group');
 		$complaint->join('technician', 'ON technician.id = branch_service.svchead', 'left'); 		
 		return $complaint->get('branch_service')->result_array();
 	}

 	public function getDetailServiceBranchById($id)
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->select('branch_service.id AS id');
 		$complaint->select('branch_service.svc_type AS svc_type');
 		$complaint->select('branch_service.svc_name AS svc_name');
 		$complaint->select('branch_service.svc_name_group AS svc_name_group');
 		$complaint->select('branch_service.sap_code AS sap_code');
 		$complaint->select('branch_service.phone1 AS phone1');
 		$complaint->select('branch_service.phone2 AS phone2');
 		$complaint->select('branch_service.phone3 AS phone3');
 		$complaint->select('branch_service.phone4 AS phone4');
 		$complaint->select('branch_service.phone_ext AS phone_ext');
 		$complaint->select('branch_service.address AS address');
 		$complaint->select('branch_service.under_branch AS under_branch');
                $complaint->select('branch_service.region AS region');
 		$complaint->select('branch_service.email AS email');
 		$complaint->select('branch_service.timezone AS timezone');
 		$complaint->select('branch_service.remark AS remark');
 		$complaint->select('branch_service.status AS status');
 		$complaint->select('technician.id AS head_id');
 		$complaint->select('technician.name AS head_name');
 		$complaint->select('technician.phone1 AS head_phone1');
 		$complaint->join('technician', 'ON technician.id = branch_service.svchead', 'left');
 		$complaint->where('branch_service.id', $id);
 		return $complaint->get('branch_service')->row_array();
 	}

 	public function getAllBranchesSales()
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		return $complaint->get('branch_sales')->result_array();
 	}

 	public function getDetailServiceBranchSalesById($id)
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->select('branch_service.id AS id');
 		$complaint->select('branch_service.svc_type AS svc_type');
 		$complaint->select('branch_service.svc_name AS svc_name');
 		$complaint->select('branch_service.svc_name_group AS svc_name_group');
 		$complaint->select('branch_service.sap_code AS sap_code');
 		$complaint->select('branch_service.phone1 AS phone1');
 		$complaint->select('branch_service.phone2 AS phone2');
 		$complaint->select('branch_service.phone3 AS phone3');
 		$complaint->select('branch_service.phone4 AS phone4');
 		$complaint->select('branch_service.phone_ext AS phone_ext');
 		$complaint->select('branch_service.address AS address');
 		$complaint->select('branch_service.under_branch AS under_branch');
 		$complaint->select('branch_service.email AS email');
 		$complaint->select('branch_service.timezone AS timezone');
 		$complaint->select('technician.name AS head_name');
 		$complaint->select('technician.phone1 AS head_phone1');
 		$complaint->select('technician.phone2 AS head_phone2');
 		$complaint->select('technician.phone3 AS head_phone3');
 		$complaint->select('technician.phone4 AS head_phone4'); 		
 		$complaint->join('technician', 'ON technician.id = branch_service.svchead', 'left');
 		$complaint->where('branch_service.id', $id);
 		return $complaint->get('branch_service')->row_array();
 	}

 	public function getAllTechnician()
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->select('technician.id AS technician_id');
 		// $complaint->select('branch_service.svc_name AS svc_name');
 		$complaint->select('technician.svc_group AS svc_group');
 		$complaint->select('technician.name AS technician_name');
 		$complaint->join('branch_service', 'ON technician.svc_group = branch_service.svc_name_group');
                $complaint->order_by('technician.svc_group', 'ASC');
 		return $complaint->get('technician')->result_array();
 	}

 	public function getAllUnderBranch()
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->select('DISTINCT(`under_branch`)');
 		$complaint->order_by('svc_type');
 		$complaint->order_by('under_branch');
 		return $complaint->get('branch_service')->result_array();
 	}

        public function getAllRegion()
        {
                $complaint = $this->load->database('complaint', TRUE);
                $complaint->select('DISTINCT(`region`)');
                $complaint->order_by('region');
                return $complaint->get('branch_service')->result_array();
        }

 	public function addNewServiceBranch($data)
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->insert('branch_service', $data);
 		return $complaint->affected_rows();
 	}

 	public function editServiceBranch($editData)
 	{
 		$complaint = $this->load->database('complaint', TRUE);

 		$complaint->where('id', $editData['id']);
 		$complaint->update('branch_service', $editData);
 		return $complaint->affected_rows();
 	}

 	public function getSvcnameByType($type)
 	{
 		$complaint = $this->load->database('complaint', TRUE);
 		$complaint->distinct();
 		$complaint->select('svc_type');
        $complaint->select('svc_name_group AS svc_name_group');
        $complaint->where('svc_type', $type);
        $complaint->order_by('svc_type', 'ASC');
        $complaint->order_by('svc_name_group', 'ASC');
        return $complaint->get('branch_service')->result_array();
 	}
}
