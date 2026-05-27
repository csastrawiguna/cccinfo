<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_model extends CI_Model
{
	public function getScheduleByDateByBranch($branch = null, $startDate, $endDate)
	{
		$this->db->where('branch', $branch);
		$this->db->where('visit_schedule >=', $startDate);
		$this->db->where('visit_schedule <=', $endDate);
		$this->db->order_by('visit_schedule', 'DESC');
		return $this->db->get('schedule_repair')->result_array();
	}

	public function getBranchesOnSchedule()
	{
		$this->db->distinct();
		$this->db->select('branch');
		return $this->db->get('schedule_repair')->result_array();
	}

	public function getLatestBranchOnSchedule($startDate, $endDate)
	{
		$this->db->distinct();
		$this->db->select('branch');
		$this->db->where('visit_schedule >=', $startDate);
		$this->db->where('visit_schedule <=', $endDate);
		return $this->db->get('schedule_repair')->result_array();
	}

	public function uploadScheduleFromExcel($data)
	{
		$this->db->insert_batch('schedule_repair', $data);
		return $this->db->affected_rows();
	}

	public function getAllBranches()
	{
		$this->db->select('branch');
		$this->db->select('code');
		$this->db->order_by('code', 'ASC');
		return $this->db->get('branch')->result_array();
	}

	public function performAutoDeleteOldRepairData($limitDate)
	{
		$this->db->where('visit_schedule <=', $limitDate);
		$this->db->delete('schedule_repair');
	}

	public function performAddSingleScheduleRepair($data)
	{
		$this->db->insert('schedule_repair', $data);
		return $this->db->affected_rows();
	}

	public function performDeleteSchedule($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('schedule_repair');
		return $this->db->affected_rows();
	}

	public function performDeleteScheduleAcinstall($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('schedule_acinstall');
		return $this->db->affected_rows();
	}

	public function performAutoDeleteOldInstallData($limitDate)
	{
		$this->db->where('install_date <=', $limitDate);
		$this->db->delete('schedule_acinstall');
	}

	public function getSingleScheduleRepair($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('schedule_repair')->row_array();
	}

	public function performUpdateScheduleRepair($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->set('notif', $data['notif']);
		$this->db->set('notif_status', $data['notif_status']);
		$this->db->set('customer_name', $data['customer_name']);
		$this->db->set('customer_address', $data['customer_address']);
		$this->db->set('customer_phone', $data['customer_phone']);
		$this->db->set('model', $data['model']);
		$this->db->set('description', $data['description']);
		$this->db->set('technician', $data['technician']);
		$this->db->set('visit_schedule', $data['visit_schedule']);
		$this->db->set('remark', $data['remark']);
		$this->db->update('schedule_repair');
		return $this->db->affected_rows();
	}

	public function getScheduleAcinstallByDate($startDate, $endDate)
	{
		$this->db->select('accontractor.id AS contractor_id');
		$this->db->select('accontractor.name AS contractor');
		$this->db->select('accontractor.pic_name AS pic_name');
		$this->db->select('accontractor.pic_phone AS pic_phone');
		$this->db->select('schedule_acinstall.id AS id');
		$this->db->select('schedule_acinstall.install_date AS install_date');
		$this->db->select('schedule_acinstall.spk_letter AS spk_letter');
		$this->db->select('schedule_acinstall.customer_name AS customer_name');
		$this->db->select('schedule_acinstall.customer_phone AS customer_phone');
		$this->db->select('schedule_acinstall.customer_address AS customer_address');
		$this->db->select('schedule_acinstall.model AS model');
		$this->db->select('schedule_acinstall.purchasement AS purchasement');
		$this->db->select('schedule_acinstall.remark AS remark');
		$this->db->order_by('schedule_acinstall.install_date', 'DESC');
		$this->db->join('accontractor', 'accontractor.id = schedule_acinstall.contractor_id');
		$this->db->where('schedule_acinstall.install_date >=', $startDate);
		$this->db->where('schedule_acinstall.install_date <=', $endDate);
		return $this->db->get('schedule_acinstall')->result_array();
	}

	public function getAllAccontractors()
	{
		return $this->db->get('accontractor')->result_array();
	}

	public function uploadScheduleAcinstallFromExcel($data)
	{
		$this->db->insert_batch('schedule_acinstall', $data);
		return $this->db->affected_rows();
	}

	public function performAddSingleScheduleAcinstall($data)
	{
		$this->db->insert('schedule_acinstall', $data);
		return $this->db->affected_rows();
	}

	public function getSingleScheduleAcinstall($id)
	{
		$this->db->select('accontractor.id AS contractor_id');
		$this->db->select('accontractor.name AS contractor');
		$this->db->select('accontractor.pic_name AS pic_name');
		$this->db->select('accontractor.pic_phone AS pic_phone');
		$this->db->select('acinstall.id AS id');
		$this->db->select('acinstall.install_date AS install_date');
		$this->db->select('acinstall.spk_letter AS spk_letter');
		$this->db->select('acinstall.customer_name AS customer_name');
		$this->db->select('acinstall.customer_phone AS customer_phone');
		$this->db->select('acinstall.customer_address AS customer_address');
		$this->db->select('acinstall.model AS model');
		$this->db->select('acinstall.purchasement AS purchasement');
		$this->db->select('acinstall.remark AS remark');
		$this->db->join('accontractor', 'accontractor.id = acinstall.contractor_id');
		$this->db->where('acinstall.id', $id);
		return $this->db->get('schedule_acinstall')->row_array();
	}

	public function performUpdateSingleScheduleAcinstall($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('schedule_acinstall', $data);
		return $this->db->affected_rows();
	}
}
