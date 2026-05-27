<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint_model extends CI_Model
{
    // property for Complaint Databse
    private $complaint;

    public function __construct()
    {
        $this->complaint = $this->load->database('complaint', TRUE);
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

    // Trial AJAX
    private function _get_datatables_query($params, $search = null)
    {
        // Select kabeh kolom complaint_list + kolom ti tabel sejen
        $this->complaint->select('complaint_list.*'); 
        $this->complaint->select('complaint_status.status as claim_status, complaint_status.description as status_desc, complaint_status.group_status AS status_group');
        $this->complaint->select('detail_progress.id AS progress_id, detail_progress.updated_by AS updated_by, detail_progress.updated_at AS updated_at');
        
        // Kalkulasi DATEDIFF
        $this->complaint->select('DATEDIFF(NOW(), complaint_list.claim_date) as claim_tat');
        $this->complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.claim_date) as claim_tatclosed');
        $this->complaint->select('DATEDIFF(NOW(), complaint_list.notif_date) as notif_tat');
        $this->complaint->select('DATEDIFF(complaint_list.closed_on, complaint_list.notif_date) as notif_tatclosed');
        
        // Group Concat pikeun Progress
        $this->complaint->select("GROUP_CONCAT(detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update SEPARATOR '#') AS progress");

        // Join Tabel
        // Catetan: Mun make RIGHT JOIN ka status, data complaint_list bisa leungit mun statusna kosong. 
        // Biasana mah mending LEFT JOIN. Tapi ieu urang tuturkeun logika anjeun:
        $this->complaint->join('complaint_status', 'complaint_list.claim_status = complaint_status.status', 'RIGHT');
        $this->complaint->join('detail_progress', 'detail_progress.complaint_id = complaint_list.id', 'LEFT');

        // Filter Parametik
        $this->complaint->where('complaint_list.claim_date >=', $params['startPeriod']);
        $this->complaint->where('complaint_list.claim_date <=', $params['endPeriod']);
        $this->complaint->like('complaint_list.regional_area', $params['regional']);
        $this->complaint->like('complaint_list.under_branch', $params['under_branch']);
        $this->complaint->where('complaint_list.is_sent', 1);
        $this->complaint->where('complaint_list.softdelete', 0);
        
        if (!empty($params['status'])) {
            $this->complaint->where($params['status']);
        }

        // Filter Search Global (DataTables)
        if (!empty($search)) {
            $this->complaint->group_start();
            $this->complaint->like("complaint_list.ticket_number", $search);
            $this->complaint->or_like("complaint_list.customer_name", $search);
            $this->complaint->or_like("complaint_list.customer_phone", $search);
            $this->complaint->or_like("complaint_list.claim_description", $search);
            $this->complaint->or_like("complaint_list.notification", $search); 
            $this->complaint->or_like("complaint_list.model", $search);
            $this->complaint->or_like("complaint_list.claim_detail", $search);
            $this->complaint->or_like("complaint_list.pic_report_1", $search);
            $this->complaint->or_like("complaint_list.pic_report_2", $search);
            $this->complaint->or_like("complaint_list.part1_code", $search);
            $this->complaint->or_like("complaint_list.part2_code", $search);
            $this->complaint->or_like("complaint_list.part3_code", $search);
            $this->complaint->or_like("complaint_list.part4_code", $search);
            $this->complaint->or_like("complaint_list.part5_code", $search);
            $this->complaint->or_like("complaint_list.part6_code", $search);
            $this->complaint->group_end();
        }

        $this->complaint->group_by('complaint_list.id');
    }

    public function get_datatables($params, $start, $length, $search)
    {
        $this->_get_datatables_query($params, $search);

        // Order by ti params atawa default
        if (isset($params['order_by'])) {
            $this->complaint->order_by($params['order_by'], $params['order_type']);
        }
        
        // Multi Order luyu jeung script asli anjeun
        $this->complaint->order_by('complaint_list.is_urgent', 'DESC');
        $this->complaint->order_by('complaint_list.claim_date', 'ASC');
        $this->complaint->order_by('complaint_list.claim_status', 'DESC');
        $this->complaint->order_by('detail_progress.updated_at', 'ASC');

        if ($length != -1) {
            $this->complaint->limit($length, $start);
        }

        return $this->complaint->get('complaint_list')->result_array();
    }

    public function count_filtered($params, $search)
    {
        $this->_get_datatables_query($params, $search);
        $query = $this->complaint->get('complaint_list');
        return $query->num_rows();
    }

    public function count_all($params)
    {
        $this->complaint->from('complaint_list');
        $this->complaint->where('claim_date >=', $params['startPeriod']);
        $this->complaint->where('claim_date <=', $params['endPeriod']);
        $this->complaint->where('softdelete', 0);
        return $this->complaint->count_all_results();
    }

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
        $complaint->select('complaint_list.part7_type as part7_type');
        $complaint->select('complaint_list.part7_code as part7_code');
        $complaint->select('complaint_list.part7_isready as part7_isready');
        $complaint->select('complaint_list.part8_type as part8_type');
        $complaint->select('complaint_list.part8_code as part8_code');
        $complaint->select('complaint_list.part8_isready as part8_isready');
        $complaint->select('complaint_list.part9_type as part9_type');
        $complaint->select('complaint_list.part9_code as part9_code');
        $complaint->select('complaint_list.part9_isready as part9_isready');
        $complaint->select('complaint_list.part10_type as part10_type');
        $complaint->select('complaint_list.part10_code as part10_code');
        $complaint->select('complaint_list.part10_isready as part10_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.agent as agent');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.rootcause as rootcause');
        $complaint->select('complaint_list.countermeasure as countermeasure');
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
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'RIGHT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
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
        $complaint->select('complaint_list.part7_type as part7_type');
        $complaint->select('complaint_list.part7_code as part7_code');
        $complaint->select('complaint_list.part7_isready as part7_isready');
        $complaint->select('complaint_list.part8_type as part8_type');
        $complaint->select('complaint_list.part8_code as part8_code');
        $complaint->select('complaint_list.part8_isready as part8_isready');
        $complaint->select('complaint_list.part9_type as part9_type');
        $complaint->select('complaint_list.part9_code as part9_code');
        $complaint->select('complaint_list.part9_isready as part9_isready');
        $complaint->select('complaint_list.part10_type as part10_type');
        $complaint->select('complaint_list.part10_code as part10_code');
        $complaint->select('complaint_list.part10_isready as part10_isready');
        $complaint->select('complaint_list.remark as remark');
        $complaint->select('complaint_list.isresponsed_branch as isresponsed_branch');
        $complaint->select('complaint_list.isresponsed_sass as isresponsed_sass');
        $complaint->select('complaint_list.isresponsed_sasshq as isresponsed_sasshq');
        $complaint->select('complaint_list.isresponsed_part as isresponsed_part');
        $complaint->select('complaint_list.remark_internal as remark_internal');
        $complaint->select('complaint_list.rootcause as rootcause');
        $complaint->select('complaint_list.countermeasure as countermeasure');
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
        $complaint->select("GROUP_CONCAT(detail_progress.id, '|', detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update, '|', detail_progress.evidence_file SEPARATOR '#') AS progress1");
        $complaint->select("GROUP_CONCAT(detail_progress.id, '|', detail_progress.updated_by, '|', detail_progress.updated_at, '|', detail_progress.progress_update, '|', detail_progress.current_status, '|', detail_progress.evidence_file SEPARATOR '#') AS progress");
        $complaint->select('detail_progress.id AS progress_id');
        $complaint->select('detail_progress.evidence_file AS evidence_file');
        $complaint->select('detail_progress.updated_by AS updated_by');
        $complaint->select('detail_progress.updated_at AS updated_at');
        $complaint->select('complaint_status.status AS status_code');
        $complaint->select('complaint_status.description AS status_desc');
        $complaint->select('complaint_status.group_status AS status_group');
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'LEFT');
        $complaint->join('detail_progress', 'ON detail_progress.complaint_id = complaint_list.id', 'LEFT');
        $complaint->where('complaint_list.id', $id);
        $complaint->order_by('detail_progress.updated_at', 'ASC');
        return $complaint->get('complaint_list')->row_array();
    }

    public function getComplaintById($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        return $complaint->get('complaint_list')->row_array();
    }

    public function addPartData($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $data['id']);
        $complaint->update('complaint_list', $data);
        return $complaint->affected_rows();
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

    public function updateStatusOnly($id, $stts, $dtime)
    {
        if ($stts == 50) {
            $dt = date("Y-m-d", strtotime($dtime));
        } else {
            $dt = NULL;
        }
     
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('id', $id);
        $complaint->set('claim_status', $stts);
        $complaint->set('closed_on', $dt);
        $complaint->update('complaint_list');
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

        $complaint->select("DATE_FORMAT(claim_date, '%Y-%m-01') AS month");
        $complaint->select('COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress');
        $complaint->select('COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new');
        $complaint->select('COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close');

        // Filter dasar (Pake string biasa meh aman)
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);

        // Filter Tanggal
        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);

        // Filter Text (Ganti jadi NOT LIKE)
        // LOWER() sabenerna teu wajib mun collation DB anjeun geus ci (case-insensitive)
        $complaint->not_like('LOWER(claim_description)', 'not complaint');
        $complaint->not_like('LOWER(claim_description)', 'minta perbaikan cepat');
        $complaint->not_like('LOWER(claim_description)', 'informasi perbaikan');

        $complaint->group_by("month"); // Bisa langsung pake alias
        $complaint->order_by("month", "DESC");

        return $complaint->get('complaint_list')->result_array();
    }

    // new Query for Vue
    public function countClaimByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        // Inisialisasi Select
        $complaint->select("DATE_FORMAT(claim_date, '%Y-%m-01') AS month");
        $complaint->select("COUNT(CASE WHEN claim_status NOT IN (50) THEN 1 END) AS in_progress");
        // $complaint->select("COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new");
        $complaint->select("COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close");
        $complaint->select("COUNT(claim_status) AS status_total");
        $complaint->select("COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS same_day_forward");
        $complaint->select("(COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) / COUNT(claim_status)) AS same_day_ratio");

        // Filter Dasar
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('claim_date >=', $params['startPeriod']);
        $complaint->where('claim_date <=', $params['endPeriod']);

        // --- BAGIAN EFISIENSI FILTER STRING ---
        // Ngabersihan string ti Controller sangkan aman asup kana WHERE ... IN
        $cleanRegion = str_replace("''", "'", $params['summary_regional']);
        if (!empty($cleanRegion)) {
            // Paké NULL & FALSE sangkan CI teu nambahan backtick nu matak érror
            $complaint->where("regional_area IN ($cleanRegion)", NULL, FALSE);
        }

        $cleanBranch = str_replace("''", "'", $params['summary_under_branch']);
        // Ngabersihan spasi atawa koma nu nyelip di awal/tungtung
        $cleanBranch = trim($cleanBranch, " ,"); 
        if (!empty($cleanBranch)) {
            $complaint->where("under_branch IN ($cleanBranch)", NULL, FALSE);
        }

        // --- BAGIAN EFISIENSI FILTER TEXT ---
        // Paké REGEXP sangkan teu kudu NOT LIKE berkali-kali, leuwih gancang kodingna
        $excludeText = 'not complaint|minta perbaikan cepat|informasi perbaikan';
        $complaint->where("LOWER(claim_description) NOT REGEXP '$excludeText'", NULL, FALSE);

        $complaint->group_by("month");
        $complaint->order_by("month", "DESC");

        return $complaint->get('complaint_list')->result_array();
    }

    public function countClaimSubtotal($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT COUNT(CASE WHEN claim_status <> 10 AND claim_status <> 50 THEN 1 END) AS in_progress, COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new, COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close FROM complaint_list WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' ";
        return  $complaint->query($query)->row_array();
    }

    // new Query for Vue
    public function countClaimSubtotalByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $startPeriod = $params['startPeriod'];
        $endPeriod = $params['endPeriod'];
        
        // Inisialisasi Select
        $complaint->select("DATE_FORMAT(claim_date, '%Y-%m-01') AS month");
        // $complaint->select("COUNT(CASE WHEN claim_status NOT IN (10, 50) THEN 1 END) AS in_progress");
        // $complaint->select("COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS new");
        // $complaint->select("COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_close");
        $complaint->select("COUNT(claim_status) AS status_total");

        // Filter Dasar
        $complaint->where('is_sent', 1);
        $complaint->where('softdelete', 0);
        $complaint->where('claim_date >=', $params['startPeriod']);
        $complaint->where('claim_date <=', $params['endPeriod']);

        // --- BAGIAN EFISIENSI FILTER STRING ---
        // Ngabersihan string ti Controller sangkan aman asup kana WHERE ... IN
        $cleanRegion = str_replace("''", "'", $params['summary_regional']);
        if (!empty($cleanRegion)) {
            // Paké NULL & FALSE sangkan CI teu nambahan backtick nu matak érror
            $complaint->where("regional_area IN ($cleanRegion)", NULL, FALSE);
        }

        $cleanBranch = str_replace("''", "'", $params['summary_under_branch']);
        // Ngabersihan spasi atawa koma nu nyelip di awal/tungtung
        $cleanBranch = trim($cleanBranch, " ,"); 
        if (!empty($cleanBranch)) {
            $complaint->where("under_branch IN ($cleanBranch)", NULL, FALSE);
        }

        // --- BAGIAN EFISIENSI FILTER TEXT ---
        // Paké REGEXP sangkan teu kudu NOT LIKE berkali-kali, leuwih gancang kodingna
        $excludeText = 'not complaint|minta perbaikan cepat|informasi perbaikan';
        $complaint->where("LOWER(claim_description) NOT REGEXP '$excludeText'", NULL, FALSE);

        $complaint->group_by("month");
        $complaint->order_by("month", "DESC");

        return $complaint->get('complaint_list')->result_array();
    }

    public function countClaimByStatusDetail($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
            DATE_FORMAT(claim_date, '%Y-%m-01') AS month, 
            COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS status_10, 
            COUNT(CASE WHEN claim_status = 20 THEN 1 END) AS status_20,
            COUNT(CASE WHEN claim_status = 21 THEN 1 END) AS status_21, 
            COUNT(CASE WHEN claim_status = 22 THEN 1 END) AS status_22, 
            COUNT(CASE WHEN claim_status = 23 THEN 1 END) AS status_23, 
            COUNT(CASE WHEN claim_status = 24 THEN 1 END) AS status_24, 
            COUNT(CASE WHEN claim_status = 25 THEN 1 END) AS status_25, 
            COUNT(CASE WHEN claim_status = 26 THEN 1 END) AS status_26, 
            COUNT(CASE WHEN claim_status = 27 THEN 1 END) AS status_27, 
            COUNT(CASE WHEN claim_status = 28 THEN 1 END) AS status_28, 
            COUNT(CASE WHEN claim_status = 29 THEN 1 END) AS status_29, 
            COUNT(CASE WHEN claim_status = 30 THEN 1 END) AS status_30, 
            COUNT(CASE WHEN claim_status = 31 THEN 1 END) AS status_31, 
            COUNT(CASE WHEN claim_status = 32 THEN 1 END) AS status_32,
            COUNT(CASE WHEN claim_status = 33 THEN 1 END) AS status_33,
            COUNT(CASE WHEN claim_status = 34 THEN 1 END) AS status_34,
            COUNT(CASE WHEN claim_status = 35 THEN 1 END) AS status_35,
            COUNT(CASE WHEN claim_status = 40 THEN 1 END) AS status_40,
            COUNT(CASE WHEN claim_status = 41 THEN 1 END) AS status_41,
            COUNT(CASE WHEN claim_status = 42 THEN 1 END) AS status_42,
            COUNT(CASE WHEN claim_status = 43 THEN 1 END) AS status_43,
            COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS status_50,
            COUNT(claim_date) AS by_month
            FROM complaint_list 
            WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' 
            GROUP BY DATE_FORMAT(claim_date, '%Y-%m-01') 
            ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->result_array();
    }

    // new Function for Vue
    public function countClaimByStatusDetailByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        // Pastikeun $params aya eusina, mun henteu, pasang default meh teu 'Illegal string offset'
        $start = isset($params['startPeriod']) ? $params['startPeriod'] : date('Y-m-01');
        $end   = isset($params['endPeriod']) ? $params['endPeriod'] : date('Y-m-d');

        // Saringan dumasar Region & Branch
        $cleanRegion = str_replace("''", "'", $params['summary_regional'] ?? "");
        $cleanBranch = str_replace("''", "'", $params['summary_under_branch'] ?? "");
        
        $where_clause = "";
        if (!empty($cleanRegion)) $where_clause .= " AND regional_area IN ($cleanRegion) ";
        if (!empty($cleanBranch)) $where_clause .= " AND under_branch IN ($cleanBranch) ";

        $query = "SELECT 
                    DATE_FORMAT(claim_date, '%b %Y') AS month_label,
                    DATE_FORMAT(claim_date, '%Y-%m-01') AS month_val,
                    " . $this->_buildStatusCounts() . ",
                    COUNT(CASE WHEN claim_status BETWEEN 10 AND 29 THEN 1 END) AS ttl_under_branch,
                    COUNT(CASE WHEN claim_status BETWEEN 40 AND 43 THEN 1 END) AS ttl_wait_complt,
                    COUNT(CASE WHEN claim_status BETWEEN 31 AND 35 THEN 1 END) AS ttl_wait_part,
                    COUNT(CASE WHEN claim_status < 50 THEN 1 END) AS ttl_in_progress,
                    COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS status_50,
                    COUNT(*) AS total_all
                  FROM complaint_list 
                  WHERE 
                  -- Ieu saringan nu kudu sarua jeung Tabel 1 --
                  LOWER(claim_description) NOT LIKE '%not complain%'
                  AND LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%'
                  AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%'
                  AND is_sent = 1 AND softdelete = 0 
                  AND claim_date BETWEEN '$start' AND '$end'
                  $where_clause
                  GROUP BY month_val 
                  ORDER BY month_val DESC";
                  
        return $complaint->query($query)->result_array();
    }

    // Helper meh query teu panjang teuing ka gigir
    private function _buildStatusCounts() {
        $out = [];
        for($i=20; $i<=43; $i++) {
            $out[] = "COUNT(CASE WHEN claim_status = $i THEN 1 END) AS s$i";
        }
        return implode(", ", $out);
    }

    public function countClaimByStatusDetailSubtotal($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
            COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS status_10, 
            COUNT(CASE WHEN claim_status = 20 THEN 1 END) AS status_20,
            COUNT(CASE WHEN claim_status = 21 THEN 1 END) AS status_21, 
            COUNT(CASE WHEN claim_status = 22 THEN 1 END) AS status_22, 
            COUNT(CASE WHEN claim_status = 23 THEN 1 END) AS status_23, 
            COUNT(CASE WHEN claim_status = 24 THEN 1 END) AS status_24, 
            COUNT(CASE WHEN claim_status = 25 THEN 1 END) AS status_25, 
            COUNT(CASE WHEN claim_status = 26 THEN 1 END) AS status_26, 
            COUNT(CASE WHEN claim_status = 27 THEN 1 END) AS status_27, 
            COUNT(CASE WHEN claim_status = 28 THEN 1 END) AS status_28, 
            COUNT(CASE WHEN claim_status = 29 THEN 1 END) AS status_29, 
            COUNT(CASE WHEN claim_status = 30 THEN 1 END) AS status_30, 
            COUNT(CASE WHEN claim_status = 31 THEN 1 END) AS status_31, 
            COUNT(CASE WHEN claim_status = 32 THEN 1 END) AS status_32,
            COUNT(CASE WHEN claim_status = 33 THEN 1 END) AS status_33,
            COUNT(CASE WHEN claim_status = 34 THEN 1 END) AS status_34,
            COUNT(CASE WHEN claim_status = 35 THEN 1 END) AS status_35,
            COUNT(CASE WHEN claim_status = 40 THEN 1 END) AS status_40,
            COUNT(CASE WHEN claim_status = 41 THEN 1 END) AS status_41,
            COUNT(CASE WHEN claim_status = 42 THEN 1 END) AS status_42,
            COUNT(CASE WHEN claim_status = 43 THEN 1 END) AS status_43,
            COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS status_50,
            COUNT(claim_date) AS by_month
            FROM complaint_list 
            WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' 
            ORDER BY DATE_FORMAT(claim_date, '%Y-%m-01') DESC";
        return  $complaint->query($query)->row_array();
    }

    public function countClaimCategoryByStatusDetail($startPeriod, $endPeriod, $params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
            complaint_list.claim_description AS claim_description, 
            COUNT(CASE WHEN claim_status = 10 THEN 1 END) AS status_10, 
            COUNT(CASE WHEN claim_status = 20 THEN 1 END) AS status_20,
            COUNT(CASE WHEN claim_status = 21 THEN 1 END) AS status_21, 
            COUNT(CASE WHEN claim_status = 22 THEN 1 END) AS status_22, 
            COUNT(CASE WHEN claim_status = 23 THEN 1 END) AS status_23, 
            COUNT(CASE WHEN claim_status = 24 THEN 1 END) AS status_24, 
            COUNT(CASE WHEN claim_status = 25 THEN 1 END) AS status_25, 
            COUNT(CASE WHEN claim_status = 26 THEN 1 END) AS status_26, 
            COUNT(CASE WHEN claim_status = 27 THEN 1 END) AS status_27, 
            COUNT(CASE WHEN claim_status = 28 THEN 1 END) AS status_28, 
            COUNT(CASE WHEN claim_status = 29 THEN 1 END) AS status_29, 
            COUNT(CASE WHEN claim_status = 30 THEN 1 END) AS status_30, 
            COUNT(CASE WHEN claim_status = 31 THEN 1 END) AS status_31, 
            COUNT(CASE WHEN claim_status = 32 THEN 1 END) AS status_32,
            COUNT(CASE WHEN claim_status = 33 THEN 1 END) AS status_33,
            COUNT(CASE WHEN claim_status = 34 THEN 1 END) AS status_34,
            COUNT(CASE WHEN claim_status = 35 THEN 1 END) AS status_35,
            COUNT(CASE WHEN claim_status = 40 THEN 1 END) AS status_40,
            COUNT(CASE WHEN claim_status = 41 THEN 1 END) AS status_41,
            COUNT(CASE WHEN claim_status = 42 THEN 1 END) AS status_42,
            COUNT(CASE WHEN claim_status = 43 THEN 1 END) AS status_43,
            COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS status_50,
            COUNT(claim_date) AS by_month
            FROM complaint_list 
            WHERE LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%' AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%' AND LOWER(claim_description) NOT LIKE '%not complain%' AND is_sent = 1 AND softdelete = 0 AND claim_date BETWEEN '$startPeriod' AND '$endPeriod' 
            GROUP BY claim_description
            ORDER BY COUNT(claim_description) DESC
            LIMIT 10";
        return  $complaint->query($query)->result_array();
    }

    // Claim by claim description - status detail
    public function countClaimCategoryByStatusDetailByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        
        // Pastikeun $params aya eusina, mun henteu, pasang default meh teu 'Illegal string offset'
        $start = isset($params['startPeriod']) ? $params['startPeriod'] : date('Y-m-01');
        $end   = isset($params['endPeriod']) ? $params['endPeriod'] : date('Y-m-d');

        // Saringan dumasar Region & Branch
        $cleanRegion = str_replace("''", "'", $params['summary_regional'] ?? "");
        $cleanBranch = str_replace("''", "'", $params['summary_under_branch'] ?? "");
        
        $where_clause = "";
        if (!empty($cleanRegion)) $where_clause .= " AND regional_area IN ($cleanRegion) ";
        if (!empty($cleanBranch)) $where_clause .= " AND under_branch IN ($cleanBranch) ";

        $query = "SELECT 
                    claim_description,
                    " . $this->_buildStatusCounts() . ",
                    COUNT(CASE WHEN claim_status BETWEEN 10 AND 29 THEN 1 END) AS ttl_under_branch,
                    COUNT(CASE WHEN claim_status BETWEEN 40 AND 43 THEN 1 END) AS ttl_wait_complt,
                    COUNT(CASE WHEN claim_status BETWEEN 31 AND 35 THEN 1 END) AS ttl_wait_part,
                    COUNT(CASE WHEN claim_status < 50 THEN 1 END) AS ttl_in_progress,
                    COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS status_50,
                    COUNT(*) AS total_all
                  FROM complaint_list 
                  WHERE 
                  -- Ieu saringan nu kudu sarua jeung Tabel 1 --
                  LOWER(claim_description) NOT LIKE '%not complain%'
                  AND LOWER(claim_description) NOT LIKE '%minta perbaikan cepat%'
                  AND LOWER(claim_description) NOT LIKE '%informasi perbaikan%'
                  AND is_sent = 1 AND softdelete = 0 
                  AND claim_date BETWEEN '$start' AND '$end'
                  $where_clause
                  GROUP BY claim_description 
                  ORDER BY COUNT(claim_description) DESC";
                  
        return $complaint->query($query)->result_array();
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

    // NEW Vue by Region - Branch - PIC Report
    public function countClaimByBranchGroupByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $underBranch = $params['summary_under_branch'];
        $region      = $params['summary_regional'];
        $orderBy     = $params['order_by'];
        $startPeriod = isset($params['startPeriod']) ? $params['startPeriod'] : date('Y-m-01');
        $endPeriod   = isset($params['endPeriod']) ? $params['endPeriod'] : date('Y-m-d');

        $complaint->select('regional_area AS region');
        $complaint->select('under_branch');
        
        // Gunakeun FALSE di parameter kadua supaya CodeIgniter teu nambahan backtick sembarangan
        $complaint->select("CASE WHEN pic_report_1 = 'Part Center' THEN pic_report_2 ELSE pic_report_1 END AS pic_report", FALSE);
        $complaint->select('COUNT(claim_status) AS total_claim');
        $complaint->select('COUNT(CASE WHEN claim_status < 50 THEN 1 END) AS in_progress', FALSE);
        $complaint->select('COUNT(CASE WHEN claim_status = 50 THEN 1 END) AS case_closed', FALSE);
        
        // Perbaikan formula closed_ratio (ngahapus AS total_claim di jero kurung)
        $complaint->select('(COUNT(CASE WHEN claim_status = 50 THEN 1 END) / COUNT(claim_status)) AS closed_ratio', FALSE);

        $complaint->where('claim_date >=', $startPeriod);
        $complaint->where('claim_date <=', $endPeriod);
        $complaint->where('softdelete', 0);
        $complaint->where('is_sent', 1);

        // Filter Deskripsi (biasana NOT IN leuwih rapih)
        $excluded = ['minta perbaikan cepat', 'informasi perbaikan', 'not complain'];
        foreach ($excluded as $val) {
            $complaint->where('LOWER(claim_description) !=', $val);
        }

        // Filter Region & Branch (ngan jalan mun aya eusina)
        if (!empty($region)) {
            $complaint->where('regional_area', $region);
        }
        if (!empty($underBranch)) {
            $complaint->like('under_branch', $underBranch);
        }

        $complaint->group_by('region');
        $complaint->group_by('under_branch');
        $complaint->group_by('pic_report');
        
        // Pastikeun $orderBy eusina kolom nu valid (contona 'case_closed DESC')
        $complaint->order_by($orderBy);

        return $complaint->get('complaint_list')->result_array();
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

    public function countClaimByCategoryByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->query("SET SESSION group_concat_max_len = 1000000");

        $startPeriod = $params['startPeriod'];
        $endPeriod = $params['endPeriod'];
        $whereRegional = $params['summary_regional'];
        $whereUnderBranch = $params['summary_under_branch'];
        $orderBy = $params['order_by'];

        $where_clause = " WHERE is_sent = 1 AND softdelete = 0 ";

        if (!empty($whereRegional)) {
            $where_clause .= " AND regional_area IN ($whereRegional) ";
        }

        if (!empty($whereUnderBranch)) {
            // Piceun kecap WHERE-na, langsung IN bae
            $where_clause .= " AND under_branch IN ($whereUnderBranch) ";
        }
        
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(claim_date, "%Y-%m-01")';
        $query2 = " 
            SELECT 
                GROUP_CONCAT(DISTINCT 
                    CONCAT('SUM(CASE WHEN $helper = ''', dt, ''' THEN 1 ELSE 0 END) AS `', dt, '`')
                ) INTO @sql 
            FROM (
                SELECT $helper AS dt 
                FROM complaint_list 
                WHERE is_sent = 1 
                  AND UPPER(claim_description) NOT IN ('MINTA PERBAIKAN CEPAT', 'INFORMASI PERBAIKAN')
                  AND softdelete = 0 
                  AND claim_date BETWEEN '$startPeriod' AND '$endPeriod'
            ) AS tmp ";
        $complaint->query($query1);
        $complaint->query($query2);

        $query3 = "
            SET @sql = CONCAT(
                'SELECT claim_description, ', IFNULL(@sql, '0 AS `No Data`'), ' 
                 FROM complaint_list 
                 $where_clause
                 GROUP BY claim_description 
                 ORDER BY COUNT(claim_description) DESC'
            )";
        $complaint->query($query3);

        $query4 = 'PREPARE stmt FROM @sql';
        $complaint->query($query4);

        $query5 = 'EXECUTE stmt';

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

    // get Progress Update List All Status
    public function getProgressUpdateList($userid)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
                    detail_progress.complaint_id AS id,
                    detail_progress.id AS progress_id, 
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

    // get Progress Update List Case Closed
    public function countProgressUpdateListClosed($userid)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $query = "SELECT 
                    detail_progress.complaint_id AS id, 
                    detail_progress.progress_update AS progress_update 
                  FROM complaint_list JOIN detail_progress
                  ON complaint_list.id = detail_progress.complaint_id
                  LEFT JOIN complaint_status
                  ON complaint_list.claim_status = complaint_status.status
                  WHERE claim_status LIKE 50
                  AND read_by LIKE '%$userid%'
                  ORDER BY detail_progress.updated_at DESC";
        return $complaint->query($query)->num_rows();
    }

    public function getReadbyByUserid($userid, $stts = '')
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('detail_progress.read_by as read_by');
        $complaint->select('detail_progress.id AS id');
        $complaint->like('complaint_list.claim_status', $stts);
        $complaint->like('detail_progress.read_by', $userid);
        $complaint->join('complaint_list', 'ON complaint_list.id = detail_progress.complaint_id', 'LEFT');
        return $complaint->get('detail_progress')->result_array();
    }

    public function getReadbyByUseridByPeriod($userid, $period)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('detail_progress.read_by as read_by');
        $complaint->select('detail_progress.id AS id');
        $complaint->select('detail_progress.updated_at AS updated_at');
        $complaint->where('updated_at <', $period);
        $complaint->like('detail_progress.read_by', $userid);
        return $complaint->get('detail_progress')->result_array();
    }

    public function getLimitKeepUpdatelist()
    {
        $complaint = $this->load->database('complaint', TRUE);
        return $complaint->get_where('complaint_setting', ['item' => 'keep_update_list_duration'])->row_array()['value'];
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

    public function getReadybyByProgressid($id)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('read_by');
        $complaint->select('id as progress_id');
        $complaint->where('id', $id);
        return $complaint->get('detail_progress')->row_array();
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


    // unset Read By List by Progress ID
    public function performGroupUnsetReadby($arr)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->update_batch('detail_progress', $arr, 'id');
        return $complaint->affected_rows();
    }

     // unset Read By List by Complaint ID
    public function performGroupUnsetReadbyComplaintId($arr)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->update_batch('detail_progress', $arr, 'complaint_id');
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

    // Get branches lists by regionals
    public function getBranchListByRegionals($regionals)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $where_clause = " region IN ($regionals) ";

        $complaint->distinct();
        $complaint->select('region');
        $complaint->select('under_branch');
        //$complaint->where('svc_type', $type);
        $complaint->where($where_clause);
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
        $complaint->select('complaint_list.part7_type as part7_type');
        $complaint->select('complaint_list.part7_code as part7_code');
        $complaint->select('complaint_list.part7_isready as part7_isready');
        $complaint->select('complaint_list.part8_type as part8_type');
        $complaint->select('complaint_list.part8_code as part8_code');
        $complaint->select('complaint_list.part8_isready as part8_isready');
        $complaint->select('complaint_list.part9_type as part9_type');
        $complaint->select('complaint_list.part9_code as part9_code');
        $complaint->select('complaint_list.part9_isready as part9_isready');
        $complaint->select('complaint_list.part10_type as part10_type');
        $complaint->select('complaint_list.part10_code as part10_code');
        $complaint->select('complaint_list.part10_isready as part10_isready');
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
        $complaint->where('complaint_list.claim_status !=', 50);
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
        $complaint->select('complaint_list.part7_type as part7_type');
        $complaint->select('complaint_list.part7_code as part7_code');
        $complaint->select('complaint_list.part7_isready as part7_isready');
        $complaint->select('complaint_list.part8_type as part8_type');
        $complaint->select('complaint_list.part8_code as part8_code');
        $complaint->select('complaint_list.part8_isready as part8_isready');
        $complaint->select('complaint_list.part9_type as part9_type');
        $complaint->select('complaint_list.part9_code as part9_code');
        $complaint->select('complaint_list.part9_isready as part9_isready');
        $complaint->select('complaint_list.part10_type as part10_type');
        $complaint->select('complaint_list.part10_code as part10_code');
        $complaint->select('complaint_list.part10_isready as part10_isready');
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
        $complaint->where('complaint_list.claim_status !=', 50);
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
        $complaint->select('complaint_list.part7_type as part7_type');
        $complaint->select('complaint_list.part7_code as part7_code');
        $complaint->select('complaint_list.part7_isready as part7_isready');
        $complaint->select('complaint_list.part8_type as part8_type');
        $complaint->select('complaint_list.part8_code as part8_code');
        $complaint->select('complaint_list.part8_isready as part8_isready');
        $complaint->select('complaint_list.part9_type as part9_type');
        $complaint->select('complaint_list.part9_code as part9_code');
        $complaint->select('complaint_list.part9_isready as part9_isready');
        $complaint->select('complaint_list.part10_type as part10_type');
        $complaint->select('complaint_list.part10_code as part10_code');
        $complaint->select('complaint_list.part10_isready as part10_isready');
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
        $complaint->where('complaint_list.claim_status !=', 50);
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
        // $complaint->order_by('COUNT(claim_description)', 'DESC');
        $complaint->order_by('claim_description', 'ASC');
        $complaint->group_by('claim_description');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getAllPartsNeeded()
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->distinct('part1_type');
        $complaint->select('part1_type as part_type');
        $complaint->where('claim_date >=', '2023-01-01');
        $complaint->where('softdelete', 0);
        $complaint->where('is_sent', 1);
        $complaint->order_by('part1_code', 'ASC');
        // $complaint->group_by('claim_description');
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
        $complaint->join('complaint_status', 'ON complaint_list.claim_status = complaint_status.status', 'RIGHT');
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
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) = "50" THEN 1 END) AS case_closed');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) != "50" THEN 1 END) AS in_progress');
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
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) = "50" THEN 1 END) AS case_closed');
        $complaint->select('COUNT(CASE WHEN LOWER(claim_status) != "50" THEN 1 END) AS in_progress');
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

    // Vue New Same day 
    public function countClaimSamedayForwardByParams($params)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $startPeriod = $params['startPeriod'];
        $endPeriod = $params['endPeriod'];

        $complaint->select("DATE_FORMAT(complaint_list.claim_date, '%Y-%m-01') AS month");
        $complaint->select('COUNT(claim_date) AS claim_qty');
        $complaint->select('COUNT(CASE WHEN claim_date = forwarded_date THEN 1 END) AS same_day_forward');
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

        $complaint->where('status !=', 10);
        $complaint->select('status, description, group_status');
        $complaint->order_by('status', 'ASC');
        return $complaint->get('complaint_status')->result_array();
    }

    public function getAllComplaintRootcauseList()
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->distinct();
        $complaint->where('rootcause !=', NULL);
        $complaint->select('rootcause');
        return $complaint->get('complaint_list')->result_array();
    }

    public function getAllComplaintCountermeasureList()
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->distinct();
        $complaint->where('countermeasure !=', NULL);
        $complaint->select('countermeasure');
        return $complaint->get('complaint_list')->result_array();
    }

    public function performUpdateRootcauseCountermeasure($id, $rootcause, $countermeasure)
    {
        $complaint = $this->load->database('complaint', TRUE);

        $complaint->where('id', $id);
        $complaint->set('rootcause', $rootcause);
        $complaint->set('countermeasure', $countermeasure);
        $complaint->update('complaint_list');
        return $complaint->affected_rows();
    }
}
