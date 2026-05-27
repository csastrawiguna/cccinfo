<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Activity_model', 'activity');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $data['title'] = 'Cek Aktivitas CCC';

        if (!$this->input->post('activityDailyDateStart')) {
            $startPeriod = date("Y-m-01", strtotime("-85 days"));
            $endPeriod = date("Y-m-d");
            $numMonths = 4;
        } else {
            $startPeriod = date("Y-m-01", strtotime($this->input->post('activityDailyDateStart')));
            $endPeriod = date("Y-m-d", strtotime($this->input->post('activityDailyDateEnd')));
            // $numMonths = (int)date("m", strtotime($this->input->post('activityDailyDateEnd'))) - (int)date("m", strtotime($this->input->post('activityDailyDateStart'))) + 1;

            $yearStart = date("Y", strtotime($this->input->post('activityDailyDateStart')));
            $yearEnd = date("Y", strtotime($this->input->post('activityDailyDateEnd')));
            $monthStart = date("m", strtotime($this->input->post('activityDailyDateStart')));
            $monthEnd = date("m", strtotime($this->input->post('activityDailyDateEnd')));
            $numMonths = (($yearEnd - $yearStart) * 12) + ($monthEnd - $monthStart) + 1;
        }
        
        $data['monthlyTransitionData'] = $this->activity->getTransition($startPeriod, $endPeriod);

        $data['samedayTransition'] = [];
        for ($i = $numMonths-1; $i >= 0; $i--) {
            $period = date("Y-m-d", strtotime("-$i months -1 days"));            
            $data['samedayTransition'][] = $this->activity->getTransitionSameday(date("Y-m-01", strtotime($period)), date("Y-m-d", strtotime($period)));
        }
        $data['endDate'] = date("Y-m-d", strtotime("-1 days"));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('activity/monthly-check', $data);
        $this->load->view('templates/footer', $data);
    }

    public function monthlyTransition()
    {
        if (!$this->input->post('startPeriod')) {
            $startPeriod = date("Y-m-01", strtotime("-90 days"));
            $endPeriod = date("Y-m-d");
        } else {
            $startPeriod = date("Y-m-01", strtotime($this->input->post('startPeriod')));
            $endPeriod = date("Y-m-d", strtotime($this->input->post('endPeriod')));
        }
        $result = $this->activity->getTransition($startPeriod, $endPeriod);
        $json_data = [];
        foreach($result as $row) {
            $json_data['month'][] = date("M-Y", strtotime($row['month']));
            $json_data['icall'][] = $row['icall'];
            $json_data['whatsapp'][] = $row['whatsapp'];
            $json_data['sms'][] = $row['sms'];
            $json_data['email'][] = $row['email'];
            $json_data['callback'][] = $row['callback'];
            $json_data['confirmation_call'][] = $row['confirmation_call'];
            $json_data['followup'][] = $row['followup'];
            $json_data['socmed_inquiry'][] = $row['socmed_inquiry'];
        }
        echo json_encode($json_data);
    }

    public function samedayComparison()
    {
        if (!$this->input->post('startPeriod')) {
            $startPeriod = date("Y-m-01", strtotime("-85 days"));
            $endPeriod = date("Y-m-d");
            $numMonths = 4;
        } else {
            $startPeriod = date("Y-m-01", strtotime($this->input->post('startPeriod')));
            $endPeriod = date("Y-m-d", strtotime($this->input->post('endPeriod')));
            
            $yearStart = date("Y", strtotime($this->input->post('startPeriod')));
            $yearEnd = date("Y", strtotime($this->input->post('endPeriod')));
            $monthStart = date("m", strtotime($this->input->post('startPeriod')));
            $monthEnd = date("m", strtotime($this->input->post('endPeriod')));
            $numMonths = (($yearEnd - $yearStart) * 12) + ($monthEnd - $monthStart) + 1;
        }

        $result = [];
        for ($i = $numMonths-1; $i >= 0; $i--) {
            $period = date("Y-m-d", strtotime("-$i months -1 days"));            
            $result[] = $this->activity->getTransitionSameday(date("Y-m-01", strtotime($period)), date("Y-m-d", strtotime($period)));
        }

        $json_data = [];
        foreach($result as $row) {
            $json_data['month'][] = date("M-Y", strtotime($row['month']));
            $json_data['icall'][] = $row['icall'];
            $json_data['whatsapp'][] = $row['whatsapp'];
            $json_data['sms'][] = $row['sms'];
            $json_data['email'][] = $row['email'];
            $json_data['callback'][] = $row['callback'];
            $json_data['confirmation_call'][] = $row['confirmation_call'];
            $json_data['followup'][] = $row['followup'];
            $json_data['socmed_inquiry'][] = $row['socmed_inquiry'];
        }
        $json_data['period'] = ' (01 - ' . date("d", strtotime("-$i months -1 days")) . ')';
        echo json_encode($json_data);
    }

    public function detail()
    {
        check_access();
        $data['title'] = 'Detail Daily Act.';
        if (!$this->input->post('detailDailySelectMonth')) {
            $selectMonth = date("Y-m-01");
        } else {
            $selectMonth = date("Y-m-01", strtotime($this->input->post('detailDailySelectMonth')));
        }
        $data['detailByMonth'] = $this->activity->getDetailByMonth($selectMonth);

        $this->form_validation->set_rules('addCCCActivityDate', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('addCCCActivityCall', 'Call', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityWhatsapp', 'Whatsapp', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityEmail', 'Email', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityCallback', 'Callback', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityConfirmationcall', 'Confirmation call', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityFollowup', 'Follow up', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivitySocmedInquiry', 'Socmed Inquiry', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityWorkhour', 'Work hour', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityRemark', 'Remark', 'trim');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('activity/detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $newData = [
                'date' => $this->input->post('addCCCActivityDate'),
                'icall' => $this->input->post('addCCCActivityCall'),
                'whatsapp' => $this->input->post('addCCCActivityWhatsapp'),
                // 'sms' => $this->input->post('addCCCActivitySMS'),
                'email' => $this->input->post('addCCCActivityEmail'),
                'callback' => $this->input->post('addCCCActivityCallback'),
                'confirmation_call' => $this->input->post('addCCCActivityConfirmationcall'),
                'followup' => $this->input->post('addCCCActivityFollowup'),
                'socmed_inquiry' => $this->input->post('addCCCActivitySocmedInquiry'),
                'work_hour' => $this->input->post('addCCCActivityWorkhour'),
                'remark' => $this->input->post('addCCCActivityRemark'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date('Y-m-d h:i:s')
            ];

            if ($this->activity->checkExistingDate($this->input->post('addCCCActivityDate')) > 0) {
                $this->session->set_flashdata('message', "Gagal|error|Data di tanggal tersebut sudah ada!");
                redirect('activity/detail');
            } else {
                $dailyActivities = $newData['icall'] + $newData['whatsapp'] + $newData['sms'] + $newData['email'] + $newData['callback'] + $newData['confirmation_call'] + $newData['followup'] + $newData['socmed_inquiry'];
                if ($dailyActivities < 200) {
                    $this->session->set_flashdata('message', "Gagal|error|Total aktivitas sangat sedikit, cek lagi!");
                    redirect('activity/detail');
                } else {
                    if($this->activity->addNewData($newData) > 0) {
                        $this->session->set_flashdata('message', "Berhasil|success|Data berhasil ditambahkan!");
                        redirect('activity/detail');
                    } else {
                        $this->session->set_flashdata('message', "Gagal|success|Data mungkin ada yang tidak valid!");
                        redirect('activity/detail');
                    }
                }
            }
        }
    }

    public function activityByDate()
    {
        $date = $this->input->post('xdate');
        //$date = '2023-07-11';
        echo json_encode($this->activity->getDailyActivityByDate($date));
    }

    public function editByDate()
    {
        $this->form_validation->set_rules('addCCCActivityDate', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('addCCCActivityCall', 'Call', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityWhatsapp', 'Whatsapp', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityEmail', 'Email', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityCallback', 'Callback', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityConfirmationcall', 'Confirmation call', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityFollowup', 'Follow up', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivitySocmedInquiry', 'Socmed Inquiry', 'integer|trim|required');
        $this->form_validation->set_rules('addCCCActivityWorkhour', 'Work hour', 'integer|trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "Gagal|success|Data mungkin ada yang tidak valid!");
            redirect('activity/detail');
        } else {
            $updateData = [
                'date' => $this->input->post('addCCCActivityDate'),
                'icall' => $this->input->post('addCCCActivityCall'),
                'whatsapp' => $this->input->post('addCCCActivityWhatsapp'),
                // 'sms' => $this->input->post('addCCCActivitySMS'),
                'email' => $this->input->post('addCCCActivityEmail'),
                'callback' => $this->input->post('addCCCActivityCallback'),
                'confirmation_call' => $this->input->post('addCCCActivityConfirmationcall'),
                'followup' => $this->input->post('addCCCActivityFollowup'),
                'socmed_inquiry' => $this->input->post('addCCCActivitySocmedInquiry'),
                'work_hour' => $this->input->post('addCCCActivityWorkhour'),
                'remark' => $this->input->post('addCCCActivityRemark'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date('Y-m-d h:i:s')
            ];
            
            $dailyActivities = $updateData['icall'] + $updateData['whatsapp'] + $updateData['sms'] + $updateData['email'] + $updateData['callback'] + $updateData['confirmation_call'] + $updateData['followup'] + $updateData['socmed_inquiry'];
            if ($dailyActivities < 200) {
                $this->session->set_flashdata('message', "Gagal|error|Total aktivitas sangat sedikit, cek lagi!");
                redirect('activity/detail');
            } else {
                if($this->activity->editData($updateData) > 0) {
                    $this->session->set_flashdata('message', "Berhasil|success|Data berhasil diperbaharui!");
                    redirect('activity/detail');
                } else {
                    $this->session->set_flashdata('message', "Gagal|success|Data mungkin ada yang tidak valid!");
                    redirect('activity/detail');
                }
            }
        }
    }


    // public function uploadPricelistExcel()
    // {
    //     if (!empty($_FILES['uploadScheduleFile']['name'])) {
    //         // get file extension
    //         $extension = pathinfo($_FILES['uploadScheduleFile']['name'], PATHINFO_EXTENSION);

    //         if ($extension == 'csv') {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    //         } elseif ($extension == 'xlsx') {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //         } else {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //         }

    //         // file path
    //         $spreadsheet = $reader->load($_FILES['uploadScheduleFile']['tmp_name']);
    //         $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(true, true, true, true, true, true, true, true, true, true, null);

    //         // array Count
    //         $dataUploaded = [];
    //         $numrow = 1;
    //         foreach ($allDataInSheet as $row) {
    //             if ($numrow > 1) {
    //                 $dataUploaded[] = [
    //                     'branch' => strtoupper($this->input->post('uploadScheduleCabang')),
    //                     'notif' => $row['B'],
    //                     'notif_status' => $row['C'],
    //                     'customer_name' => strtoupper($row['D']),
    //                     'customer_address' => strtoupper($row['E']),
    //                     'customer_phone' => $row['F'],
    //                     'model' => strtoupper($row['G']),
    //                     'description' => strtoupper($row['H']),
    //                     'technician' => strtoupper($row['I']),
    //                     'visit_schedule' => $row['J'],
    //                     'remark' => strtoupper($row['K'])
    //                 ];
    //             }
    //             $numrow++;
    //         }

    //         // upload to database
    //         if ($this->schedule->uploadScheduleFromExcel($dataUploaded) > 0) {
    //             $this->session->set_flashdata('message', 'Success|success|Technician visit schedule uploaded!');
    //             redirect('schedule');
    //         }
    //     }
    // }
}
