<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Fumanual extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fumanual_model', 'fumanual');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Summary of Follow Up Result';

        $period = '2023-01-01';
        $data['resultSummary'] = $this->fumanual->getSummaryByResult($period);
        $data['resultByAgent'] = $this->fumanual->getTotalDataByAgent($period);
        $data['resultBySass'] = $this->fumanual->getTotalDataBySass($period);
        $data['resultBySassSum'] = $this->fumanual->getTotalDataSumBySass($period);
        $data['resultByDate'] = $this->fumanual->getTotalDataByDate($period);
        $data['totalData'] = $this->fumanual->getTotalData($period);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/fusass-summary', $data);
        $this->load->view('templates/footer', $data);
    }

    public function apsurvey()
    {
        check_access();
        $data['title'] = 'Survey AP';
        $data['allSurveyData'] = $this->fumanual->getAllSurveyData();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/surveyap', $data);
        $this->load->view('templates/footer', $data);
    }

    public function list()
    {
        check_access();
        $data['title'] = 'Daftar Survey Manual';
        $period = '2023-01-01';
        $data['allSurveyData'] = $this->fumanual->allSurveyDataByAgent($this->session->userdata('userid'), $period);
        //$data['allSurveyData'] = $this->fumanual->allSurveyDataByAgent('Zardi', $period);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/survey-list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function fillsurvey($id)
    {
        $data['title'] = 'Isi Survey';    
        $data['surveyData'] = $this->fumanual->getSurveyData($id);
        // $phone = $this->fumanual->getSurveyData($id)['customer_phone'];
        $data['relatedData'] = $this->fumanual->getRelatedData($this->fumanual->getSurveyData($id));

        // $this->form_validation->set_rules('fumanualQuestioner1', 'Questioner 1', 'required');
        // $this->form_validation->set_rules('fumanualQuestioner2', 'Questioner 2', 'required');
        // $this->form_validation->set_rules('fumanualQuestioner3', 'Questioner 3', 'required');
        $this->form_validation->set_rules('fumanualStatus', 'Status Survey', 'required');
        //$this->form_validation->set_rules('fumanualQuestionerQ3Remark', 'Remark 3', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('fumanual/survey-filling', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id' => $id,
                'q1' => $this->input->post('fumanualQuestioner1'),
                'q2' => $this->input->post('fumanualQuestioner2'),
                'q3' => $this->input->post('fumanualQuestioner3'),
                'remark' => $this->input->post('fumanualQuestionerQ3Remark'),
                'received_by' => $this->input->post('fumanualQuestionerReceivedBy'),
                'is_positive' => $this->input->post('fumanualResult'),
                'followup_status' => $this->input->post('fumanualStatus'),
                'followup_at' => date("Y-m-d H:i:s")
            ];

            if ($this->fumanual->updateSurvey($data) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data survey berhasil disimpan!');
                redirect('fumanual/list');
            }
        }
    }

    public function byagent()
    {
        check_access();
        $data['title'] = 'Result by Agent';

        if(!$this->input->post('fumanualSummarySelectAgent')) {
            $period = '2023-01-01';
        } else {
            $period = $this->input->post('fumanualSummarySelectAgent');
        }
        $data['resultSummary'] = $this->fumanual->getSummaryByResult($period);
        $data['resultByAgent'] = $this->fumanual->getTotalDataByAgent($period);
        $data['resultBySass'] = $this->fumanual->getTotalDataBySass($period);
        $data['resultBySassSum'] = $this->fumanual->getTotalDataSumBySass($period);
        $data['totalData'] = $this->fumanual->getTotalData($period);
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/fusass-summary', $data);
        $this->load->view('templates/footer', $data);
    }

    public function distribute()
    {
        check_access();
        $data['title'] = 'Disribusi FU manual';
        $data['allSurveyData'] = $this->fumanual->getAllSurveyData();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/survey-distribution', $data);
        $this->load->view('templates/footer', $data);
    }

    public function perform_distribution()
    {
        $period = '2023-01-01';
        $agents = ['Ayunda', 'Dinda', 'Dinty', 'Firas', 'Okti', 'Tegar'];
        $fulist = $this->fumanual->getSurveyDataForDistribution($period);
    }

    public function updateapsurvey()
    {     
        $updateData = [ 
            'id' => $this->input->post('modalPerformSurveyApId'),  
            'q1' => $this->input->post('modalPerformSurveyApQ1'),
            'q2' => $this->input->post('modalPerformSurveyApQ2'),
            'q3' => $this->input->post('modalPerformSurveyApQ3'),
            'q4' => $this->input->post('modalPerformSurveyApQ4'),
            'q5' => $this->input->post('modalPerformSurveyApQ5'),
            'remark' => $this->input->post('modalPerformSurveyApRemark'),
            'status' => $this->input->post('modalPerformSurveyApStatus'),
            'saved_by' => $this->session->userdata('userid'),
            'saved_at' => date("Y-m-d h:i:s"),
        ];
            
        if ($this->fumanual->performUpdateApsurvey($updateData) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|success|Data survey berhasil disimpan!');
            redirect('fumanual/apsurvey');
        }
    }

    public function databyid()
    {
        $id = $this->input->post('id');
        echo json_encode($this->fumanual->getDataById($id));
    }
    
    public function sass()
    {
        check_access();
        $data['title'] = 'SASS List';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/sasslist', $data);
        $this->load->view('templates/footer', $data);
    }

    public function websurvey()
    {
        check_access();
        $data['title'] = 'Web Survey Result';
        $this->_autodeleteData();
        $data['minmaxDate'] = $this->fumanual->getMinMaxDate();
        $data['result'] = $this->fumanual->getWebSurveyResultByNotif($this->input->post('websurveySearchNotif'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('fumanual/websurvey-result', $data);
        $this->load->view('templates/footer', $data);
    }

    public function uploadWebsurveyResult()
    {
        if (!empty($_FILES['uploadWebsurveyResultFile']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['uploadWebsurveyResultFile']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            // file path
            $reader->setLoadSheetsOnly('Upload Format');
            $reader->setReadEmptyCells(false);
            // $reader->setIgnoreRowsWithNoCells(true);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($_FILES['uploadWebsurveyResultFile']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true);
            // echo "<pre>";
            // var_dump($allDataInSheet);die;
            // array Count
            $dataUploaded = [];
            $numrow = 4;
            foreach ($allDataInSheet as $row) {
                if ($numrow > 4) {
                    // check if empty cell of notification
                    if ($row['O'] == '0' && $row['P'] == '0') {
                        continue; 
                    } else {
                        $dataUploaded[] = [
                            'fu_type' => $this->_checkfutype($row['O']),
                            'notification' => $row['P'],
                            'q1_point' => $row['Q'],
                            'q1_remark' => $this->_toNull($row['R']),
                            'q2_point' => $row['S'],
                            'q2_remark' => $this->_toNull($row['T']),
                            'q3_point' => $row['U'],
                            'q3_remark' => $this->_toNull($row['V']),
                            'q4_point' => $row['W'],
                            'survey_submission' => date("Y-m-d H:i:s", strtotime($row['X'])),
                            'data_upload_by' => $this->session->userdata('userid'),
                            'data_upload_at' => date("Y-m-d H:i:s"),
                        ];
                    }
                }
                $numrow++;
            }

            // remove first 2 elements (table header)
            unset($dataUploaded[0]);
            unset($dataUploaded[1]);

            // upload to database
            $nums = $this->fumanual->performUploadWebsurveyResult($dataUploaded);
            if ($nums > 0) {
                $this->session->set_flashdata('message', 'Success|success|'. number_format($nums, 0) . ' data berhasil di-upload!');
                redirect('fumanual/websurvey');
            }
        }   
    }

    public function toExcelAllResult()
    {
        $result = $this->fumanual->allWebSurveyResult();
        $dataMinMax = $this->fumanual->getMinMaxDate();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //$sheet->mergeCells('A1:S1');
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->setCellValue('A1', 'DATA ISIAN WEB SURVEY');
        // $sheet->mergeCells('A2:W2');
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('B')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $subtitle = 'Periode : ' . date("d M Y", strtotime($dataMinMax['date_min'])) . ' - ' . date("d M Y", strtotime($dataMinMax['date_min']));
        $sheet->setCellValue('A2', $subtitle);

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'FU type');
        $sheet->setCellValue('C4', 'Notif/job order');
        $sheet->setCellValue('D4', 'Q1 point');
        $sheet->setCellValue('E4', 'Q1 remark');
        $sheet->setCellValue('F4', 'Q2 point');
        $sheet->setCellValue('G4', 'Q2 remark');
        $sheet->setCellValue('H4', 'Q3 point');
        $sheet->setCellValue('I4', 'Q3 remark');
        $sheet->setCellValue('J4', 'Q4 point');
        $sheet->setCellValue('K4', 'Waktu Isi Survey');

        $rowCount = 5;
        $rowNumber = 1;
        
        foreach ($result as $row) {
            $sheet->setCellValue('A' . $rowCount, $rowNumber++);
            $sheet->setCellValue('B' . $rowCount, strtoupper($row['fu_type']));
            $sheet->setCellValue('C' . $rowCount, $row['notification']);
            $sheet->setCellValue('D' . $rowCount, $row['q1_point']);
            $sheet->setCellValue('E' . $rowCount, $row['q2_remark']);
            $sheet->setCellValue('F' . $rowCount, $row['q2_point']);
            $sheet->setCellValue('G' . $rowCount, $row['q2_remark']);
            $sheet->setCellValue('H' . $rowCount, $row['q3_point']);
            $sheet->setCellValue('I' . $rowCount, $row['q3_remark']);
            $sheet->setCellValue('J' . $rowCount, $row['q4_point']);
            $sheet->setCellValue('K' . $rowCount, date("d M Y H:i", strtotime($row['survey_submission'])));
            $rowCount++;
        }

        // cell border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'hair',
                    'color' => ['argb' => 'FF333333'],
                ],
            ],
        ];
        $sheet->getStyle('A4:K' . $rowCount)->applyFromArray($styleArray);
        $sheet->getStyle('A4:K4')->applyFromArray(['font' => ['bold' => true]]);
        
        // wrap alignment
        $spreadsheet->getActiveSheet()->getStyle('A4:K' . $rowCount)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A4:K' . $rowCount)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('A4:K' . $rowCount)->getAlignment()->setWrapText(true);

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(20);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        ob_end_clean();
        $fileName = 'Data Isian Web Survey ' . date("d M Y", strtotime($dataMinMax['date_min'])) . ' - ' . date("d M Y", strtotime($dataMinMax['date_max'])) . '.xlsx';

        $sheet->setTitle("Result of Web Survey");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename= . $fileName"); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    private function _checkfutype($cek)
    {
        if (strtolower($cek) == 'fu-acinstall') {
            return 'Z0 (AC install)';
        } else {
            return 'Z1/Z2/ZY';
        }
    }

    private function _toNull($cell)
    {
        if (is_bool($cell)) {
            return NULL;
        } else {
            return $cell;
        }
    }

    private function _autodeleteData()
    {
        $duration = $this->fumanual->getMonthsDataKeeping();
        $limit = date("Y-m-d H:i:s", strtotime("-" . $duration . " months"));
        $this->fumanual->autoDeleteWebSurveyData($limit);
    }
}
