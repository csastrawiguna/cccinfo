<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partcode_model extends CI_Model
{    
	public function getAllPartcode()
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->limit(50);
		$partcode->order_by('hit', 'DESC');
		return $partcode->get('part_list')->result_array();
	}

	public function getPartcodeByParam($params)
	{
		$partcode = $this->load->database('partcode', TRUE);

		$partcode->like('model', $params['model']);
		$partcode->like('part_desc', $params['part_desc']);
		$partcode->like('part_code', $params['part_code']);
		return $partcode->get('part_list')->result_array();
	}

	public function updateHitByParam($params)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$model = $params['model'];
		$part_desc = $params['part_desc'];
		$part_code = $params['part_code'];

		$query = "UPDATE part_list SET hit = hit + 1 WHERE model LIKE '%$model%' AND part_desc LIKE '%$part_desc%' AND part_code LIKE '%$part_code%'";
		$partcode->query($query);
	}

	public function getPartLog($id)
	{
		$partcode = $this->load->database('partcode', TRUE);

		$partcode->select('part_list.part_code AS part_code');
		$partcode->select('log_list.part_id AS part_id');
		$partcode->select('log_list.prev_part_desc AS prev_part_desc');
		$partcode->select('log_list.new_part_desc AS new_part_desc');
		$partcode->select('log_list.prev_is_nla AS prev_is_nla');
		$partcode->select('log_list.new_is_nla AS new_is_nla');
		$partcode->select('log_list.prev_model AS prev_model');
		$partcode->select('log_list.new_model AS new_model');
		$partcode->select('log_list.prev_category AS prev_category');
		$partcode->select('log_list.new_category AS new_category');
		$partcode->select('log_list.prev_remark AS prev_remark');
		$partcode->select('log_list.new_remark AS new_remark');
		$partcode->select('log_list.updated_by AS updated_by');
		$partcode->select('log_list.updated_at AS updated_at');
		$partcode->join('part_list', 'ON part_list.id = log_list.part_id');
		$partcode->where('part_id', $id);
		$partcode->group_by('updated_at');
		$partcode->order_by('updated_at', 'DESC');
		return $partcode->get('log_list')->result_array();
	}

	public function getAllPartDesc()
	{
		$partcode = $this->load->database('partcode', TRUE);

		$partcode->distinct();
		$partcode->select('part_desc');
		$partcode->where('is_nla', 0);
		$partcode->group_by('part_desc');
		$partcode->order_by('COUNT(part_desc)', 'DESC');
		return $partcode->get('part_list')->result_array();
	}

	public function checkExisting($code)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->where('part_code', $code);
		return $partcode->get('part_list')->num_rows();
	}

	public function addNew($data)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->insert('part_list', $data);
		return $partcode->affected_rows();
	}

	public function deleteData($id)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->where('id', $id);
		$partcode->delete('part_list');
		return $partcode->affected_rows();
	}

	public function getSinglePartCode($id)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->where('id', $id);
		return $partcode->get('part_list')->row_array();
	}

	public function editData($data)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->where('id', $data['id']);
		$partcode->update('part_list', $data);
		return $partcode->affected_rows();
	}

	public function insertlog($data)
	{
		$partcode = $this->load->database('partcode', TRUE);
		$partcode->insert('log_list', $data);
		return $partcode->affected_rows();
	}

	public function getSummaryNew($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);
		
		$partcode->select('COUNT(input_by) AS qty');
		$partcode->select('input_by');
		$partcode->where('input_at >=', $startPeriod);
		$partcode->where('input_at <=', $endPeriod);
		$partcode->group_by('input_by');
		return $partcode->get('part_list')->result_array();
	}

	public function getSummaryUpdate($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);
		
		$partcode->select('COUNT(updated_by) AS qty');
		$partcode->select('updated_by');
		$partcode->where('updated_at >=', $startPeriod);
		$partcode->where('updated_at <=', $endPeriod);
		$partcode->group_by('updated_by');
		return $partcode->get('log_list')->result_array();
	}

	public function getSaverNewOld($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);
		
		$partcode->distinct();
		$partcode->select('input_by');
		$partcode->where('input_at >=', $startPeriod);
		$partcode->where('input_at <=', $endPeriod);
		return $partcode->get('part_list')->result_array();
	}

	public function getSaverNew($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);

		$query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(input_at, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM part_list ";
        $query2_2 = " WHERE $helper BETWEEN '$startPeriod' AND '$endPeriod' ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT input_by AS agent, ', @sql, ' " ;
        $query3_2 = "FROM part_list WHERE $helper >= $startPeriod ";
        $query3_3 = " GROUP BY input_by ORDER BY COUNT(input_by) DESC ')";
        $query3 = $query3_1 . $query3_2 . $query3_3;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $partcode->query($query1);
        $partcode->query($query2);
        $partcode->query($query3);
        $partcode->query($query4);
        return $partcode->query($query5)->result_array();
	}

	public function getSaverNewTotal($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);

        $partcode->select('DATE_FORMAT(input_at, "%Y-%m-01") AS month');
        $partcode->select('COUNT(input_at) AS qty');
        $partcode->where('DATE_FORMAT(input_at, "%Y-%m-01") >=', $startPeriod);
        $partcode->where('DATE_FORMAT(input_at, "%Y-%m-01") <=', $endPeriod);
        $partcode->group_by('DATE_FORMAT(input_at, "%Y-%m-01")');
        $partcode->order_by('DATE_FORMAT(input_at, "%Y-%m-01")');
        return $partcode->get('part_list')->result_array();
	}

	public function getCategoryNew($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);

		$query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(input_at, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM part_list ";
        $query2_2 = " WHERE $helper BETWEEN '$startPeriod' AND '$endPeriod' ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT category AS category, ', @sql, ' " ;
        $query3_2 = "FROM part_list WHERE $helper >= $startPeriod ";
        $query3_3 = " GROUP BY category ORDER BY COUNT(category) DESC ')";
        $query3 = $query3_1 . $query3_2 . $query3_3;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $partcode->query($query1);
        $partcode->query($query2);
        $partcode->query($query3);
        $partcode->query($query4);
        return $partcode->query($query5)->result_array();
	}

	public function getSaverUpdate($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);
		
		$query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(updated_at, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM log_list ";
        $query2_2 = " WHERE $helper BETWEEN '$startPeriod' AND '$endPeriod' ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT updated_by AS agent, ', @sql, ' " ;
        $query3_2 = ", COUNT(updated_by) AS total FROM log_list WHERE  $helper >= $startPeriod ";
        $query3_3 = " GROUP BY updated_by ORDER BY COUNT(updated_by) DESC ')";
        $query3 = $query3_1 . $query3_2 . $query3_3;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $partcode->query($query1);
        $partcode->query($query2);
        $partcode->query($query3);
        $partcode->query($query4);
        return $partcode->query($query5)->result_array();
	}

	public function getAgents($startPeriod, $endPeriod)
	{
		$partcode = $this->load->database('partcode', TRUE);
		return $partcode->get('log_list')->result_array();
	}
}
