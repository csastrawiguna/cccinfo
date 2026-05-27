<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_model extends CI_Model
{
    public function getTransition($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('DATE_FORMAT(date, "%Y-%m-01") AS month');
        $complaint->select('SUM(icall) AS icall');
        $complaint->select('SUM(whatsapp) AS whatsapp');
        $complaint->select('SUM(sms) AS sms');
        $complaint->select('SUM(email) AS email');
        $complaint->select('SUM(callback) AS callback');
        $complaint->select('SUM(confirmation_call) AS confirmation_call');
        $complaint->select('SUM(followup) AS followup');
        $complaint->select('SUM(socmed_inquiry) AS socmed_inquiry');
        $complaint->select('SUM(work_hour) AS work_hour');
        $complaint->select('SUM(icall + whatsapp + sms + email + callback + confirmation_call + followup + socmed_inquiry) AS total');
        $complaint->where('date >=', $startPeriod);
        $complaint->where('date <=', $endPeriod);
        $complaint->order_by('YEAR(date), MONTH(date)', 'ASC');
        $complaint->group_by('YEAR(date), MONTH(date)');
        return $complaint->get('daily_activity')->result_array();
    }

    public function getTransitionSameday($startPeriod, $endPeriod)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('DATE_FORMAT(date, "%Y-%m-01") AS month');
        $complaint->select('SUM(icall) AS icall');
        $complaint->select('SUM(whatsapp) AS whatsapp');
        $complaint->select('SUM(sms) AS sms');
        $complaint->select('SUM(email) AS email');
        $complaint->select('SUM(callback) AS callback');
        $complaint->select('SUM(confirmation_call) AS confirmation_call');
        $complaint->select('SUM(followup) AS followup');
        $complaint->select('SUM(socmed_inquiry) AS socmed_inquiry');
        $complaint->select('SUM(work_hour) AS work_hour');
        $complaint->select('SUM(icall + whatsapp + sms + email + callback + confirmation_call + followup + socmed_inquiry) AS total');
        $complaint->where('date >=', $startPeriod);
        $complaint->where('date <=', $endPeriod);
        $complaint->order_by('YEAR(date), MONTH(date)', 'ASC');
        $complaint->group_by('YEAR(date), MONTH(date)');
        return $complaint->get('daily_activity')->row_array();
    }

    public function getDetailByMonth($month)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->select('date');
        $complaint->select('SUM(icall) AS icall');
        $complaint->select('SUM(whatsapp) AS whatsapp');
        $complaint->select('SUM(sms) AS sms');
        $complaint->select('SUM(email) AS email');
        $complaint->select('SUM(callback) AS callback');
        $complaint->select('SUM(confirmation_call) AS confirmation_call');
        $complaint->select('SUM(followup) AS followup');
        $complaint->select('SUM(socmed_inquiry) AS socmed_inquiry');
        $complaint->select('SUM(work_hour) AS work_hour');
        $complaint->select('remark AS remark');
        $complaint->select('SUM(icall + whatsapp + sms + email + callback + confirmation_call + followup + socmed_inquiry) AS total');
        $where = "DATE_FORMAT(date, '%Y%m') = DATE_FORMAT('$month', '%Y%m')";
        $complaint->where($where);
        $complaint->order_by('date', 'ASC');
        $complaint->group_by('date');
        return $complaint->get('daily_activity')->result_array();
    }

    public function addNewData($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->insert('daily_activity', $data);
        return $complaint->affected_rows();
    }

    public function checkExistingDate($date)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('date', $date);
        return $complaint->get('daily_activity')->num_rows();   
    }

    public function getDailyActivityByDate($date)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('date', $date);
        return $complaint->get('daily_activity')->row_array();   
    }

    public function editData($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->where('date', $data['date']);
        $complaint->update('daily_activity', $data);
        return $complaint->affected_rows();
    }

    public function autoUpdateSocmed($data)
    {
        $complaint = $this->load->database('complaint', TRUE);
        $complaint->update_batch('daily_activity', $data, 'date');
    }
    
}
