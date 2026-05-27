<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pricelist_model extends CI_Model
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
        $this->db->order_by('period', 'DESC');
    	return $this->db->get('pricelist')->result_array();
    }

    public function getLatestPeriod()
    {
    	$this->db->distinct();
    	$this->db->select('period');
        $this->db->order_by('period', 'DESC');
    	return $this->db->get('pricelist')->row_array()['period'];
    }

    public function getDealers($city, $category)
    {
        $this->db->like('city', $city);
        $this->db->like('category', $category);
        return $this->db->get('dealer')->result_array();
    }

    public function getCities()
    {
        $this->db->distinct();
        $this->db->select('city');
        $this->db->order_by('city', 'ASC');
        return $this->db->get('dealer')->result_array();
    }    

    public function uploadPricelistFromExcel($data)
    {
        $this->db->insert_batch('pricelist', $data);
        return $this->db->affected_rows();
    }

    public function insertSingleData($data)
    {
        $this->db->insert('pricelist', $data);
        return $this->db->affected_rows();
    }

    public function getDataByModelByPeriod($period, $model)
    {
        $this->db->where('period', $period);
        $this->db->where('model', $model);
        return $this->db->get('pricelist')->row_array();
    }

    public function updateSingleData($updateData)
    {
        $this->db->where('period', $updateData['period']);
        $this->db->where('model', $updateData['model']);
        $this->db->set('specification', $updateData['specification']);
        $this->db->set('debut', $updateData['debut']);
        $this->db->set('price', $updateData['price']);
        $this->db->set('is_nla', $updateData['is_nla']);
        $this->db->set('remark', $updateData['remark']);
        $this->db->set('updated_by', $updateData['updated_by']);
        $this->db->set('updated_at', $updateData['updated_at']);
        $this->db->update('pricelist');
        return $this->db->get('pricelist')->row_array();
    }

    public function deleteSinglePricelist($period, $model)
    {
        $this->db->where('period', $period);
        $this->db->where('model', $model);
        $this->db->delete('pricelist');
        return $this->db->affected_rows();
    }

}
