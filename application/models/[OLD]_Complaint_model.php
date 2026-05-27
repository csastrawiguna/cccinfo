<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint_model extends CI_Model
{
    public function __construct()
    {
        $complaint = $this->load->database('complaint', TRUE);
    }
    // get complaint data query to table complaint_list join progress_detail
    // public function getComplaintByPeriod($params)
    // {
    //     if ($params['status'] == "complaint_list.claim_status LIKE '%%'") {
    //         return $this->_getComplaintByPeriodCaseclosed($params);
    //     } else {
    //         return $this->_getComplaintByPeriodInprogress($params);
    //     }
    // }

    public function getComplaintByPeriod($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.notif_date as notif_date');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        // $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->where('complaint_list.claim_date >=', $params['startPeriod']);
        $complaint->where('complaint_list.claim_date <=', $params['endPeriod']);
        $complaint->like('complaint_list.regional_area', $params['regional']);
        $complaint->like('complaint_list.under_branch', $params['under_branch']);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where($params['status']);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by($params['order_by'], $params['order_type']);
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    private function _getComplaintByPeriodInprogress($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.notif_date as notif_date');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        // $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->where('complaint_list.claim_date >=', $params['startPeriod']);
        $complaint->where('complaint_list.claim_date <=', $params['endPeriod']);
        $complaint->like('complaint_list.regional_area', $params['regional']);
        $complaint->like('complaint_list.under_branch', $params['under_branch']);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where($params['status']);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by($params['order_by'], $params['order_type']);
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    private function _getComplaintByPeriodCaseclosed($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.notif_date as notif_date');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->where('complaint_list.claim_date >=', $params['startPeriod']);
        $complaint->where('complaint_list.claim_date <=', $params['endPeriod']);
        $complaint->like('complaint_list.regional_area', $params['regional']);
        $complaint->like('complaint_list.under_branch', $params['under_branch']);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where($params['status']);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by($params['order_by'], $params['order_type']);
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getComplaintDetail($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.serial_number as serial_number');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.notif_date as notif_date');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.customer_address as customer_address');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_list.agent_action as agent_action');
        $complaint->select('complaint_list.claim_status as claim_status');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select("GROUP_CONCAT(detail_progress.id, '|', detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update, '|', detail_progress.evidence_file SEPARATOR '#') AS progress");
        // $complaint->select("GROUP_CONCAT(detail_progress.id, '|', detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.evidence_file SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.evidence_file AS evidence_file');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        $complaint->select('complaint_status.status AS status_code');
        $complaint->select('complaint_status.description AS status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->where('complaint_list.id', $id);
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->row_array();
    }

    public function updateComplaintData($data, $id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->update('complaint_list', $data);
        return $complaint->affected_rows();
    }

    public function addNewComplaint($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->insert('complaint_list', $data);
        return $complaint->insert_id();
    }

    public function checkExistingComplaint($notification)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('notification', $notification);
        return $complaint->get('complaint_list')->num_rows();
    }

    public function insertUpdateProgress($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->insert('detail_progress', $data);
        return $complaint->affected_rows();
    }

    public function deleteUpdateProgress($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->delete('detail_progress');
        return $complaint->affected_rows();
    }

    public function getComplaintIdByProgressId($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        return $complaint->get('detail_progress')->row_array()['complaint_id'];
    }

    public function editUpdateProgress($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $data['id']);
        $complaint->set('progress_update', $data['progress_update']);
        $complaint->set('updated_by', $data['updated_by']);
        $complaint->set('updated_at', $data['updated_at']);
        $complaint->update('detail_progress');
        return $complaint->affected_rows();
    }

    public function getAllDetailProgress()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->order_by('complaint_id', 'ASC');
        $complaint->order_by('updated_at', 'DESC');
        return $complaint->get('detail_progress')->result_array();
    }

    public function getProgressInfo($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        return $complaint->get('detail_progress')->row_array();
    }

    // read to/by function
    public function getReadyto($area)
    {
        $this->db->select('id');
        $this->db->where('area_scope', $area);
        return $this->db->get('user')->result_array();
    }

    public function countClaim($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT DATE_FORMAT(claim_date, '%Y-%m-01') AS month, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY DATE_FORMAT(claim_date, '%Y-%m-01') ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->result_array();
    }

    public function countClaimSubtotal($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' ";
        return  $complaint->query($query)->row_array();
    }

    public function countClaimByRegion($startPeriod, $endPeriod, $params)
    {
        $region = $params['summary_regional'];
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT DATE_FORMAT(claim_date, '%Y-%m-01') AS month, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND regional_area LIKE '%$region%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY DATE_FORMAT(claim_date, '%Y-%m-01') ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->result_array();
    }
    public function countClaimByBranch($startPeriod, $endPeriod, $params)
    {
        $underBranch = $params['summary_under_branch'];
        $region = $params['summary_regional'];
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT DATE_FORMAT(claim_date, '%Y-%m-01') AS month, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50  THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND regional_area LIKE '%$region%' AND under_branch LIKE '%$underBranch%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY DATE_FORMAT(claim_date, '%Y-%m-01') ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->result_array();
    }

    public function countClaimByBranchGroup($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $underBranch = $params['summary_under_branch'];
        $region = $params['summary_regional'];
        $orderBy = $params['order_by'];

        $query = "SELECT under_branch, (COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) + COUNT(CASE WHEN claim_status = 10 THEN 1 END) + COUNT(CASE WHEN claim_status = 50 THEN 1 END)) AS total_claim, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close, (COUNT(CASE WHEN claim_status = 50 THEN 1 END) / (COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) + COUNT(CASE WHEN claim_status = 10 THEN 1 END) + COUNT(CASE WHEN claim_status = 50 THEN 1 END))) AS closed_ratio FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND  regional_area LIKE '%$region%' AND under_branch LIKE '%$underBranch%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY under_branch ORDER BY $orderBy DESC";
        return  $complaint->query($query)->result_array();
    }

    public function countClaimByBranchName($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $params['order_by'] == 'closed_ratio DESC, total_claim' ? $orderBy = 'closed_ratio DESC' : $orderBy = 'total_claim DESC';
        $underBranch = $params['summary_under_branch'];
        $region = $params['summary_regional'];
        $query = "SELECT (CASE WHEN pic_report_1 = 'Part Center' THEN pic_report_2 ELSE pic_report_1 END) AS pic_report, pic_report_1, pic_report_2, under_branch, (COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) + COUNT(CASE WHEN claim_status = 10 THEN 1 END) + COUNT(CASE WHEN claim_status = 50 THEN 1 END)) AS total_claim, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close, (COUNT(CASE WHEN claim_status = 50 THEN 1 END) / (COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) + COUNT(CASE WHEN claim_status = 10 THEN 1 END) + COUNT(CASE WHEN claim_status = 50 THEN 1 END))) AS closed_ratio FROM complaint_list WHERE  LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND regional_area LIKE '%$region%' AND under_branch LIKE '%$underBranch%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY pic_report ORDER BY $orderBy ";
        return  $complaint->query($query)->result_array();
    }

    public function countClaimByBranchTransition($startPeriod, $endPeriod, $params)
    {
        $underBranch = $params['summary_under_branch'];
        $region = $params['summary_regional'];
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT under_branch, DATE_FORMAT(claim_date, '%Y-%m-01') AS month, (COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) + COUNT(CASE WHEN claim_status = 10 THEN 1 END) + COUNT(CASE WHEN claim_status = 50 THEN 1 END)) AS total_claim, COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND  regional_area LIKE '%$region%' AND under_branch LIKE '%$underBranch%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' GROUP BY DATE_FORMAT(claim_date, '%Y-%m-01') ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->result_array();
    }

    public function countClaimByCategory($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(claim_date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM complaint_list ";
        $query2_2 = " WHERE is_sent = 1 AND UPPER(claim_description) != 'MINTA PERBAIKAN CEPAT' AND UPPER(claim_description) != 'INFORMASI PERBAIKAN' AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(claim_description) DESC ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT claim_description, ', @sql, ' FROM complaint_list WHERE is_sent = 1 AND softdelete = 0 ";
        $query3_2 = "GROUP BY claim_description ORDER BY COUNT(claim_description) DESC ')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $complaint->query($query1);
        $complaint->query($query2);
        $complaint->query($query3);
        $complaint->query($query4);
        return $complaint->query($query5)->result_array();
    }

    public function countClaimByCategoryTotalMonth($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        //$complaint->select('"total"');
        $complaint->select('DATE_FORMAT(claim_date, "%Y-%m-01") AS month');
        $complaint->select('COUNT(claim_description) AS qty');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        $complaint->group_by('DATE_FORMAT(claim_date, "%Y-%m-01")');
        $complaint->order_by('DATE_FORMAT(claim_date, "%Y-%m-01")');
        return $complaint->get('complaint_list')->result_array();
    }

    public function countClaimByCategoryTotalCategory($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('claim_description');
        $complaint->select('COUNT(claim_description) AS qty');
        $complaint->limit('10');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        $complaint->group_by('claim_description');
        $complaint->order_by('COUNT(claim_description)', 'DESC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function countClaimByCategoryGrandTotal($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('COUNT(DATE_FORMAT(claim_date, "%Y-%m-01")) AS grand_total');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        return $complaint->get('complaint_list')->row_array();
    }

    public function countClaimByDay($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('claim_date AS date');
        $complaint->select('COUNT(claim_date) AS complaint');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        $complaint->group_by('claim_date');
        return $complaint->get('complaint_list')->result_array();
    }

    // branch & region for READ_BY function
    public function getBranchRegion($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        return $complaint->get_where('complaint_list', ['id' => $id])->row_array();
    }

    // READ_BY get branch list
    public function getBranchList($branch)
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['area_scope' => $branch])->result_array();
    }

    // READ_BY get region list
    public function getRegionList($region)
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['area_scope' => $region])->result_array();
    }

    // READ_BY part center user list
    public function getPartCenterList()
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['area_scope' => 'Part Center'])->result_array();
    }

    // READ_BY CCC user list
    public function getCccList()
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['area_scope' => 'CCC', 'is_active' => 1])->result_array();
    }

    // READ_BY SVC Manager user list
    public function getSvcManagerList()
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['access' => 7])->result_array();
    }
    
    // READ_BY SVC Manager user list
    public function getSassControllerList()
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['name' => 'SASS Controller'])->result_array();
    }

    // READ_BY SDSS-SSR Controller user list
    public function getSdssSsrControllerList()
    {
        $this->db->select('id AS userid');
        return $this->db->get_where('user', ['access' => 10])->result_array();
    }

    // get Progress Update List
    public function getProgressUpdateList($userid)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
                    detail_progress.complaint_id AS id, 
                    detail_progress.progress_update AS progress_update, 
                    detail_progress.updated_by AS updated_by, 
                    detail_progress.updated_at AS updated_at, 
                    complaint_list.claim_description AS claim_description,
                    complaint_list.claim_description AS claim_description,
                    complaint_list.model AS model,
                    complaint_list.is_urgent AS is_urgent,
                    complaint_list.claim_date AS claim_date,
                    complaint_list.notification AS notification,
                    complaint_list.propose_close AS propose_close,
                    complaint_list.customer_name AS customer_name,
                    complaint_list.customer_phone AS customer_phone,
                    complaint_list.part1_code AS part1_code,
                    complaint_list.part2_code AS part2_code,
                    complaint_list.part3_code AS part3_code,
                    complaint_list.pic_report_1 AS pic_report_1,
                    complaint_list.pic_report_2 AS pic_report_2,
                    complaint_status.status AS status_code,
                    complaint_status.description AS status_desc,
                    complaint_status.group_status AS status_group
                  FROM complaint_list JOIN detail_progress
                  ON complaint_list.id = detail_progress.complaint_id
                  LEFT JOIN complaint_status
                  ON complaint_list.claim_status = complaint_status.status
                  WHERE read_by LIKE '%$userid%'
                  ORDER BY detail_progress.updated_at DESC";
        return $complaint->query($query)->result_array();
    }

    // get Read By List by complaint ID
    public function getReadybyById($complaintId, $userid)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('read_by');
        $complaint->select('id');
        $complaint->where('complaint_id', $complaintId);
        $complaint->like('read_by', $userid);
        return $complaint->get('detail_progress')->result_array();
    }

    // unset Read By List
    public function performUnsetReadby($id, $newText)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('complaint_id', $id);
        $complaint->set('read_by', $newText);
        $complaint->update('detail_progress');
        return $complaint->affected_rows();
    }


    // unset Read By List
    public function performGroupUnsetReadby($arr)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->update_batch('detail_progress', $arr, 'id');
        return $complaint->affected_rows();
    }

    // get complaint status list
    public function getAllStatusList()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->order_by('status', 'ASC');
        return $complaint->get('complaint_status')->result_array();
    }

    public function getSassNameGroup($pic)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('svc_name_group AS sass_name');
        $complaint->select('svc_group AS sass_group');
        $complaint->where('svc_name', $pic);
        return $complaint->get('branch_service')->row_array();
    }

    public function getServiceBranchByType($type)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('svc_name');
        $complaint->order_by('svc_name', 'ASC');
        $complaint->where('svc_type', $type);
        $complaint->where('status', 'active');
        return $complaint->get('branch_service')->result_array();
    }

    public function getRegionByServiceBranch($name)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('region');
        $complaint->select('under_branch');
        //$complaint->where('svc_type', $type);
        $complaint->where('svc_name', $name);
        $complaint->order_by('region', 'ASC');
        return $complaint->get('branch_service')->row_array();
    }

    public function getBranchListByRegional($regional)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->distinct();
        $complaint->select('region');
        $complaint->select('under_branch');
        //$complaint->where('svc_type', $type);
        $complaint->where('region', $regional);
        $complaint->order_by('under_branch', 'ASC');
        return $complaint->get('branch_service')->result_array();
    }

    public function getAllUnderbranch()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->distinct();
        $complaint->select('under_branch');
        $complaint->order_by('svc_type', 'ASC');
        $complaint->order_by('under_branch', 'ASC');
        return $complaint->get('branch_service')->result_array();
    }

    // soft delete
    public function deleteComplaintData($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->set('softdelete', 1);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }

    // permanent delete
    public function purgeComplaintData($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->delete('complaint_list');
        return $complaint->affected_rows();
    }

    public function getComplaintDailyForwardRatio($period)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT claim_date, COUNT(claim_date) AS claim_qty, COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS forward_sameday, COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) / COUNT(claim_date) AS daily_ratio FROM complaint_list WHERE DATE_FORMAT(claim_date, '%Y-%m-01') = '$period' AND LOWER(claim_description) NOT LIKE 'minta perbaikan cepat' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND is_sent = 1 AND softdelete = 0 GROUP BY claim_date ORDER BY claim_date ASC";
        return $complaint->query($query)->result_array();
    }

    public function getComplaintDailyForwardRatioMonth($period)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT claim_date, COUNT(claim_date) AS claim_qty, COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS forward_sameday, COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) / COUNT(claim_date) AS daily_ratio FROM complaint_list WHERE DATE_FORMAT(claim_date, '%Y-%m-01') = '$period' AND LOWER(claim_description) NOT LIKE 'minta perbaikan cepat' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND is_sent = 1 AND softdelete = 0 ORDER BY claim_date ASC";
        return $complaint->query($query)->row_array();
    }

    public function getComplaintDailyUpdate($period)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT updated_by, DATE_FORMAT(updated_at, '%Y-%m-%d') AS update_date, COUNT(updated_by) AS update_qty FROM detail_progress WHERE DATE_FORMAT(updated_at, '%Y-%m-01') = '$period' GROUP BY updated_by, DATE_FORMAT(updated_at, '%Y-%m-%d');";
        return $complaint->query($query)->result_array();
    }

    public function getComplaintDailyUpdater($period)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $where = " DATE_FORMAT(updated_at, '%Y-%m-01') = '$period'";
        $complaint->distinct();
        $complaint->select('updated_by');
        $complaint->where($where);
        // $query = "SELECT updated_by, DATE_FORMAT(updated_at, '%Y-%m-%d') AS update_date, COUNT(updated_by) AS update_qty FROM detail_progress WHERE DATE_FORMAT(updated_at, '%Y-%m-01') = '$period' GROUP BY updated_by, DATE_FORMAT(updated_at, '%Y-%m-%d');";
        return $complaint->get('detail_progress')->result_array();
    }

    // count progress by complaint ID
    public function countProgressUpdateById($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('complaint_id', $id);
        return $complaint->get('detail_progress')->num_rows();
    }

    public function getRequestCloseList()
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        // $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->where('complaint_list.propose_close', 1);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getRequestCloseListByBranch($branch)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        // $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->where('complaint_list.propose_close', 1);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where('complaint_list.under_branch', $branch);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getRequestCloseListByRegion($region)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_status.status as claim_status');
        $complaint->select('complaint_status.description as status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->select('complaint_list.response_request as response_request');
        $complaint->select('complaint_list.responsed_by as responsed_by');
        $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        // $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'RIGHT');
        $complaint->select('complaint_list.propose_close as propose_close');
        $complaint->select('complaint_list.propose_close_by as propose_close_by');
        $complaint->select('complaint_list.propose_close_at as propose_close_at');
        $complaint->where('complaint_list.propose_close', 1);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where('complaint_list.regional_area', $region);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function setProposeCloseComplaint($setData)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->where('complaint_list.id', $setData['id']);
        $complaint->set('propose_close', $setData['proposeStatus']);
        $complaint->set('propose_close_by', $setData['proposedBy']);
        $complaint->set('propose_close_at', $setData['proposedAt']);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }

    public function rejectProposeCloseComplaint($rejectData)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->where('complaint_list.id', $rejectData['id']);
        $complaint->set('propose_close', $rejectData['proposeStatus']);
        $complaint->set('propose_close_by', $rejectData['proposedBy']);
        $complaint->set('propose_close_at', $rejectData['proposedAt']);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }

    public function responserRequestClose($data)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->where('complaint_list.id', $data['complaintId']);
        $complaint->set('response_request', $data['response_request']);
        $complaint->set('responsed_by', $data['responsed_by']);
        $complaint->set('responsed_at', $data['responsed_at']);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }

    public function getUnsentManual()
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->where('is_sent', 0);
        $complaint->where('softdelete', 0);
        $complaint->order_by('remark_internal', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function insertNewManual($data)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->insert('complaint_list', $data);
        return $complaint->affected_rows();   
    }

    public function getAllComplaintDescription()
    {
        $complaint = $this->load->database('complaint', TRUE);
        // $complaint->distinct('claim_description');
        $complaint->select('claim_description');
        $complaint->where('claim_date >=', '2023-01-01');
        $complaint->where('softdelete', 0);
        $complaint->where('is_sent', 1);
        $complaint->order_by('COUNT(claim_description)', 'DESC');
        $complaint->group_by('claim_description');
        return $complaint->get('complaint_list')->result_array();
    }

    public function performAddNoteUnsent($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $data['id']);
        $complaint->set('remark_internal', $data['remark_internal']);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }

    public function getCategoryDetail($category, $startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.claim_date as claim_date');
        $complaint->select('complaint_list.claim_source as claim_source');
        $complaint->select('complaint_list.claim_category as claim_category');
        $complaint->select('complaint_list.claim_description as claim_description');
        $complaint->select('complaint_list.product_category as product_category');
        $complaint->select('complaint_list.model as model');
        $complaint->select('complaint_list.notification as notification');
        $complaint->select('complaint_list.notif_date as notif_date');
        $complaint->select('complaint_list.customer_name as customer_name');
        $complaint->select('complaint_list.customer_phone as customer_phone');
        $complaint->select('complaint_list.claim_detail as claim_detail');
        $complaint->select('complaint_list.claim_status as claim_status');
        $complaint->select('complaint_list.pic_report_1 as pic_report_1');
        $complaint->select('complaint_list.pic_report_2 as pic_report_2');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('complaint_list.forwarded_date as forwarded_date');
        $complaint->select('complaint_list.is_urgent as is_urgent');
        $complaint->select('complaint_list.is_sent as is_sent');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        // $complaint->select('complaint_list.part1_type as part1_type');
        // $complaint->select('complaint_list.part1_code as part1_code');
        // $complaint->select('complaint_list.part1_isready as part1_isready');
        // $complaint->select('complaint_list.part2_type as part2_type');
        // $complaint->select('complaint_list.part2_code as part2_code');
        // $complaint->select('complaint_list.part2_isready as part2_isready');
        // $complaint->select('complaint_list.part3_type as part3_type');
        // $complaint->select('complaint_list.part3_code as part3_code');
        // $complaint->select('complaint_list.part3_isready as part3_isready');
        // $complaint->select('complaint_list.part4_type as part4_type');
        // $complaint->select('complaint_list.part4_code as part4_code');
        // $complaint->select('complaint_list.part4_isready as part4_isready');
        // $complaint->select('complaint_list.part5_type as part5_type');
        // $complaint->select('complaint_list.part5_code as part5_code');
        // $complaint->select('complaint_list.part5_isready as part5_isready');
        // $complaint->select('complaint_list.part6_type as part6_type');
        // $complaint->select('complaint_list.part6_code as part6_code');
        // $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        // $complaint->select('complaint_list.propose_close as propose_close');
        // $complaint->select('complaint_list.propose_close_by as propose_close_by');
        // $complaint->select('complaint_list.propose_close_at as propose_close_at');
        // $complaint->select('complaint_list.response_request as response_request');
        // $complaint->select('complaint_list.responsed_by as responsed_by');
        // $complaint->select('complaint_list.responsed_at as responsed_at');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.closed_on as closed_on');
        $complaint->select('complaint_list.saved_by as saved_by');
        $complaint->select('complaint_list.saved_at as saved_at');
        $complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        $complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') >=", $startPeriod);
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') <=", $endPeriod);
        $complaint->where('LOWER(complaint_list.claim_description)', $category);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where('is_sent', 1);
        $complaint->group_by('complaint_list.id');
        $complaint->order_by('is_urgent', 'DESC');
        $complaint->order_by('claim_date', 'ASC');
        $complaint->order_by('claim_status', 'DESC');
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getCategoryByBranchlistOri($category, $startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.sass_name as pic_report');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) = "case closed" THEN 1 END) AS case_closed');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) != "case closed" THEN 1 END) AS in_progress');
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') >=", $startPeriod);
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') <=", $endPeriod);
        $complaint->where('LOWER(complaint_list.claim_description)', $category);
        $complaint->where('softdelete', 0);
        $complaint->where('is_sent', 1);
        $complaint->group_by('complaint_list.sass_name');
        $complaint->order_by('COUNT(complaint_list.sass_name)', 'DESC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getCategoryByBranchlist($category, $startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(claim_date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM complaint_list ";
        $query2_2 = " WHERE LOWER(claim_description) = '$category' AND UPPER(claim_description) != 'MINTA PERBAIKAN CEPAT' AND UPPER(claim_description) != 'INFORMASI PERBAIKAN' AND is_sent = 1 AND softdelete = 0 AND DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(pic_report_1) DESC ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT claim_description, pic_report_1, ', @sql, ' FROM complaint_list ";
        $query3_2 = "GROUP BY pic_report_1 ORDER BY COUNT(pic_report_1) DESC ')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $complaint->query($query1);
        $complaint->query($query2);
        $complaint->query($query3);
        $complaint->query($query4);
        return $complaint->query($query5)->result_array();
    }

    public function getCategoryByBranchlistWaitingPart($category, $startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.pic_report_2 as pic_report');
        $complaint->select('complaint_list.under_branch as under_branch');
        $complaint->select('complaint_list.regional_area as regional_area');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) = "case closed" THEN 1 END) AS case_closed');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) != "case closed" THEN 1 END) AS in_progress');
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') >=", $startPeriod);
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') <=", $endPeriod);
        $complaint->where('LOWER(complaint_list.claim_description)', $category);
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->group_by('complaint_list.pic_report_2');
        $complaint->order_by('COUNT(complaint_list.pic_report_2)', 'DESC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getCategoryByPartlist($category, $startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('complaint_list.id as id');
        $complaint->select('complaint_list.part_reservation as part_reservation');
        $complaint->select('complaint_list.part1_type as part1_type');
        $complaint->select('complaint_list.part1_code as part1_code');
        $complaint->select('complaint_list.part1_isready as part1_isready');
        $complaint->select('complaint_list.part2_type as part2_type');
        $complaint->select('complaint_list.part2_code as part2_code');
        $complaint->select('complaint_list.part2_isready as part2_isready');
        $complaint->select('complaint_list.part3_type as part3_type');
        $complaint->select('complaint_list.part3_code as part3_code');
        $complaint->select('complaint_list.part3_isready as part3_isready');
        $complaint->select('complaint_list.part4_type as part4_type');
        $complaint->select('complaint_list.part4_code as part4_code');
        $complaint->select('complaint_list.part4_isready as part4_isready');
        $complaint->select('complaint_list.part5_type as part5_type');
        $complaint->select('complaint_list.part5_code as part5_code');
        $complaint->select('complaint_list.part5_isready as part5_isready');
        $complaint->select('complaint_list.part6_type as part6_type');
        $complaint->select('complaint_list.part6_code as part6_code');
        $complaint->select('complaint_list.part6_isready as part6_isready');
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') >=", $startPeriod);
        $complaint->where("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') <=", $endPeriod);
        $complaint->where('complaint_list.claim_description <=', $category);
        $complaint->group_by('complaint_list.part1_code');
        $complaint->where('complaint_list.softdelete', 0);
        $complaint->where('complaint_list.is_sent', 1);
        return $complaint->get('complaint_list')->result_array();
    }

    public function searchComplaint($keyword)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $query = "SELECT * FROM complaint_list WHERE notification LIKE '%$keyword%' OR customer_phone LIKE '%$keyword%' OR customer_name LIKE '%$keyword%'";
        return $complaint->query($query)->result_array();
    }

    public function getOutstandingFirstDate($params, $limitDate)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('MIN(claim_date) AS firstdate');
        $complaint->like('complaint_list.regional_area', $params['regional']);
        $complaint->like('complaint_list.under_branch', $params['under_branch']);
        $complaint->where($params['status']);
        $complaint->where('complaint_list.is_sent', 1);
        $complaint->where('complaint_list.claim_date >=', $limitDate);
        $complaint->where('complaint_list.softdelete', 0);
        return $complaint->get('complaint_list')->row_array()['firstdate'];
    }

    public function countClaimSamedayForward($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') AS month");
        $complaint->select('COUNT(claim_date) AS claim_qty');
        $complaint->select('COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS forward_sameday');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        $complaint->group_by("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01')");
        $complaint->order_by('claim_date', 'DESC');
        return $complaint->get('complaint_list')->result_array();
    }

    public function countClaimSamedayForwardSubtotal($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('COUNT(claim_date) AS claim_qty');
        $complaint->select('COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS forward_sameday');
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('UPPER(claim_description) !=', 'MINTA PERBAIKAN CEPAT');
        $complaint->where('UPPER(claim_description) !=', 'INFORMASI PERBAIKAN');
        $complaint->order_by('claim_date', 'DESC');
        return $complaint->get('complaint_list')->row_array();
    }

    public function getAllComplaintStatusList()
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->select('status, description, group_status');
        $complaint->order_by('status', 'ASC');
        return $complaint->get('complaint_status')->result_array();
    }

}
