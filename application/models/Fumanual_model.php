<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fumanual_model extends CI_Model
{
	public $fumanual;

	public function __construct()
    {
    	parent::__construct();
        $this->fumanual = $this->load->database('fumanual', TRUE);
    }

    public function allWebSurveyResult()
    {
    	return $this->fumanual->get('websurvey_result')->result_array();
    }

    public function getMinMaxDate()
    {
        $this->fumanual->select('MIN(survey_submission) AS date_min');
        $this->fumanual->select('MAX(survey_submission) AS date_max');
        $this->fumanual->select('MAX(data_upload_at) AS data_upload_at');
        return $this->fumanual->get('websurvey_result')->row_array();
    }

    public function autoDeleteWebSurveyData($limit)
    {
        $this->fumanual->where('survey_submission <', $limit);
        $this->fumanual->delete('websurvey_result');
    }

    public function getWebSurveyResultByNotif($notif)
    {
    	$this->fumanual->where('notification', $notif);
    	return $this->fumanual->get('websurvey_result')->result_array();
    }

    public function performUploadWebsurveyResult($data)
    {
    	$this->fumanual->insert_batch('websurvey_result', $data);
    	return $this->fumanual->affected_rows();
    }

    public function getMonthsDataKeeping()
    {
        return $this->fumanual->get_where('websurvey_setting', ['item' => 'months data keeping'])->row_array()['value'];
    }
	
	
}
