<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socmed_model extends CI_Model
{    
	public function getInquiryByPeriod($startPeriod, $endPeriod)
    {
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        $this->db->order_by('date', 'DESC');
        return $this->db->get('socmed_inquiry')->result_array();
    }

    public function insertNewInquiry($data)
    {
        $this->db->insert('socmed_inquiry', $data);
        return $this->db->affected_rows();
    }

    public function updateInquiry($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('socmed_inquiry', $data);
        return $this->db->affected_rows();
    }

    public function getInquiryById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('socmed_inquiry')->row_array();   
    }

    public function getInquiryGroup($code)
    {
        $this->db->where('system_code', $code);
        return $this->db->get('system_code')->row_array();
    }

    public function getTransitionBySocmed($startPeriod, $endPeriod)
    {
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM socmed_inquiry ";
        $query2_2 = " WHERE date BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(socmed_type) ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT socmed_type, ', @sql, ' , COUNT(socmed_type) AS type_qty FROM socmed_inquiry ";
        $query3_2 = "GROUP BY socmed_type ORDER BY COUNT(socmed_type) DESC')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $this->db->query($query1);
        $this->db->query($query2);
        $this->db->query($query3);
        $this->db->query($query4);
        return $this->db->query($query5)->result_array();
    }

    public function getTransitionByInquiry($startPeriod, $endPeriod)
    {
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM socmed_inquiry ";
        $query2_2 = " WHERE date BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(socmed_type) ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT inquiry_group, ', @sql, ' , COUNT(inquiry_group) AS inquiry_qty FROM socmed_inquiry ";
        $query3_2 = "GROUP BY inquiry_group ORDER BY COUNT(inquiry_group) DESC')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $this->db->query($query1);
        $this->db->query($query2);
        $this->db->query($query3);
        $this->db->query($query4);
        return $this->db->query($query5)->result_array();
    }

    public function getInquiryBySocmedtype($startPeriod, $endPeriod)
    {
        $this->db->select("inquiry_group, COUNT(CASE WHEN socmed_type = 'Instagram' THEN 1 END) AS instagram, COUNT(CASE WHEN socmed_type = 'Facebook' THEN 1 END) AS facebook, COUNT(CASE WHEN socmed_type = 'Twitter' THEN 1 END) AS twitter, COUNT(CASE WHEN socmed_type = 'Others' THEN 1 END) AS others, COUNT(inquiry_group) AS total_inquiry");
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        $this->db->group_by('inquiry_group');
        $this->db->order_by('COUNT(inquiry_group)', 'DESC');
        return $this->db->get('socmed_inquiry')->result_array();
    }

    public function getTransitionByAgent($startPeriod, $endPeriod)
    {
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM socmed_inquiry ";
        $query2_2 = " WHERE date BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(socmed_type) ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT saved_by, socmed_type, ', @sql, ' , COUNT(socmed_type) AS type_qty FROM socmed_inquiry ";
        $query3_2 = "GROUP BY saved_by, socmed_type ORDER BY COUNT(saved_by) DESC')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $this->db->query($query1);
        $this->db->query($query2);
        $this->db->query($query3);
        $this->db->query($query4);
        return $this->db->query($query5)->result_array();
    }

    public function getAgentLists()
    {
        $this->db->distinct();
        $this->db->select('saved_by');
        return $this->db->get('socmed_inquiry')->result_array();
    }

    public function getTransitionSubtotal($startPeriod, $endPeriod)
    {
        $query1 = 'SET @sql = NULL';
        $helper = 'DATE_FORMAT(date, "%Y-%m-01")';
        $query2_1 = "SELECT GROUP_CONCAT(DISTINCT '((( SUM($helper = ''', $helper, ''') )))
            AS `', $helper, '`') INTO @sql FROM socmed_inquiry ";
        $query2_2 = " WHERE date BETWEEN '$startPeriod' AND '$endPeriod' ORDER BY COUNT(socmed_type) ";
        $query2 = $query2_1 . $query2_2;
        $query3_1 = "SET @sql =  CONCAT('SELECT ', @sql, ' , COUNT(socmed_type) AS type_qty FROM socmed_inquiry ";
        $query3_2 = "ORDER BY COUNT(saved_by) DESC')";
        $query3 = $query3_1 . $query3_2;
        $query4 = 'PREPARE stmt FROM @sql';
        $query5 = 'EXECUTE stmt';

        $this->db->query($query1);
        $this->db->query($query2);
        $this->db->query($query3);
        $this->db->query($query4);
        return $this->db->query($query5)->row_array();
    }

    public function getSubtotalBySocmedtype($startPeriod, $endPeriod)
    {
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Instagram' THEN 1 END) AS instagram, COUNT(CASE WHEN socmed_type = 'Facebook' THEN 1 END) AS facebook, COUNT(CASE WHEN socmed_type = 'Twitter' THEN 1 END) AS twitter, COUNT(CASE WHEN socmed_type = 'Others' THEN 1 END) AS others, COUNT(socmed_type) AS total");
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        return $this->db->get('socmed_inquiry')->row_array();
    }

    public function getResponseSameDay($startPeriod, $endPeriod)
    {
        $this->db->select("DATE_FORMAT(date, '%Y-%m-01') AS month");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Instagram' THEN 1 END) AS instagram");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Instagram' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS instagram_same");
            $this->db->select("COUNT(CASE WHEN socmed_type = 'Twitter' THEN 1 END) AS twitter");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Twitter' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS twitter_same");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Facebook' THEN 1 END) AS facebook");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Facebook' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS facebook_same");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Others' THEN 1 END) AS others");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Others' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS others_same");
        $this->db->select("COUNT(DATE_FORMAT(date, '%Y-%m-01')) AS total");
        $this->db->select("COUNT(CASE WHEN DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS total_same");
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        $this->db->group_by("DATE_FORMAT(date, '%Y-%m-01')");
        $this->db->order_by("DATE_FORMAT(date, '%Y-%m-01') DESC");
        return $this->db->get('socmed_inquiry')->result_array();   
    }

    public function getResponseSameDayTotal($startPeriod, $endPeriod)
    {
        $this->db->select("DATE_FORMAT(date, '%Y-%m-01') AS month");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Instagram' THEN 1 END) AS instagram");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Instagram' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS instagram_same");
                $this->db->select("COUNT(CASE WHEN socmed_type = 'Twitter' THEN 1 END) AS twitter");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Twitter' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS twitter_same");
                $this->db->select("COUNT(CASE WHEN socmed_type = 'Facebook' THEN 1 END) AS facebook");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Facebook' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS facebook_same");
                $this->db->select("COUNT(CASE WHEN socmed_type = 'Others' THEN 1 END) AS others");
        $this->db->select("COUNT(CASE WHEN socmed_type = 'Others' AND DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS others_same");
        $this->db->select("COUNT(DATE_FORMAT(date, '%Y-%m-01')) AS total");
        $this->db->select("COUNT(CASE WHEN DATE_FORMAT(saved_at, '%Y-%m-%d') = date THEN 1 END) AS total_same");
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        return $this->db->get('socmed_inquiry')->row_array();   
    }

    public function countYesterdayInquiry($startDate, $endDate)
    {
        $this->db->select('date, COUNT(date) AS qty');
        $this->db->where('date >=', $startDate);
        $this->db->where('date <=', $endDate);
        $this->db->group_by('date');
        return $this->db->get('socmed_inquiry')->result_array();
    }

    public function deleteInquiry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('socmed_inquiry');
        return $this->db->affected_rows();
    }

    public function getRawByPeriod($startPeriod, $endPeriod)
    {
        $this->db->where('date >=', $startPeriod);
        $this->db->where('date <=', $endPeriod);
        return $this->db->get('socmed_inquiry')->result_array();
    }

    public function getLatestDate()
    {
        $this->db->select('MAX(date) AS date');
        return $this->db->get('socmed_inquiry')->row_array()['date'];
    }

    public function getEmailDetailByPeriod($startPeriod, $endPeriod)
    {
        $this->db->where("DATE_FORMAT(datetime, '%Y-%m-01') >=", $startPeriod);
        $this->db->where("DATE_FORMAT(datetime, '%Y-%m-01') <=", $endPeriod);
        return $this->db->get('email_inquiry')->result_array();
    }

    public function insertNewEmail($data)
    {
        // var_dump($data);
        // die;
        $this->db->insert('email_inquiry', $data);
        return $this->db->affected_rows();
    }

    public function deleteEmail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('email_inquiry');
        return $this->db->affected_rows();
    }
    
}
