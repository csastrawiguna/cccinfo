<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo_model extends CI_Model
{
    public function getPricelistByPeriod($period)
    {
    	$this->db->where('period', $period);
    	return $this->db->get('pricelist')->result_array();
    }

    public function getPeriod()
    {
    	$this->db->distinct();
    	$this->db->select('period');
    	return $this->db->get('pricelist')->result_array();
    }

    public function getLatestPeriod()
    {
    	$this->db->distinct();
    	$this->db->select('period');
    	return $this->db->get('pricelist')->row_array()['period'];
    }

    public function getAllActivePromo()
    {
        //$this->db->where('status', 1);
        $this->db->order_by('is_active', 'DESC');
        $this->db->order_by('date', 'DESC');
        return $this->db->get('promo_list')->result_array();
    }

    public function insertNewPromo($data)
    {
        $this->db->insert('promo_list', $data);
        return $this->db->affected_rows();
    }

    public function getPromoById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('promo_list')->row_array();
    }

    public function editPromo($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('promo_list', $data);
        return $this->db->affected_rows();
    }

    public function getAllMemos()
    {
        $this->db->order_by('memo_date', 'DESC');
        return $this->db->get('info_memo')->result_array();   
    }

    public function getAllGeneralInfos()
    {
        $this->db->where('type', 'Estimasi Part');
        $this->db->order_by('type', 'ASC');
        $this->db->order_by('date', 'DESC');
        return $this->db->get('info_bopart')->result_array();
    }

    public function getAllInfoType()
    {
        $this->db->distinct('type');
        $this->db->select('type');
        return $this->db->get('info_general')->result_array();
    }

    public function getSassAr()
    {
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('sass_name', 'ASC');
        return $this->db->get('info_sassar')->result_array();
    }

    public function updateArById($data)
    {
        $this->db->where('sass_csmsid', $data['sass_csmsid']);
        $this->db->update('info_sassar', $data);
        return $this->db->affected_rows();
    }

    public function addArById($data)
    {
        $this->db->insert('info_sassar', $data);
        return $this->db->affected_rows();
    }

    public function deleteBopartById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('info_bopart');
        return $this->db->affected_rows();
    }

}
