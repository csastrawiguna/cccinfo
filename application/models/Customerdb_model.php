<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customerdb_model extends CI_Model
{
    public function getAllCustomersByArea($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        // $customerdb->select('COUNT(CASE WHEN current_province = "DKI Jakarta" THEN 1 END) AS jakarta');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Banten" THEN 1 END) AS banten');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Jawa Barat" THEN 1 END) AS jawa_barat');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Jawa Tengah" THEN 1 END) AS jawa_tengah');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Jawa Timur" THEN 1 END) AS jawa_timur');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Bali" THEN 1 END) AS bali');
        // $customerdb->select('COUNT(CASE WHEN current_province = "Sumatera Utara" THEN 1 END) AS sumatera_utara');

        $customerdb->select('current_province as province');
        $customerdb->select('COUNT(current_province) as qty');
        $customerdb->order_by('COUNT(current_province)', 'DESC');
        $customerdb->group_by('current_province');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllRegion($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('region as region');
        $customerdb->select('COUNT(region) as qty');
        $customerdb->order_by('COUNT(region)', 'DESC');
        $customerdb->group_by('region');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getTotalCustomers($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->num_rows();
    }

    public function getMinMaxDate($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('MIN(reg_date) AS date_min');
        $customerdb->select('MAX(reg_date) AS date_max');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->row_array();
    }

    public function getMinMaxRegDateProduct()
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('MIN(reg_date) AS date_min');
        $customerdb->select('MAX(reg_date) AS date_max');
        return $customerdb->get('product')->row_array();
    }

    public function getAllCustomersByAgeRange10()
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 THEN 1 END) AS below20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 29 THEN 1 END) AS 20to29');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 30 AND 39 THEN 1 END) AS 30to39');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 40 AND 49 THEN 1 END) AS 40to49');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 50 AND 59 THEN 1 END) AS 50to59');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 THEN 1 END) AS 60above');
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByAge($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 THEN 1 END) AS below20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 THEN 1 END) AS 20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 THEN 1 END) AS 26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 THEN 1 END) AS 31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 THEN 1 END) AS 36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 THEN 1 END) AS 41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 THEN 1 END) AS 46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 THEN 1 END) AS 51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 THEN 1 END) AS 56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 THEN 1 END) AS 60above');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByAgeByGender($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);        
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 AND gender = "F" THEN 1 END) AS femalebelow20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 AND gender = "F" THEN 1 END) AS female20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 AND gender = "F" THEN 1 END) AS female26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 AND gender = "F" THEN 1 END) AS female31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 AND gender = "F" THEN 1 END) AS female36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 AND gender = "F" THEN 1 END) AS female41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 AND gender = "F" THEN 1 END) AS female46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 AND gender = "F" THEN 1 END) AS female51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 AND gender = "F" THEN 1 END) AS female56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 AND gender = "F" THEN 1 END) AS female60above');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 AND gender = "M" THEN 1 END) AS malebelow20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 AND gender = "M" THEN 1 END) AS male20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 AND gender = "M" THEN 1 END) AS male26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 AND gender = "M" THEN 1 END) AS male31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 AND gender = "M" THEN 1 END) AS male36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 AND gender = "M" THEN 1 END) AS male41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 AND gender = "M" THEN 1 END) AS male46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 AND gender = "M" THEN 1 END) AS male51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 AND gender = "M" THEN 1 END) AS male56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 AND gender = "M" THEN 1 END) AS male60above');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByAgeMale($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 THEN 1 END) AS below20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 THEN 1 END) AS 20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 THEN 1 END) AS 26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 THEN 1 END) AS 31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 THEN 1 END) AS 36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 THEN 1 END) AS 41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 THEN 1 END) AS 46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 THEN 1 END) AS 51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 THEN 1 END) AS 56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 THEN 1 END) AS 60above');
        $customerdb->where('gender', 'M');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByAgeFemale($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 THEN 1 END) AS below20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 THEN 1 END) AS 20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 THEN 1 END) AS 26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 THEN 1 END) AS 31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 THEN 1 END) AS 36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 THEN 1 END) AS 41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 THEN 1 END) AS 46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 THEN 1 END) AS 51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 THEN 1 END) AS 56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 THEN 1 END) AS 60above');
        $customerdb->where('gender', 'F');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByAgeOthers($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) < 20 THEN 1 END) AS below20');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 20 AND 25 THEN 1 END) AS 20to25');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 26 AND 30 THEN 1 END) AS 26to30');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 31 AND 35 THEN 1 END) AS 31to35');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 36 AND 40 THEN 1 END) AS 36to40');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 41 AND 45 THEN 1 END) AS 41to45');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 46 AND 50 THEN 1 END) AS 46to50');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 51 AND 55 THEN 1 END) AS 51to55');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) BETWEEN 56 AND 60 THEN 1 END) AS 56to60');
        $customerdb->select('COUNT(CASE WHEN FLOOR(DATEDIFF(CURDATE(), birthdate)/365) >60 THEN 1 END) AS 60above');
        $customerdb->where('gender', '');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        return $customerdb->get('customer')->result_array();
    }

    public function getAllCustomersByProductCategory($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('category_main AS category');
        $customerdb->select('COUNT(category_main) AS qty');
        $customerdb->where('reg_date >=', $params['startPeriod']);
        $customerdb->where('reg_date <=', $params['endPeriod']);
        $customerdb->group_by('category_main');
        return $customerdb->get('product')->result_array();
    }

    public function getAllCustomersByUnitQty()
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('product.customer_id AS customer_id');
        $customerdb->select('COUNT(product.customer_id) AS qty');
        $customerdb->group_by('product.customer_id');
        $customerdb->order_by('COUNT(product.customer_id)', 'DESC');
        //$customerdb->join('customer', 'ON customer.customer_id = product.customer_id');
        return $customerdb->get('product')->result_array();
    }

    public function getAllCustomersByPurchaseValue()
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('COUNT(CASE WHEN product.purchase_value > 20000000 THEN 1 END) AS above20mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 15000000 AND 20000000 THEN 1 END) AS 15to20mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 10000000 AND 15000000 THEN 1 END) AS 10to15mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 8000000 AND 10000000 THEN 1 END) AS 8to10mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 6000000 AND 8000000 THEN 1 END) AS 6to8mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 5000000 AND 6000000 THEN 1 END) AS 5to6mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 4000000 AND 5000000 THEN 1 END) AS 4to5mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 3000000 AND 4000000 THEN 1 END) AS 3to4mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 2000000 AND 3000000 THEN 1 END) AS 2to3mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value BETWEEN 1000000 AND 2000000 THEN 1 END) AS 1to2mil');
        $customerdb->select('COUNT(CASE WHEN product.purchase_value < 1000000 THEN 1 END) AS below1mil');
        //$customerdb->join('customer', 'ON customer.customer_id = product.customer_id');
        return $customerdb->get('product')->result_array();
    }

    public function getCityByProvince($province)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('city');
        $customerdb->where('province', $province);
        return $customerdb->get('province_city')->result_array();
    }

    public function getAllProvince($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->distinct();
        $customerdb->select('province');
        $customerdb->order_by('province', 'ASC');
        return $customerdb->get('province_city')->result_array();
    }

    public function getCustomersByParam($params)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->distinct();
        $customerdb->select('COUNT(customer.customer_name) AS qty');
        //$customerdb->select('customer.customer_name AS customer_name');
        //$customerdb->select('customer.phone1 AS customer_phone');
        //$customerdb->limit(100);

        //$customerdb->where('customer.reg_date >=', $params['startPeriod']);
        //$customerdb->where('customer.reg_date <=', $params['endPeriod']);
        $customerdb->like('customer.current_province ', $params['province']);
        $customerdb->like('customer.current_city ', $params['city']);
        //$customerdb->where('TIMESTAMPDIFF(YEAR, customer.birthdate, CURDATE()) >=', $params['ageMin']);
        //$customerdb->where('TIMESTAMPDIFF(YEAR, customer.birthdate, CURDATE()) <=', $params['ageMax']);
        //$customerdb->where('COUNT(product.customer_id) >=', $params['unitQtyMin']);
        //$customerdb->where('COUNT(product.customer_id) <=', $params['unitQtyMax']);
        //$customerdb->where('product.purchase_value >=', $params['purchaseValueMin']);
        //$customerdb->where('product.purchase_value <=', $params['purchaseValueMax']);
        $customerdb->like('customer.phone1', $params['customerPhone']);
        $customerdb->like('customer.email', $params['customerEmail']);
        $customerdb->like('product.category_main', $params['categoryAirconditioner']);
        // $customerdb->where(' >=', $params['']);
        // $customerdb->where(' >=', $params['']);
        // $customerdb->where(' >=', $params['']);
        // $customerdb->where(' >=', $params['']);
        // $customerdb->where(' >=', $params['']);
        // $customerdb->where(' >=', $params['']);

        $customerdb->join('product', 'ON customer.customer_id = product.customer_id');
        return $customerdb->get('customer')->result_array();
    }

    public function getSalesBranchByCityProvince($city, $province)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('sales_branch');
        $customerdb->where('city', $city);
        $customerdb->where('province', $province);
        return $customerdb->get('province_city')->row_array();
    }

    public function uploadCustomerFromExcel($dataUploaded)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->insert_batch('customer', $dataUploaded);
        return $customerdb->affected_rows();
    }

    public function getCustomerIdByPhone($phone)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select('customer_id');
        $customerdb->where('phone1', $phone);
        return $customerdb->get('customer')->row_array();
    }

    public function getMonthlyTransition($startPeriod, $endPeriod)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->select("DATE_FORMAT(customer.reg_date, '%Y-%m-01') AS month");
        $customerdb->select("COUNT(DATE_FORMAT(customer.reg_date, '%Y-%m-01')) AS customer");
        $customerdb->select("COUNT(DATE_FORMAT(product.reg_date, '%Y-%m-01')) AS product");
        $customerdb->where('customer.reg_date >=', $startPeriod);
        $customerdb->where('customer.reg_date <=', $endPeriod);
        $customerdb->group_by("DATE_FORMAT(customer.reg_date, '%Y-%m-01')");
        $customerdb->order_by("DATE_FORMAT(customer.reg_date, '%Y-%m-01'), 'DESC'");
        $customerdb->join('product', 'ON customer.customer_id = product.customer_id', 'LEFT');
        return $customerdb->get('customer')->result_array();
    }

    public function uploadProductFromExcel($data)
    {
        $customerdb = $this->load->database('customerdb', TRUE);
        $customerdb->insert_batch('product', $data);
        return $customerdb->affected_rows();
    }
}
