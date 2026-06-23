<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;

defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Complaint_model', 'complaint');
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        check_access();
        $this->_autoDismissUpdateList();

        $data['title'] = 'Complaint Summary New';
        $data['vuescript'] = 'complaint/complaint_summary';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-new-summary', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get_summary_data()
    {
        // Ambil input ti axios (JSON)
        $input = json_decode(file_get_contents('php://input'), true);
        $startPeriod = $this->input->post('startPeriod') ?? date("Y-m-01", strtotime("-5 months"));
        $endPeriod = $this->input->post('endPeriod') ?? date("Y-m-d");
        $orderBy = $this->input->post('region');
        $underBranch = $this->input->post('underBranch');
        $region = $this->input->post('region');        

        $params = $this->_getParamsComplaintSummaryVue($startPeriod, $endPeriod, $region, $underBranch); // Sesuaikan paramna

        // Kumpulkeun kabéh data kana hiji array
        $resultByCategory = $this->complaint->countClaimByCategoryByParams($params);
        $response = [
            'complaintSummary' => $this->complaint->countClaimByParams($params),
            // 'complaintSummarySubtotal' => $this->complaint->countClaimSubtotalByParams($params),
            'statusDetail' => $this->complaint->countClaimByStatusDetailByParams($params),
            // 'byCategory' => $this->complaint->countClaimByCategory($startPeriod, $endPeriod),
            // 'complaintSummaryByRegion' => $this->complaint->countClaimByRegion($startPeriod, $endPeriod, $params),
            // 'complaintSummaryByBranch' => $this->complaint->countClaimByBranch($startPeriod, $endPeriod, $params),
            // 'complaintSummaryByBranchTransition'=> $this->complaint->countClaimByBranchTransition($params),
            // 'complaintSummaryByBranchName' => $this->complaint->countClaimByBranchName($params),
            'complaintSummaryByBranchGroup' => $this->complaint->countClaimByBranchGroupByParams($params),
            // 'complaintSummarySamedayForward' => $this->complaint->countClaimSamedayForwardByParams($params),
            // 'complaintSummarySamedayForwardSubtotal' => $this->complaint->countClaimSamedayForwardSubtotal($startPeriod, $endPeriod),
            // 'complaintSummaryByStatusDetailSubtotal' => $this->complaint->countClaimByStatusDetailSubtotal($startPeriod, $endPeriod, $params),
            'descriptionByStatusDetail' => $this->complaint->countClaimCategoryByStatusDetailByParams($params),
            'resultByMonth' => $this->complaint->countClaimByCategoryTotalMonth($startPeriod, $endPeriod),
            'resultByCategoryTotalCategory' => $this->complaint->countClaimByCategoryTotalCategory($startPeriod, $endPeriod)
        ];

        $data['tableHeader'] = array_keys($resultByCategory[0]);
        $data['convertData'] = [];

        if (count($resultByCategory) <= 10) {
            for($i = 0; $i < count($resultByCategory); $i++) {
                $subtotalByCategory = 0;
                if (strtoupper($resultByCategory[$i]['claim_description']) !== 'MINTA PERBAIKAN CEPAT' && strtoupper($resultByCategory[$i]['claim_description']) !== 'INFORMASI PERBAIKAN') {
                    for ($j = 0; $j < count($resultByCategory[$i]); $j++) {
                        $data['convertData'][$i][$data['tableHeader'][$j]] = $resultByCategory[$i][$data['tableHeader'][$j]];
                        $subtotalByCategory += (int)$resultByCategory[$i][$data['tableHeader'][$j]];
                    }
                }
                $data['convertData'][$i]['ttl_bycategory'] = $subtotalByCategory;
            }            
        } else {
            for($i = 0; $i < 11; $i++) {
                $subtotalByCategory = 0;
                if (strtoupper($resultByCategory[$i]['claim_description']) !== 'MINTA PERBAIKAN CEPAT' && strtoupper($resultByCategory[$i]['claim_description']) !== 'INFORMASI PERBAIKAN') {
                    for ($j = 0; $j < count($resultByCategory[$i]); $j++) {
                        $data['convertData'][$i][$data['tableHeader'][$j]] = $resultByCategory[$i][$data['tableHeader'][$j]];
                        $subtotalByCategory += (int)$resultByCategory[$i][$data['tableHeader'][$j]];
                    }
                }
                $data['convertData'][$i]['ttl_bycategory'] = $subtotalByCategory;
            }
        }

        $response = [
            'tableHeader' => $data['tableHeader'],
            'convertData' => $data['convertData'],
            'cekParam' => $params,
            'transition' => $response['complaintSummary'],
            'statusDetail' => $response['statusDetail'],
            'descriptionByStatusDetail' => $response['descriptionByStatusDetail'],
            'byRegionBranch' => $response['complaintSummaryByBranchGroup'],
        ];
        
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function summary()
    {
        check_access();
        $this->_autoDismissUpdateList();
        $data['title'] = 'Summary Keluhan Konsumen';
        $data['vuescript'] = 'complaint/complaint_index';

        //$this->form_validation->set_rules();
        if (!$this->input->post('complaintSummaryStartPeriod')) {
            $startPeriod = date("Y-m-01", strtotime("-5 months"));
            $endPeriod = date("Y-m-d");
        } else {
            $startPeriod = date("Y-m-d", strtotime($this->input->post('complaintSummaryStartPeriod')));
            $endPeriod = date("Y-m-d", strtotime($this->input->post('complaintSummaryEndPeriod')));
        }

        $params = $this->_getParamsComplaintSummary();
        $data['params'] = $params;
        $data['complaintSummary'] = $this->complaint->countClaim($startPeriod, $endPeriod, $params);
        $data['complaintSummarySubtotal'] = $this->complaint->countClaimSubtotal($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByRegion'] = $this->complaint->countClaimByRegion($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByBranch'] = $this->complaint->countClaimByBranch($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByBranchTransition'] = $this->complaint->countClaimByBranchTransition($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByBranchName'] = $this->complaint->countClaimByBranchName($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByBranchGroup'] = $this->complaint->countClaimByBranchGroup($startPeriod, $endPeriod, $params);
        $data['complaintSummarySamedayForward'] = $this->complaint->countClaimSamedayForward($startPeriod, $endPeriod);
        $data['complaintSummarySamedayForwardSubtotal'] = $this->complaint->countClaimSamedayForwardSubtotal($startPeriod, $endPeriod);
        $data['complaintSummaryByStatusDetail'] = $this->complaint->countClaimByStatusDetail($startPeriod, $endPeriod, $params);
        $data['complaintSummaryByStatusDetailSubtotal'] = $this->complaint->countClaimByStatusDetailSubtotal($startPeriod, $endPeriod, $params);
        $data['complaintSummaryCategoryByStatusDetail'] = $this->complaint->countClaimCategoryByStatusDetail($startPeriod, $endPeriod, $params);
        
        $resultByMonth = $this->complaint->countClaimByCategoryTotalMonth($startPeriod, $endPeriod);
        $resultByCategoryTotalCategory = $this->complaint->countClaimByCategoryTotalCategory($startPeriod, $endPeriod);
        $resultByCategory = $this->complaint->countClaimByCategory($startPeriod, $endPeriod);
        
        $data['tableHeader'] = array_keys($resultByCategory[0]);
        $data['convertData'] = [];

        if (count($resultByCategory) <= 10) {
            for($i = 0; $i < count($resultByCategory); $i++) {
                $subtotalByCategory = 0;
                if (strtoupper($resultByCategory[$i]['claim_description']) !== 'MINTA PERBAIKAN CEPAT' && strtoupper($resultByCategory[$i]['claim_description']) !== 'INFORMASI PERBAIKAN') {
                    for ($j = 0; $j < count($resultByCategory[$i]); $j++) {
                        $data['convertData'][$i][$data['tableHeader'][$j]] = $resultByCategory[$i][$data['tableHeader'][$j]];
                        $subtotalByCategory += (int)$resultByCategory[$i][$data['tableHeader'][$j]];
                    }
                }
                $data['convertData'][$i]['ttl_bycategory'] = $subtotalByCategory;
            }            
        } else {
            for($i = 0; $i < 11; $i++) {
                $subtotalByCategory = 0;
                if (strtoupper($resultByCategory[$i]['claim_description']) !== 'MINTA PERBAIKAN CEPAT' && strtoupper($resultByCategory[$i]['claim_description']) !== 'INFORMASI PERBAIKAN') {
                    for ($j = 0; $j < count($resultByCategory[$i]); $j++) {
                        $data['convertData'][$i][$data['tableHeader'][$j]] = $resultByCategory[$i][$data['tableHeader'][$j]];
                        $subtotalByCategory += (int)$resultByCategory[$i][$data['tableHeader'][$j]];
                    }
                }
                $data['convertData'][$i]['ttl_bycategory'] = $subtotalByCategory;
            }
        }

        $data['totalByMonth'] = [];
        for ($i = 1; $i <count($data['tableHeader']); $i++) {
            $j = $i - 1;
            $data['totalByMonth'][$data['tableHeader'][$i]] = $resultByMonth[$j]['qty'];
        }

        $keys = array_column($data['convertData'], 'ttl_bycategory');
        array_multisort(array_column($data['convertData'], 'ttl_bycategory'), SORT_DESC, $data['convertData']) ;

        // for transition chart
        $dailyComplaint = $this->complaint->countClaimByDay($startPeriod, $endPeriod);
        $dailyTransition = [];

        foreach ($dailyComplaint as $row) {
            $dailyTransition['complaint'][] = $row['complaint'];
            $dailyTransition['date'][] = date("d-M", strtotime($row['date']));
        }
        $data['dailyComplaint'] = json_encode($dailyTransition);
        
        // var_dump($data['complaintSummary']);die;
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-summary', $data);
        $this->load->view('templates/footer', $data);
    }

    public function list()
    {
        check_access();
        $this->_autoDismissUpdateList();
        $data['title'] = 'Data Keluhan Konsumen';

        $params = $this->_getParamsComplaintList();
        // $data['complaintData'] = $this->complaint->getComplaintByPeriod($params);
        // $data['totalComplaintData'] = count($data['complaintData']);
        $data['params'] = $params;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get_complaint_list_ajax()
    {
        // allow delete button
        $allowedDeleteButton = ['1', '9'];
        $accesslevel = $this->session->userdata('useraccess');

        // 1. Ambil input ti DataTables (kaasup filter custom)
        $paramsItems = [
            'startPeriod'  => $this->input->post('startPeriod'),
            'endPeriod'    => $this->input->post('endPeriod'),
            'regional'     => $this->input->post('regional'),
            'under_branch' => $this->input->post('under_branch'),
            'status'       => $this->input->post('status'),
            'order_by'       => $this->input->post('orderby'),
            'order_type'       => $this->input->post('ordertype')
        ];
        $params = $this->_getParamsComplaintList($paramsItems);
        // $params = $this->_getParamsComplaintList();

        $search = trim($this->input->post("search")['value']);
        $start  = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        // 2. Tarik data ti Model
        $list = $this->complaint->get_datatables($params, $start, $length, $search);
        $data = [];
        $no = $start + 1;

        foreach ($list as $row) {
            $td = [];

            // Kolom 1: No
            $td[] = "<small>" . $no++ . "</small>";

            // Kolom 2: Date & Source
            $td[] = "<small>" . date("d-M", strtotime($row['claim_date'])) . "</small><br>
                     <small class='text-muted'>[" . $row['claim_source'] . "]</small>";

            // Kolom 3: TAT
            $td[] = $this->_stringTat($row['claim_tatclosed'], $row['claim_tat']) . " / " . 
                    $this->_stringTat($row['notif_tatclosed'], $row['notif_tat']);

            // Kolom 4: Description & Parts
            $td[] = $row['claim_description'] . "<br>
                     <small class='text-muted'>" . $row['part1_code'] . "</small><br>
                     <small class='text-muted'>" . $row['part2_code'] . "</small><br>
                     <small class='text-muted'>" . $row['part3_code'] . "</small>";

            // Kolom 5: Customer
            $td[] = $row['customer_name'] . "<br>
                     <small class='text-muted'>" . substr($row['customer_phone'], 0, 13) . " ...</small>";

            // Kolom 6: Notification & Model
            $responseInfo = "";
            if(strtolower($row['claim_status']) != '50') {
                $responseInfo = '<span class="requestInfoSign" data-by="'.$row['responsed_by'].' - '.date("d-M", strtotime($row['responsed_at'])).'" data-message="'.$row['response_request'].'" data-notif="'.$row['notification'].'">'. $this->_responseRequest($row['response_request']).'</span>';
            }
            $td[] = $row['notification'] . "<br><small>" . $row['model'] . "</small><br><small>" . $row['product_category'] . "</small>" . $responseInfo;

            // Kolom 7: Detail
            $td[] = substr($row['claim_detail'], 0, 80) . " ...";

            // Kolom 8: Progress
            $td[] = $this->_progressToArray($row['progress']);

            // Kolom 9: PIC & Response
            $td[] = $this->_cekNullPicReport($row['pic_report_1'], $row['pic_report_2']) . 
                    "<p>" . $this->_isresponsedBranch($row['isresponsed_branch']) . " " . $this->_isresponsedSass($row['isresponsed_sass']) . " " . $this->_isresponsedSasshq($row['isresponsed_sasshq']) . " " . $this->_isresponsedPart($row['isresponsed_part']) . "</p>";

            // Kolom 10: Status
            $td[] = $this->_statusToBadge($row['claim_status']) . "<br><span class='badge badge-info font-weight-normal' title='".$row['status_desc']."'>" . $row['claim_status'] . "</span>";

            // delete button by access level
            $deleteButton = (in_array($accesslevel, $allowedDeleteButton)) ? 
                '<tr class="border-top">
                    <td colspan="2"><a href="'.base_url('complaint/delete/'.$row['id']).'" class="text-danger"><i class="fas fa-trash"></i> Delete Data</a></td>
                </tr>' : '';

            // edit button by access level
            $editButton = (in_array($accesslevel, $allowedDeleteButton)) ? 
                '<a href="'.base_url('complaint/edit/'.$row['id']).'" class="text-primary" target="_blank"><i class="far fa-edit"></i> Edit Data</a>' : '';
            
            // Kolom 11: Action (Dropdown bars)
            $td[] = '<div>
                        <a href="'.base_url('complaint/view/'.$row['id']).'" target="_blank"><i class="fas fa-search"></i></a>
                     </div>
                     <div class="btn-group">
                        <i class="fas fa-bars" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                        <div class="dropdown-menu dropdown-menu-right p-2" style="min-width: 390px;">
                            <table class="table table-sm table-borderless table-hover mb-0">
                                <tr><td>Reservasi part</td><td>: '.$row['part_reservation'].'</td></tr>
                                <tr><td>Under cabang</td><td>: '.$row['under_branch'].'</td></tr>
                                <tr><td>Regional area</td><td>: '.$row['regional_area'].'</td></tr>
                                <tr><td>Agent penerima</td><td>: '.$row['agent'].'</td></tr>
                                <tr class="border-top"><td>Disimpan oleh</td><td>: '.$row['saved_by'].'</td></tr>
                                <tr><td>Disimpan pada</td><td>: '. $this->_toStringDatetime($row['saved_at']).'</td></tr>
                                <tr class="border-top">
                                    <td colspan="2">
                                        <a href="'.base_url('complaint/view/'.$row['id']).'" class="text-primary mr-5" target="_blank"><i class="fas fa-search"></i> View Detail</a>'
                                        . $editButton . 
                                    '</td>
                                </tr>' . $deleteButton .
                            '</table>
                        </div>
                     </div>';

            // 3. Tambahkeun Class Row (warna merah/kuning)
            $td['DT_RowClass'] = $this->_isurgentToStyle($row['is_urgent'], $row['claim_status'], $row['claim_description']);

            $data[] = $td;
        }

        $output = [
            "draw"            => intval($this->input->post("draw")),
            "recordsTotal"    => $this->complaint->count_all($params),
            "recordsFiltered" => $this->complaint->count_filtered($params, $search),
            "data"            => $data,
            "csrf_hash"       => $this->security->get_csrf_hash()
        ];
        if (ob_get_contents()) ob_clean(); 
        
        header('Content-Type: application/json');
        echo json_encode($output);
        exit;
    }

    public function listToExcel()
    {
        $paramsItems = [
            'startPeriod'  => $this->input->post('complaintListFilterStartPeriod'),
            'endPeriod'    => $this->input->post('complaintListFilterEndPeriod'),
            'regional'     => $this->input->post('complaintListFilterRegional'),
            'under_branch' => $this->input->post('complaintListFilterUnderBranch'),
            'status'       => $this->input->post('complaintListFilterStatus'),
            'order_by'     => $this->input->post('complaintListFilterOrderby'),
            'order_type'   => $this->input->post('complaintListFilterOrdertype')
        ];
        $params = $this->_getParamsComplaintToExcel($paramsItems);
        $result = $this->complaint->getComplaintByPeriod($params);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //$sheet->mergeCells('A1:S1');
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setSize(14);
        $sheet->setCellValue('A1', 'DATA KELUHAN KONSUMEN');
        // $sheet->mergeCells('A2:W2');
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('B')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
        $subtitle = 'Periode : ' . date("d M Y", strtotime($params['startPeriod'])) . ' - ' . date("d M Y", strtotime($params['endPeriod']));

        $excelCols = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ'];

        $sheet->setCellValue('A2', $subtitle);
        $sheet->setCellValue($excelCols[0] . '4', 'No');
        $sheet->setCellValue($excelCols[1] . '4', 'Bulan');
        $sheet->setCellValue($excelCols[2] . '4', 'Tanggal');
        $sheet->setCellValue($excelCols[3] . '4', 'Kategori');
        $sheet->setCellValue($excelCols[4] . '4', 'Source');
        $sheet->setCellValue($excelCols[5] . '4', 'Regional area');
        $sheet->setCellValue($excelCols[6] . '4', 'Under Branch');
        $sheet->setCellValue($excelCols[7] . '4', 'PIC Report');
        $sheet->setCellValue($excelCols[8] . '4', 'Jenis Keluhan');
        $sheet->setCellValue($excelCols[9] . '4', 'Root Cause');
        $sheet->setCellValue($excelCols[10] . '4', 'Countermeasure');
        $sheet->setCellValue($excelCols[11] . '4', 'Notif');
        $sheet->setCellValue($excelCols[12] . '4', 'Nama Konsumen');
        $sheet->setCellValue($excelCols[13] . '4', 'Telepon');
        $sheet->setCellValue($excelCols[14] . '4', 'Kategori Produk');
        $sheet->setCellValue($excelCols[15] . '4', 'Model');
        $sheet->setCellValue($excelCols[16] . '4', 'No Reservasi');
        $sheet->setCellValue($excelCols[17] . '4', 'Jenis Part');
        $sheet->setCellValue($excelCols[18] . '4', 'Kode Part');
        $sheet->setCellValue($excelCols[19] . '4', 'Detail Keluhan');
        $sheet->setCellValue($excelCols[20] . '4', 'Action Report');
        $sheet->setCellValue($excelCols[21] . '4', 'Status');
        $sheet->setCellValue($excelCols[22] . '4', 'Deskripsi Status');
        $sheet->setCellValue($excelCols[23] . '4', 'Status Final');
        $sheet->setCellValue($excelCols[24] . '4', 'Notif Date');
        $sheet->setCellValue($excelCols[25] . '4', 'Urgent?');
        $sheet->setCellValue($excelCols[26] . '4', 'Diajuken close');
        $sheet->setCellValue($excelCols[27] . '4', 'Respon');
        $sheet->setCellValue($excelCols[28] . '4', 'Tgl Forward');
        $sheet->setCellValue($excelCols[29] . '4', 'Tgl Close');
        $sheet->setCellValue($excelCols[30] . '4', 'TAT Keluhan (hari)');
        $sheet->setCellValue($excelCols[31] . '4', 'TAT Notif (hari)');
        $sheet->setCellValue($excelCols[32] . '4', 'Resp. Branch');
        $sheet->setCellValue($excelCols[33] . '4', 'Resp. HQ SASS');
        $sheet->setCellValue($excelCols[34] . '4', 'Resp. Part');
        $sheet->setCellValue($excelCols[35] . '4', 'Resp. SASS');
        $sheet->getStyle('A4:AJ4')->getFont()->setBold(TRUE);

        $rowCount = 5;
        $rowNumber = 1;
        $spreadsheet->getActiveSheet()->getStyle('L' . $rowCount)->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A:AH')->getAlignment()->setHorizontal('left');
        foreach ($result as $row) {
            $sheet->setCellValue($excelCols[0] . $rowCount, $rowNumber++);
            // $sheet->setCellValue($excelCols[1] . $rowCount, date("M-Y", strtotime($row['claim_date'])));
            $sheet->setCellValue($excelCols[1] . $rowCount, Date::PHPToExcel(new Datetime(date("Y-m-01", strtotime($row['claim_date'])))));
            $sheet->getStyle($excelCols[1] . $rowCount)
                ->getNumberFormat()
                ->setFormatCode('mmm yyyy');
            $sheet->setCellValue($excelCols[2] . $rowCount, Date::PHPToExcel(new Datetime($row['claim_date'])));
            $sheet->getStyle($excelCols[2] . $rowCount)
                ->getNumberFormat()
                ->setFormatCode('dd-mmm-yyyy');
            $sheet->setCellValue($excelCols[3] . $rowCount, $row['claim_category']);
            $sheet->setCellValue($excelCols[4] . $rowCount, $row['claim_source']);
            $sheet->setCellValue($excelCols[5] . $rowCount, $row['regional_area']);
            $sheet->setCellValue($excelCols[6] . $rowCount, $row['under_branch']);
            $sheet->setCellValue($excelCols[7] . $rowCount, $this->_cekPicReport($row['pic_report_1'], $row['pic_report_2']));
            $sheet->setCellValue($excelCols[8] . $rowCount, $row['claim_description']);
            $sheet->setCellValue($excelCols[9] . $rowCount, $row['rootcause']);
            $sheet->setCellValue($excelCols[10] . $rowCount, $row['countermeasure']);
            $sheet->setCellValue($excelCols[11] . $rowCount, $row['notification']);
            $sheet->setCellValue($excelCols[12] . $rowCount, $row['customer_name']);
            $sheet->setCellValue($excelCols[13] . $rowCount, $row['customer_phone']);
            $sheet->setCellValue($excelCols[14] . $rowCount, $row['product_category']);
            $sheet->setCellValue($excelCols[15] . $rowCount, $row['model']);
            $sheet->setCellValue($excelCols[16] . $rowCount, $row['part_reservation']);
            $sheet->setCellValue($excelCols[17] . $rowCount, $this->_partsTypeToArray($row));
            $sheet->setCellValue($excelCols[18] . $rowCount, $this->_partsCodeToArray($row));
            $sheet->setCellValue($excelCols[19] . $rowCount, $row['claim_detail']);
            $sheet->setCellValue($excelCols[20] . $rowCount, strip_tags(str_replace('<br>', "\n", $this->_progressToArray($row['progress']))));
            $sheet->setCellValue($excelCols[21] . $rowCount, $row['claim_status']);
            $sheet->setCellValue($excelCols[22] . $rowCount, $row['status_desc']);
            $sheet->setCellValue($excelCols[23] . $rowCount, $row['status_group']);
            $sheet->setCellValue($excelCols[24] . $rowCount, Date::PHPToExcel(new Datetime($row['notif_date'])));
            $sheet->getStyle($excelCols[24] . $rowCount)
                ->getNumberFormat()
                ->setFormatCode('dd-mmm-yyyy');
            $sheet->setCellValue($excelCols[25] . $rowCount, $row['is_urgent'] == 1 ? "Yes" : "-");
            $sheet->setCellValue($excelCols[26] . $rowCount, $row['propose_close_at']);
            $sheet->setCellValue($excelCols[27] . $rowCount, $row['response_request']);
            $sheet->setCellValue($excelCols[28] . $rowCount, Date::PHPToExcel(new Datetime($row['forwarded_date'])));
            $sheet->getStyle($excelCols[28] . $rowCount)
                ->getNumberFormat()
                ->setFormatCode('dd-mmm-yyyy');
            $sheet->setCellValue($excelCols[29] . $rowCount, Date::PHPToExcel(new Datetime(date("Y-m-d", strtotime($row['closed_on'])))));
            $sheet->getStyle($excelCols[29] . $rowCount)
                ->getNumberFormat()
                ->setFormatCode('dd-mmm-yyyy');
            $sheet->setCellValue($excelCols[30] . $rowCount, $this->_stringTat($row['claim_tatclosed'], $row['claim_tat']));
            $sheet->setCellValue($excelCols[31] . $rowCount, $this->_stringTat($row['notif_tatclosed'], $row['notif_tat']));
            $sheet->setCellValue($excelCols[32] . $rowCount, $this->_boolToState($row['isresponsed_branch']));
            $sheet->setCellValue($excelCols[33] . $rowCount, $this->_boolToState($row['isresponsed_sasshq']));
            $sheet->setCellValue($excelCols[34] . $rowCount, $this->_boolToState($row['isresponsed_part']));
            $sheet->setCellValue($excelCols[35] . $rowCount, $this->_boolToState($row['isresponsed_sass']));
            $rowCount++;
        }

        $sheet->getColumnDimension($excelCols[0])->setWidth(5);
        $sheet->getColumnDimension($excelCols[1])->setWidth(10);
        $sheet->getColumnDimension($excelCols[2])->setWidth(15);
        $sheet->getColumnDimension($excelCols[3])->setWidth(15);
        $sheet->getColumnDimension($excelCols[4])->setWidth(15);
        $sheet->getColumnDimension($excelCols[5])->setWidth(20);
        $sheet->getColumnDimension($excelCols[6])->setWidth(15);
        $sheet->getColumnDimension($excelCols[7])->setWidth(30);
        $sheet->getColumnDimension($excelCols[8])->setWidth(25);
        $sheet->getColumnDimension($excelCols[9])->setWidth(20);
        $sheet->getColumnDimension($excelCols[10])->setWidth(20);
        $sheet->getColumnDimension($excelCols[11])->setWidth(15);
        $sheet->getColumnDimension($excelCols[12])->setWidth(20);
        $sheet->getColumnDimension($excelCols[13])->setWidth(18);
        $sheet->getColumnDimension($excelCols[14])->setWidth(18);
        $sheet->getColumnDimension($excelCols[15])->setWidth(15);
        $sheet->getColumnDimension($excelCols[16])->setWidth(15);
        $sheet->getColumnDimension($excelCols[17])->setWidth(20);
        $sheet->getColumnDimension($excelCols[18])->setWidth(30);
        $sheet->getColumnDimension($excelCols[19])->setWidth(60);
        $sheet->getColumnDimension($excelCols[20])->setWidth(60);
        $sheet->getColumnDimension($excelCols[21])->setWidth(7);
        $sheet->getColumnDimension($excelCols[22])->setWidth(30);
        $sheet->getColumnDimension($excelCols[23])->setWidth(12);
        $sheet->getColumnDimension($excelCols[24])->setWidth(12);
        $sheet->getColumnDimension($excelCols[25])->setWidth(7);
        $sheet->getColumnDimension($excelCols[26])->setWidth(17);
        $sheet->getColumnDimension($excelCols[27])->setWidth(20);
        $sheet->getColumnDimension($excelCols[28])->setWidth(12);
        $sheet->getColumnDimension($excelCols[29])->setWidth(12);
        $sheet->getColumnDimension($excelCols[30])->setWidth(10);
        $sheet->getColumnDimension($excelCols[31])->setWidth(10);
        $sheet->getColumnDimension($excelCols[32])->setWidth(10);
        $sheet->getColumnDimension($excelCols[33])->setWidth(10);
        $sheet->getColumnDimension($excelCols[34])->setWidth(10);
        $sheet->getColumnDimension($excelCols[35])->setWidth(10);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        ob_end_clean();
        $fileName = 'Data Keluhan ' . date("d M Y", strtotime($params['startPeriod'])) . ' - ' . date("d M Y", strtotime($params['endPeriod'])) . '.xlsx';

        $sheet->setTitle("Keluhan Konsumen");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename= . $fileName"); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function latestoutstandingdate()
    {
        $params = $this->_getParamsComplaintList();
        $limitDate = '2023-10-01';
        echo json_encode($this->complaint->getOutstandingFirstDate($params, $limitDate));
    }

    private function _responseToText($by, $at, $text)
    {
        $output = '';
        if ($text == 0 || $text == NULL) {
            $output = '';
        } else if ($text == 1) {
            $output = '[' . $by . ' - ' . $this->_dateToString($at) . ']';
        } else {
            $output = '[' . $by . ' - ' . $this->_dateToString($at) . ']"\n"' . $text;
        }
        return $output;
    }

    private function _dateToString($date)
    {
        if ($date == 0 || $date == NULL) {
            return '';
        } else {
            return date("d-M-Y H:i", strtotime($date));
        }
    }

    private function _dateString($date)
    {
        if ($date == 0 || $date == NULL) {
            return '';
        } else {
            return date("d-M-Y", strtotime($date));
        }
    }

    private function _stringTat($closeat, $tat)
    {
        if ($closeat == NULL) {
            return $tat;
        } else {
            return $closeat;
        }
    }

    private function _cekPicReport($pic1, $pic2)
    {
        if ($pic2 == NULL || $pic2 == '') {
            return $pic1;
        } else {
            return $pic1 . ' - ' . $pic2;
        }
    }

    private function _boolToState($st)
    {
        if ($st == 0) {
            return '-';
        } else {
            return 'Yes';
        }
    }

    private function _statusToBadge($status)
    {
        $closed = ['50', 'Case Closed', 'Case Close', 'Case closed', 'Case close', 'case closed', 'case close'];
        $new = ['10', 'new', 'New'];

        if (in_array($status, $closed)) {
            // return '<button class="btn badge badge-success badge-pill">Closed</button>';
            return '<span class="badge badge-success badge-pill px-1 py-1">Closed</span>';
        } elseif (in_array($status, $new)) {
            return '<span class="badge badge-warning badge-pill px-2 py-1">New</span>';
        } else {
            // return '<button class="badge badgege badge-warning badge-pill">Progress</button>';
            return '<span class="badge badge-danger badge-pill px-1 py-1">Progress</span>';
        }
    }

    private function _isurgentToStyle($isurgent, $status, $desc)
    {
        $closed = ['Case Closed', 'Case Close', 'Case closed', 'Case close', 'case closed', 'case close'];
        if (in_array($status, $closed)) {
            return 'text-secondary';
        } else if ($isurgent == 1 && !in_array($status, $closed)) {
            return 'text-danger';
        } else if (strtolower($desc) == 'minta perbaikan cepat' || strtolower($desc) == 'informasi perbaikan') {
            return 'text-purple';
        } else {
            return '';
        }
    }

    private function _progressToArray($data)
    {
        $progressList = '';
        $arr = explode('#', $data);

        if (count($arr) < 2) {
            if (strlen($arr[0]) < 1) {
                return '-';
            } else {
                $abs = explode('|', $arr[0]);
                $progressList = '<span class="badge badge-secondary">' . $abs[0] . '</span>' . ' <small>[' . date("d-M-Y H:i", strtotime($abs[1])) . ']</small><br>' . $abs[2];
                return $progressList;
            }
        } else {
            $progressList = '';
            for ($i = 0; $i < count($arr); $i++) {
                $abs = explode('|', $arr[$i]);
                $prog = '<span class="badge badge-secondary">' . $abs[0] . '</span>' . ' <small>[' . date("d-M-Y H:i", strtotime($abs[1])) . ']</small><br>' . $abs[2] . '<br><br>';
                $progressList  = $progressList . $prog;
            }
            return $progressList;
        }
    }

    private function _progressToArrayFullText($access, $data, $progressId)
    {
        $allowedAccessEdit = [1, 9];
        $editButton = '';
        $deleteButton = '';
        $arr = explode('#', $data);

        if (count($arr) < 2) {
            if (strlen($arr[0]) < 1) {
                return '-';
            } else {
                $abs = explode('|', $arr[0]);
                if (in_array($access, $allowedAccessEdit)) {
                    $editButton =  ' <a href="#" class="buttonEditProgressComplaint" data-toggle="modal" data-target="#editComplaintDetailUpdateForm" data-id="' . $abs[0] . '"><i class="fas fa-edit"></i></a>';
                    $deleteButton =  ' <a href="#" class="buttonDeleteProgressComplaint text-danger" data-id="' . $abs[0] . '"><i class="fas fa-trash-alt"></i></a>';
                }
                $progressList = '<small><span class="badge badge-info mr-1">' . $abs[1] . '</span><span class="badge badge-warning badge-pill mr-1">' . $abs[5] . '</span><span class="text-info">' . date("d-M-Y H:i", strtotime($abs[2])) . ' | ' . $deleteButton . ' | ' . $editButton . ' </small></span><br><p>' . $abs[3] . showImage($abs[4]) . '</p>';
                return $progressList;
            }
        } else {
            $progressList = '';
            for ($i = 0; $i < count($arr); $i++) {
                $abs = explode('|', $arr[$i]);
                if (in_array($access, $allowedAccessEdit)) {
                    $editButton =  ' <a href="#" class="buttonEditProgressComplaint" data-toggle="modal" data-target="#editComplaintDetailUpdateForm" data-id="' . $abs[0] . '"><i class="fas fa-edit"></i></a>';
                    $deleteButton =  ' <a href="#" class="buttonDeleteProgressComplaint text-danger" data-id="' . $abs[0] . '"><i class="fas fa-trash-alt"></i></a>';
                };
                $prog = '<small><span class="badge badge-info mr-1">' . $abs[1] . '</span><span class="badge badge-warning badge-pill mr-1">' . $abs[5] . '</span><span class="text-info">' . date("d-M-Y H:i", strtotime($abs[2])) . ' | ' . $deleteButton . ' | ' .  $editButton . '</small></span><br><p>' . $abs[3] . showImage($abs[4]) . '</p>';
                $progressList  = $progressList . $prog;
            }
            return $progressList;
        }
    }

    private function _cekNullPicReport($pic1, $pic2)
    {
        if (is_null($pic2) || $pic2 == NULL || $pic2 == 'NULL') {
            $out = $pic1;
        } else {
            $out = $pic1 . ' - ' . $pic2;
        }
        return $out;
    }

    private function _integerToSentStatus($state)
    {
        if ($state == 0) {
            return '<span class="btn badge badge-danger">Unsent</span>';
        } else {
            return '';
        }
    }

    private function _isresponsedBranch($st)
    {
        if ($st == 0) {
            return '';
        } else {
            // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Br</small></span>';
            return '<span class="badge badge-success badge-pill">Br</span>';
        }
    }

    private function _isresponsedSass($st)
    {
        if ($st == 0) {
            return '';
        } else {
            // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Sa</small></span>';
            return '<span class="badge badge-success badge-pill">Sa</span>';
        }
    }


    private function _isresponsedSasshq($st)
    {
        if ($st == 0) {
            return '';
        } else {
            // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Pa</small></span>';
            return '<span class="badge badge-success badge-pill">SQ</span>';
        }
    }

    private function _isresponsedPart($st)
    {
        if ($st == 0) {
            return '';
        } else {
            // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Pa</small></span>';
            return '<span class="badge badge-success badge-pill">Pc</span>';
        }
    }

    private function _isresponsedToCheckbox($st)
    {
        if ($st == 0) {
            return '';
        } else {
            return 'checked';
        }
    }

    private function _toStringDatetime($date)
    {
        if (strtotime($date) < 0 || $date == '-' || $date == '') {
            return '-';
        } else {
            return date("d M Y H:i", strtotime($date));
        }
    }

    private function _responseRequest($message)
    {
        $text = '<br><span class="badge bg-info" style="cursor: pointer" title="' . strip_tags($message) . '">Respon</span>';
        if ($message == NULL || $message == '') {
            return;
        } else {
            return $text;
        }
    }

    private function _responseRequestToText($response)
    {
        if ($response == NULL || $response = '') {
            return;
        } else {
            $text = '<div class="form-row">
                        <div class="form-group col-md-12 mb-4">
                            <label for="viewComplaintDetailResponseRequest" class="text-bold">Catatan (request close)</label>
                            <div type="" class="border p-2 rounded" id="viewComplaintDetailResponseRequest" name="viewComplaintDetailResponseRequest" style="background-color: #e9ecef;"> ' . $response . '</div>
                        </div>
                    </div>';
            return $text;
        }
    }

    private function _partsCodeToArray($data)
    {
        $partsStatus = $this->_partcodeToFirstString($data['part1_code'], $data['part1_isready']) . $this->_partcodeToString($data['part2_code'], $data['part2_isready']) . $this->_partcodeToString($data['part3_code'], $data['part3_isready']) . $this->_partcodeToString($data['part4_code'], $data['part4_isready']) . $this->_partcodeToString($data['part5_code'], $data['part5_isready']) . $this->_partcodeToString($data['part6_code'], $data['part6_isready']);
        
        return $partsStatus;
    }

    private function _partsTypeToArray($data)
    {
        $partsStatus = $this->_parttypeToFirstString($data['part1_type'], $data['part1_isready']) . $this->_parttypeToString($data['part2_type'], $data['part2_isready']) . $this->_parttypeToString($data['part3_type'], $data['part3_isready']) . $this->_parttypeToString($data['part4_type'], $data['part4_isready']) . $this->_parttypeToString($data['part5_type'], $data['part5_isready']) . $this->_parttypeToString($data['part6_type'], $data['part6_isready']);
        
        return $partsStatus;
    }

    private function _partcodeToFirstString($typeCode, $isready)
    {
        $outputString = '';
        if ($typeCode == '') {
            $outputString = '';
        } else {
            if ($isready == 0) {
                $outputString = $typeCode . ' (kosong)';
            } else {
                $outputString = $typeCode . ' (ready)';
            }
        }
        return $outputString;
    }

    private function _partcodeToString($typeCode, $isready)
    {
        $outputString = '';
        if ($typeCode == '') {
            $outputString = '';
        } else {
            if ($isready == 0) {
                $outputString = ", \n" . $typeCode . ' (kosong)';
            } else {
                $outputString = ", \n" . $typeCode . ' (ready)';
            }
        }
        return $outputString;
    }

    private function _parttypeToFirstString($type, $isready)
    {
        $outputString = '';
        if ($type == '') {
            $outputString = '';
        } else {
            $outputString = $type;
        }
        return $outputString;
    }

    private function _parttypeToString($type, $isready)
    {
        $outputString = '';
        if ($type == '') {
            $outputString = '';
        } else {
            $outputString = ", \n" . $type;
        }
        return $outputString;
    }

    private function _getParamsComplaintList($arrItems = null)
    {
        if (is_null($arrItems)) {
            $useraccess = $this->session->userdata('useraccess');
            if ($useraccess == '3' || $useraccess == '4') {
                $filterRegional = $this->_regionalByBranchSlim($this->session->userdata('areascope'));
                $underBranch = $this->session->userdata('areascope');
                $underBranchList = '';
                $filterPicReport1 = '';
            } else if ($useraccess == '5') {
                $filterRegional = $this->session->userdata('areascope');
                $underBranch = '';
                $underBranchList = $this->complaint->getBranchListByRegional($filterRegional);
                $filterPicReport1 = '';
            } else if ($useraccess == '6') {
                $filterRegional = '';
                $underBranch = '';
                $underBranchList = '';
                $filterPicReport1 = 'Part Center';
            } else {
                $filterRegional = '';
                $filterPicReport1 = null;
                $underBranchList = '';
                $underBranch = '';
            }

            $params = [
                'startPeriod' => date("Y-m-01"),
                'endPeriod' => date("Y-m-d"),
                'under_branch' => $underBranch,
                'under_branch_list' => $underBranchList,
                'regional' => $filterRegional,
                'picReport' => $filterPicReport1,
                'status' => "(complaint_list.claim_status NOT LIKE 50)",
                'order_by' => $this->input->post('complaintListFilterOrderby'),
                'order_type' => $this->input->post('complaintListFilterOrdertype')
            ];
        } else {
            if (strtolower($arrItems['status']) == 'case closed') {
                $status = "complaint_list.claim_status = 50";
            } else if (strtolower($arrItems['status']) == 'in progress & new') {
                $status = "complaint_list.claim_status NOT LIKE 50";
            } else {
                $status = "complaint_list.claim_status LIKE '%%'";
                //$status = '';
            }

            $params = [
                'startPeriod' => $arrItems['startPeriod'],
                'endPeriod' => $arrItems['endPeriod'],
                'under_branch' => $this->input->post('under_branch'),
                'regional' => $this->input->post('regional'),
                'picReport' => '',
                'status' => $status,
                'order_by' => $this->input->post('orderby'),
                'order_type' => $this->input->post('ordertype')
            ];
        }
        return $params;
    }

    private function _getParamsComplaintToExcel($arrItems = null)
    {
        if (is_null($arrItems)) {
            $useraccess = $this->session->userdata('useraccess');
            if ($useraccess == '3' || $useraccess == '4') {
                $filterRegional = $this->_regionalByBranchSlim($this->session->userdata('areascope'));
                $underBranch = $this->session->userdata('areascope');
                $underBranchList = '';
                $filterPicReport1 = '';
            } else if ($useraccess == '5') {
                $filterRegional = $this->session->userdata('areascope');
                $underBranch = '';
                $underBranchList = $this->complaint->getBranchListByRegional($filterRegional);
                $filterPicReport1 = '';
            } else if ($useraccess == '6') {
                $filterRegional = '';
                $underBranch = '';
                $underBranchList = '';
                $filterPicReport1 = 'Part Center';
            } else {
                $filterRegional = '';
                $filterPicReport1 = null;
                $underBranchList = '';
                $underBranch = '';
            }

            $params = [
                'startPeriod' => date("Y-m-01"),
                'endPeriod' => date("Y-m-d"),
                'under_branch' => $underBranch,
                'under_branch_list' => $underBranchList,
                'regional' => $filterRegional,
                'picReport' => $filterPicReport1,
                'status' => "(complaint_list.claim_status NOT LIKE 50)",
                'order_by' => $this->input->post('complaintListFilterOrderby'),
                'order_type' => $this->input->post('complaintListFilterOrdertype')
            ];
        } else {
            if (strtolower($arrItems['status']) == 'case closed') {
                $status = "complaint_list.claim_status = 50";
            } else if (strtolower($arrItems['status']) == 'in progress & new') {
                $status = "complaint_list.claim_status NOT LIKE 50";
            } else {
                $status = "complaint_list.claim_status LIKE '%%'";
                //$status = '';
            }

            $params = [
                'startPeriod' => $arrItems['startPeriod'],
                'endPeriod' => $arrItems['endPeriod'],
                'under_branch' => $this->input->post('complaintListFilterUnderBranch'),
                'regional' => $this->input->post('complaintListFilterRegional'),
                'picReport' => '',
                'status' => $status,
                'order_by' => $this->input->post('complaintListFilterOrderby'),
                'order_type' => $this->input->post('complaintListFilterOrdertype')
            ];
        }
        return $params;
    }

    private function _getParamsComplaintSummary()
    {
        if (!$this->input->post('complaintSummaryStartPeriod')) {
            $regionalSummary = '';
            $underBranchSummary = '';
            $underBranchList = '';
            $orderBy = 'total_claim';
            $orderByShow = '';
            $useraccess = $this->session->userdata('useraccess');

            if ($useraccess == '3' || $useraccess == '4') {
                $regionalSummary = $this->_regionalByBranchSlim($this->session->userdata('areascope'));
                $underBranchSummary = $this->session->userdata('areascope');
                $underBranchList = $this->session->userdata('areascope');
            } else if ($useraccess == '5') {
                $regionalSummary = $this->session->userdata('areascope');
                $underBranchSummary = null;
                $underBranchList = $this->complaint->getBranchListByRegional($this->session->userdata('areascope'));
            } else if ($useraccess == '6') {
                $regionalSummary = null;
                $underBranchSummary = null;
                $underBranchList = null;
            } else {
                $regionalSummary = null;
                $underBranchSummary = null;
                $underBranchList = null;
            }

            $params = [
                'startPeriod' => date("Y-m-01", strtotime("-5 months")),
                'endPeriod' => date("Y-m-d"),
                'summary_under_branch' => $underBranchSummary,
                'under_branch_list' => $underBranchList,
                'summary_regional' => $regionalSummary,
                'is_sent' => 1,
                'order_by' => $orderBy,
                'orderByShow' => $orderByShow,
                'softdelete' => 0
            ];
        } else {
            if (strtolower($this->input->post('complaintSummaryBranchOrder')) == 'complaint qty') {
                $orderBy = 'total_claim';
                $orderByShow = 'Complaint Qty';
            } else {
                $orderBy = 'closed_ratio DESC, total_claim';
                $orderByShow = '% Closed';
            }
            $params = [
                'startPeriod' => date("Y-m-01", strtotime($this->input->post('complaintSummaryStartPeriod'))),
                'endPeriod' => date("Y-m-01", strtotime($this->input->post('complaintSummaryEndPeriod'))),
                // 'summary_under_branch' => $underBranchSummary,
                'summary_regional' => $this->input->post('complaintSummarySelectRegion'),
                'summary_under_branch' => $this->input->post('complaintSummarySelectBranch'),
                'is_sent' => 1,
                'order_by' => $orderBy,
                'orderByShow' => $orderByShow,
                'softdelete' => 0
            ];
        }
        return $params;
    }

    // get params for summary Vue
    private function _getParamsComplaintSummaryVue($start = NULL, $end = NULL, $region = NULL, $underBranch = NULL)
    {

        if (is_null($start)) {
            $regionalSummary = '';
            $underBranchSummary = '';
            $underBranchList = '';
            $orderBy = 'total_claim';
            $orderByShow = '';
            $useraccess = $this->session->userdata('useraccess');

            if ($useraccess == '3' || $useraccess == '4') {
                $regionalSummary = $this->_regionalByBranchSlim($this->session->userdata('areascope'));
                $underBranchSummary = $this->session->userdata('areascope');
                $underBranchList = $this->session->userdata('areascope');
            } else if ($useraccess == '5') {
                $regionalSummary = $this->session->userdata('areascope');
                $underBranchSummary = null;
                $underBranchList = $this->complaint->getBranchListByRegional($this->session->userdata('areascope'));
            } else if ($useraccess == '6') {
                $regionalSummary = null;
                $underBranchSummary = null;
                $underBranchList = null;
            } else {
                $regionalSummary = null;
                $underBranchSummary = null;
                $underBranchList = null;
            }

            $params = [
                'startPeriod' => date("Y-m-01", strtotime("-5 months")),
                'endPeriod' => date("Y-m-d"),
                'summary_under_branch' => $underBranchSummary,
                'under_branch_list' => $underBranchList,
                'summary_regional' => $regionalSummary,
                'is_sent' => 1,
                'order_by' => $orderBy,
                'orderByShow' => $orderByShow,
                'softdelete' => 0
            ];
        } else {
            // -- Convert to Arrah Region --
            if (is_array($region) && !empty($region)) {
                // Hasilna jadi: ''Sumatera'',''Jawa Bali''
                $region_filter = "''" . implode("'',''", array_map('addslashes', $region)) . "''";
            } else {
                $region_filter = NULL; // Atawa atur kumaha kahayang Akang mun kosong
            }

            $cleanBranches = [];
            if (is_array($underBranch)) {
                foreach ($underBranch as $br) {
                    // Skip tulisan nu aya awalan 'All '
                    if (strpos($br, 'All ') === false) {
                        $cleanBranches[] = $br;
                    }
                }
            }

            if (empty($underBranch)) {
                // Hasilna jadi: ''Kediri'',''Medan''...
                // $branch_filter = "''" . implode("'',''", array_map('addslashes', $underBranch)) . "''";
                $branch_filter = null;
            } else {
                $branch_filter = "''" . implode("'',''", array_map('addslashes', $cleanBranches)) . "''";
            }


            if (strtolower($this->input->post('complaintSummaryBranchOrder')) == 'complaint qty') {
                $orderBy = 'total_claim';
                $orderByShow = 'Complaint Qty';
            } else {
                $orderBy = 'closed_ratio DESC, total_claim';
                $orderByShow = '% Closed';
            }
            $params = [
                'startPeriod' => date("Y-m-01", strtotime($start)),
                'endPeriod' => date("Y-m-01", strtotime($end)),
                'summary_regional' => $region_filter,
                'summary_under_branch' => $branch_filter,
                'is_sent' => 1,
                'order_by' => $orderBy,
                'orderByShow' => $orderByShow,
                'softdelete' => 0
            ];
        }
        return $params;
    }

    public function add()
    {
        $data['title'] = 'Tambah Data Keluhan';
        $this->_autoDismissUpdateList();

        //$data['progress'] = $this->complaint->getAllDetailProgress();
        // $data['tes'] = $this->complaint->getComplaintProgressByPeriod();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-add', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addfrommendawai()
    {
        $data['title'] = 'Tambah Data Keluhan';

        //$data['progress'] = $this->complaint->getAllDetailProgress();
        // $data['tes'] = $this->complaint->getComplaintProgressByPeriod();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-add-mendawai', $data);
        $this->load->view('templates/footer', $data);
    }

    // new input complaint controller (Mendawai)
    public function inputfromMedawai()
    {
        $data['title'] = 'Proses input keluhan';
        $this->_autoDismissUpdateList();
        $text = $this->input->post('complaintAddTextarea');
        
        // clean text from unnecessary html tag
        $convText = trim(str_replace('&nbsp;&nbsp;&nbsp;&nbsp; ',':',$text));
        $convText = str_replace(' <br>','<br>',$convText);
        $convText = str_replace('<br><br>','',$convText);
        $convText = str_replace('<p>','',$convText);
        $convText = str_replace('</p>','',$convText);
        $convText = strip_tags($convText, '<br>');
        $convText = str_replace('\n','|',$convText);
        $convText = str_replace('<br>','|',$convText);
        $arr = explode("|", $convText);

        if (count($arr) > 3) {
            $data['complaintData'] = [
                'system_code' => trim(substr($arr[0], 17)),
                'customer_name' => trim(str_replace("Customer Name", "", $arr[1])),
                'customer_phone' => trim(str_replace("Phone No.:", "", $arr[2])),
                'customer_address' => trim(str_replace("Address:", "", $arr[3])),
                'model' => trim(str_replace("Model:", "", $arr[4])),
                'serial_number' => strtoupper(trim(str_replace("Serial No.:", "", $arr[5]))),
                'detail' => trim(str_replace("Complaint Detail:", "", $arr[6])),
                'action_detail' => trim(str_replace("Action Detail:", "", $arr[8])),
                'remark' => trim(str_replace("Remark:", "", $arr[7])),
                'agent' => trim(str_replace("Agent:", "", $arr[9])),
                'datetime' => date("Y-m-d H:i:s", strtotime(str_replace('Date:','',$arr[10]))),
            ];
        } else {
            $convText = str_replace('</p><p>','|',$text);
            // $convText = trim($convText);
            $convText = str_replace('&nbsp;','',$convText);
            $convText = str_replace('<p>','',$convText);
            $convText = str_replace('</p>','',$convText);
            $convText = str_replace('<br>','',$convText);
            $convText = str_replace(' |','|',$convText);
            $convText = strip_tags($convText);
            $arr = explode("|", $convText);
            $data['complaintData'] = [
                'system_code' => trim(substr($arr[0], 17)),
                'customer_name' => trim(substr($arr[1], 15)),
                'customer_phone' => trim(substr($arr[2], 10)),
                'customer_address' => trim(substr($arr[3], 9)),
                'model' => trim(substr($arr[4], 7)),
                'serial_number' => strtoupper(trim(substr($arr[5], 12))),
                'detail' => trim(substr($arr[6], 18)),
                'action_detail' => trim(substr($arr[8], 14)),
                'remark' => trim(substr($arr[7], 8)),
                'agent' => trim(substr($arr[9], 7)),
                'datetime' => date("Y-m-d H:i:s", strtotime(substr($arr[10], 7))),
            ];
        }
        
        $data['underBranch'] = $this->complaint->getAllUnderbranch();
        $data['claimDescriptions'] = $this->complaint->getAllComplaintDescription();
        $data['claimPartsNeed'] = $this->complaint->getAllPartsNeeded();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-input', $data);
        $this->load->view('templates/footer', $data);
    }

    // prev input complaint controller (from CTI)
    public function input()
    {
        $data['title'] = 'Proses input keluhan';
        $text = strip_tags($this->input->post('complaintAddTextarea'), '<br>');
        $firstClean = trim(str_replace('&nbsp; ',':',$text));
        $secondClean = str_replace('&nbsp;','', $firstClean);
        $thirdClean = preg_replace('/\s\s+/', ' ', $secondClean);
        $lastClean = trim(str_replace('::','#',$thirdClean));
        
        $arr = explode("<br>", $lastClean);
        $newArr = [];
        $tempArr = [];
        if (strlen($arr[0]) > 30) {
            $tempText = str_replace("System Code ", '', $arr[0]);
            $tempText = str_replace(" Customer Name ", '|', $tempText);
            $tempText = str_replace(" Phone No. ", '|', $tempText);
            $tempText = str_replace(" Address ", '|', $tempText);
            $tempText = str_replace(" Model ", '|', $tempText);
            $tempText = str_replace(" Serial No. ", '|', $tempText);
            $tempText = str_replace(" Complaint Detail ", '|', $tempText);
            $tempText = str_replace(" Action Detail ", '|', $tempText);
            $tempText = str_replace(" Remark ", '|', $tempText);
            $tempText = str_replace(" Agent ", '|', $tempText);
            $tempText = str_replace(" Date ", '|', $tempText);
            $convTempText = explode("|", $tempText);

            $data['complaintData'] = [
                'system_code' => trim($convTempText[0]),
                'customer_name' => trim($convTempText[1]),
                'customer_phone' => trim($convTempText[2]),
                'customer_address' => trim($convTempText[3]),
                'model' => trim($convTempText[4]),
                'serial_number' => trim($convTempText[5]),
                'detail' => trim($convTempText[6]),
                'action_detail' => trim($convTempText[8]),
                'remark' => trim($convTempText[7]),
                'agent' => trim($convTempText[9]),
                'datetime' => date("Y-m-d", strtotime($convTempText[10])),
            ];
        } else {
            for ($i = 0; $i < count($arr); $i++) {
                $newArr[] = explode("#", $arr[$i]);
            }

            $data['complaintData'] = [
                'system_code' => substr(trim($newArr[0][1]), 5),
                'customer_name' => trim($newArr[1][1]),
                'customer_phone' => trim($newArr[2][1]),
                'customer_address' => trim($newArr[3][1]),
                'model' => trim($newArr[4][1]),
                'serial_number' => trim($newArr[5][1]),
                'detail' => trim($newArr[6][1]),
                'action_detail' => trim($newArr[8][1]),
                'remark' => trim($newArr[7][1]),
                'agent' => trim($newArr[9][1]),
                'datetime' => date("Y-m-d", strtotime($arr[10][1])),
            ];
        }

        $data['underBranch'] = $this->complaint->getAllUnderbranch();
        $data['claimDescriptions'] = $this->complaint->getAllComplaintDescription();
        $data['complaintStatus'] = $this->complaint->getAllComplaintStatusList();
        $data['claimPartsNeed'] = $this->complaint->getAllPartsNeeded();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-input', $data);
        $this->load->view('templates/footer', $data);
    }

    public function processInput()
    {
        $newData = [
            'claim_date' => $this->input->post('complaintInputClaimDate'),
            'claim_source' => $this->input->post('complaintInputClaimSource'),
            'claim_category' => $this->input->post('complaintInputCategory'),
            'claim_description' => $this->input->post('complaintInputClaimDescription'),
            'product_category' => $this->input->post('complaintInputProductCategory'),
            'model' => $this->input->post('complaintInputModel'),
            'serial_number' => $this->input->post('complaintInputSerialnumber'),
            'notification' => $this->input->post('complaintInputNotif'),
            'notif_date' => $this->input->post('complaintInputNotifDate'),
            'customer_name' => $this->input->post('complaintInputCustomerName'),
            'customer_phone' => $this->input->post('complaintInputCustomerPhone'),
            'customer_address' => $this->input->post('complaintInputCustomerAddress'),
            'claim_detail' => $this->input->post('complaintInputClaimDetail'),
            'agent_action' => $this->input->post('complaintInputAgentAction'),
            'agent' => $this->input->post('complaintInputAgent'),
            'claim_status' => $this->input->post('complaintInputClaimStatus'),
            'pic_report_1' => $this->input->post('complaintInputPicReport1'),
            'pic_report_2' => $this->input->post('complaintInputPicReport2'),
            'sass_name' => $this->_getSassNameGroup($this->input->post('complaintInputPicReport1'), $this->input->post('complaintInputPicReport2'))['sass_name'],
            'sass_group' =>  $this->_getSassNameGroup($this->input->post('complaintInputPicReport1'), $this->input->post('complaintInputPicReport2'))['sass_group'],
            'under_branch' => $this->input->post('complaintInputPartUnderBranch'),
            'regional_area' => $this->input->post('complaintInputPartRegionalArea'),
            'forwarded_date' => $this->input->post('complaintInputForwardedDate'),
            'is_urgent' => $this->input->post('complaintInputIsUrgent'),
            'is_sent' => 1,
            'part_reservation' => $this->input->post('complaintInputPartReservation'),
            'part1_type' => $this->input->post('complaintInputPartType1'),
            'part1_code' => $this->input->post('complaintInputPartCode1'),
            'part1_isready' => $this->input->post('complaintInputPartIsready1'),
            'part2_type' => $this->input->post('complaintInputPartType2'),
            'part2_code' => $this->input->post('complaintInputPartCode2'),
            'part2_isready' => $this->input->post('complaintInputPartIsready2'),
            'part3_type' => $this->input->post('complaintInputPartType3'),
            'part3_code' => $this->input->post('complaintInputPartCode3'),
            'part3_isready' => $this->input->post('complaintInputPartIsready3'),
            'part4_type' => $this->input->post('complaintInputPartType4'),
            'part4_code' => $this->input->post('complaintInputPartCode4'),
            'part4_isready' => $this->input->post('complaintInputPartIsready4'),
            'part5_type' => $this->input->post('complaintInputPartType5'),
            'part5_code' => $this->input->post('complaintInputPartCode5'),
            'part5_isready' => $this->input->post('complaintInputPartIsready5'),
            'part6_type' => $this->input->post('complaintInputPartType6'),
            'part6_code' => $this->input->post('complaintInputPartCode6'),
            'part6_isready' => $this->input->post('complaintInputPartIsready6'),
            'remark' => $this->input->post('complaintInputRemark'),
            'remark_internal' => $this->input->post('complaintInputRemarkInternal'),
            'saved_by' => $this->session->userdata('userid'),
            'saved_at' => date("Y-m-d H:i:s"),
        ];

        //$newProgressData = [];
        if ($this->complaint->checkExistingComplaint($newData['notification']) > 0) {
            $this->session->set_flashdata('message', 'Gagal|error|Data keluhan sudah ada!');
            redirect('complaint/list');
        } else {
            $newId = $this->complaint->addNewComplaint($newData);
            if ($newId > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data keluhan berhasil disimpan!');
                redirect('complaint/list');
            }
        }
    }

    private function _getSassNameGroup($pic1, $pic2)
    {
        $pic = '';
        if (strtolower($pic1) == 'part center' || strtolower($pic1) == 'technical center' || strtolower($pic1) == 'sales marketing') {
            $pic = $pic2;
        } else {
            $pic = $pic1;
        }
        // strtolower($pic1) == 'part center' ? $pic = $pic2 : $pic = $pic1;
        return $this->complaint->getSassNameGroup($pic);
    }

    public function serviceBranchByType()
    {
        $type = $this->input->post('serviceType');
        $result = $this->complaint->getServiceBranchByType($type);
        foreach ($result as $row) {
            echo '<option value="' . $row['svc_name'] . '">' . $row['svc_name'] . '</option>';
        }
    }

    public function serviceReginoalByBranch()
    {
        $branch = $this->input->post('serviceBranch');
        echo json_encode($this->complaint->getRegionByServiceBranch($branch));
    }

    private function _regionalByBranchSlim($branch)
    {
        return $this->complaint->getRegionByServiceBranch($branch)['region'];
    }

    // get branch lists by region
    public function branchListByRegional()
    {
        $regional = $this->input->post('regional');
        $result = $this->complaint->getBranchListByRegional($regional);
        foreach ($result as $row) {
            echo '<option value="' . $row['under_branch'] . '">' . $row['under_branch'] . '</option>';
        }
    }

    // get branch lists by region AJAX
    public function get_branchs_ajax()
    {
        // Ganti GET jadi POST
        $region = $this->input->post('region'); 

        // if (!empty($region)) {
        //     $this->db->where('region', $region);
        // }
        
        $result = $this->complaint->getBranchListByRegional($region);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

        public function get_branchs_ajax_by_multi_regions()
    {
        // Ganti GET jadi POST
        $regions = $this->input->post('regions'); 
        if (is_array($regions)) {
            $regList = "'" . implode("','", $regions) . "'";
        }
        
        $result = $this->complaint->getBranchListByRegionals($regList);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    // view detail single complaint data
    public function view($id)
    {
        $data['title'] = 'Keluhan - ' . $this->complaint->getComplaintDetail($id)['customer_name'];
        $userid = $this->session->userdata('userid');

        $data['detailComplaint'] = $this->complaint->getComplaintDetail($id);
        $data['complaintStatus'] = $this->complaint->getAllComplaintStatusList();
        $data['complaintRootcause'] = $this->complaint->getAllComplaintRootcauseList();
        $data['complaintCountermeasure'] = $this->complaint->getAllComplaintCountermeasureList();

        // check Read By
        $readby = '';
        if (!is_null($this->complaint->getReadybyById($id, $userid)) && count($this->complaint->getReadybyById($id, $userid)) !== 0) {
            $this->_unsetReadby($id, $userid);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/view-detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updateRootcause()
    {
        $id = $this->input->post('id');
        $rootcause = $this->input->post('rootcause');
        $countermeasure = $this->input->post('countermeasure');
        echo json_encode($this->complaint->performUpdateRootcauseCountermeasure($id, $rootcause, $countermeasure));
    }

    public function addPart()
    {
        $id = $this->input->post('complaint_id');
        $part_reservation = $this->input->post('complaintDetailAddPartReservation');
        $types = $this->input->post('part_type'); // Ieu array tina form
        $codes = $this->input->post('part_code'); // Ieu array tina form
        $readys = $this->input->post('part_isready'); // Ieu array tina form

        // 1. Cokot data complaint nu ayeuna
        $current = $this->complaint->getComplaintById($id);
        
        $updateData = [];
        $inputIndex = 0;
        $totalInput = count($types);

        // 2. Loop ti slot 1 nepi ka 6
        for ($i = 1; $i <= 6; $i++) {
            // Mun slot ieu kosong keneh JEUNG masih aya data input nu can kaasupkeun
            if (empty($current['part'.$i.'_type']) && $inputIndex < $totalInput) {
                
                $updateData['part'.$i.'_type']    = $types[$inputIndex];
                $updateData['part'.$i.'_code']    = $codes[$inputIndex];
                $updateData['part'.$i.'_isready'] = $readys[$inputIndex];
                
                $inputIndex++; // Pindah ka data input saterusna
            }
        }
        $updateData['id'] = $id;
        $updateData['part_reservation'] = $part_reservation;

        // 3. Eksekusi update mun aya nu kudu di-update
        if (!empty($updateData)) {
            $this->complaint->addPartData($updateData);
            echo json_encode(['status' => true, 'message' => 'Part hasil ditambah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Error atau part kebanyakan (maks. 6)!']);
        }
    }

    public function viewjson()
    {
        echo json_encode($this->complaint->getComplaintDetail('7885'));
    }

    private function _unsetReadby($id, $userid)
    {
        $prevReadby = $this->complaint->getReadybyById($id, $userid);
        $newReadby = [];
        foreach ($prevReadby as $row) {
            $newReadby[] = [
                'id' => $row['id'],
                'read_by' => $this->_removeStringUserid($row['read_by'], $userid)
            ];
        }
        $this->complaint->performGroupUnsetReadby($newReadby);
    }

    private function _removeStringUserid($oldString, $userid)
    {
        $new = '';
        $arr = explode(", ", $oldString);
        if (count($arr) == 0  && $arr[0] == $userid) {
            $new = NULL;
        } else {
            unset($arr[array_search($userid, $arr)]);
            $new = implode(", ", $arr);
        }
        return $new;
    }

    // Edit complaint data
    public function edit($id)
    {
        $allowedEdit = ['1', '9'];
        $accesslevel = $this->session->userdata('useraccess');
        if (!in_array($accesslevel, $allowedEdit)) {
            $this->session->set_flashdata('message', 'Akses Forbidden|error|Tidak ada akses ke halaman ini!');
            redirect('complaint/list');
            exit();
        }

        $data['title'] = 'Edit Data Keluhan';
        $data['detailComplaint'] = $this->complaint->getComplaintDetail($id);
        $data['claimDescriptions'] = $this->complaint->getAllComplaintDescription();
        $data['complaintStatus'] = $this->complaint->getAllComplaintStatusList();
        $data['claimPartsNeed'] = $this->complaint->getAllPartsNeeded(); 

        if (!$this->input->post('complaintInputId')) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('complaint/complaint-edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id = $this->input->post('complaintInputId');

            $updateData = [
                'claim_date' => $this->input->post('complaintInputClaimDate'),
                'claim_source' => $this->input->post('complaintInputClaimSource'),
                'claim_category' => $this->input->post('complaintInputCategory'),
                'claim_description' => $this->input->post('complaintInputClaimDescription'),
                'product_category' => $this->input->post('complaintInputProductCategory'),
                'model' => $this->input->post('complaintInputModel'),
                'serial_number' => $this->input->post('complaintInputSerialnumber'),
                'notification' => $this->input->post('complaintInputNotif'),
                'notif_date' => $this->input->post('complaintInputNotifDate'),
                'customer_name' => $this->input->post('complaintInputCustomerName'),
                'customer_phone' => $this->input->post('complaintInputCustomerPhone'),
                'customer_address' => $this->input->post('complaintInputCustomerAddress'),
                'claim_detail' => $this->input->post('complaintInputClaimDetail'),
                'agent_action' => $this->input->post('complaintInputAgentAction'),
                'agent' => $this->input->post('complaintInputAgent'),
                'claim_status' => $this->input->post('complaintInputClaimStatus'),
                'pic_report_1' => $this->input->post('complaintInputPicReport1'),
                'pic_report_2' => $this->input->post('complaintInputPicReport2'),
                'under_branch' => $this->input->post('complaintInputPartUnderBranch'),
                'regional_area' => $this->input->post('complaintInputPartRegionalArea'),
                'forwarded_date' => $this->input->post('complaintInputForwardedDate'),
                'is_urgent' => $this->input->post('complaintInputIsUrgent'),
                'is_sent' => 1,
                'part_reservation' => $this->input->post('complaintInputPartReservation'),
                'part1_type' => $this->input->post('complaintInputPartType1'),
                'part1_code' => $this->input->post('complaintInputPartCode1'),
                'part1_isready' => $this->input->post('complaintInputPartIsready1'),
                'part2_type' => $this->input->post('complaintInputPartType2'),
                'part2_code' => $this->input->post('complaintInputPartCode2'),
                'part2_isready' => $this->input->post('complaintInputPartIsready2'),
                'part3_type' => $this->input->post('complaintInputPartType3'),
                'part3_code' => $this->input->post('complaintInputPartCode3'),
                'part3_isready' => $this->input->post('complaintInputPartIsready3'),
                'part4_type' => $this->input->post('complaintInputPartType4'),
                'part4_code' => $this->input->post('complaintInputPartCode4'),
                'part4_isready' => $this->input->post('complaintInputPartIsready4'),
                'part5_type' => $this->input->post('complaintInputPartType5'),
                'part5_code' => $this->input->post('complaintInputPartCode5'),
                'part5_isready' => $this->input->post('complaintInputPartIsready5'),
                'part6_type' => $this->input->post('complaintInputPartType6'),
                'part6_code' => $this->input->post('complaintInputPartCode6'),
                'part6_isready' => $this->input->post('complaintInputPartIsready6'),
                'remark' => $this->input->post('complaintInputRemark'),
                'remark_internal' => $this->input->post('complaintInputRemarkInternal'),
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d H:i:s"),
            ];

            if ($this->complaint->updateComplaintData($updateData, $id) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data keluhan berhasil diperbaharui!');
                redirect('complaint/list');
            }
        }
    }

    public function updateStatus()
    {
        $data = [];
        $complaintId = $this->input->post('viewComplaintDetailId');
        if ($this->input->post('viewComplaintDetailStatus') == 50) {
            $data['claim_status'] = $this->input->post('viewComplaintDetailStatus');
            $data['closed_on'] = date("Y-m-d", strtotime($this->input->post('viewComplaintDetailClosedDate')));
            $data['propose_close'] = 0;
            $data['isresponsed_branch'] = $this->input->post('viewComplaintDetailIsresponseBranch');
            $data['isresponsed_sass'] = $this->input->post('viewComplaintDetailIsresponseSass');
            $data['isresponsed_sasshq'] = $this->input->post('viewComplaintDetailIsresponseHqsass');
            $data['isresponsed_part'] = $this->input->post('viewComplaintDetailIsresponsePartcenter');
        } else {
            $data['claim_status'] = $this->input->post('viewComplaintDetailStatus');
            $data['closed_on'] = NULL;
            $data['propose_close'] = $this->input->post('viewComplaintDetailProposeClose');
            $data['isresponsed_branch'] = $this->input->post('viewComplaintDetailIsresponseBranch');
            $data['isresponsed_sass'] = $this->input->post('viewComplaintDetailIsresponseSass');
            $data['isresponsed_sasshq'] = $this->input->post('viewComplaintDetailIsresponseHqsass');
            $data['isresponsed_part'] = $this->input->post('viewComplaintDetailIsresponsePartcenter');
        }

        $data['updated_by'] = $this->session->userdata('userid');
        $data['updated_at'] = date("Y-m-d H:i:s");

        if ($this->complaint->updateComplaintData($data, $complaintId) > 0) {
            $this->session->set_flashdata('message', 'Status diperbaharui|success|Status keluhan berhasil diperbaharui!');
            redirect('complaint/view/' . $complaintId);
        }
    }

    private function _valToStatus($val)
    {
        if ($val == 1) {
            return 'New';
        } else if ($val == 2) {
            return 'In Progress';
        } else {
            return 'Case Closed';
        }
    }

    public function updateProgress()
    {
        $complaintId = $this->input->post('viewComplaintUpdateId');
        $complaintDesc = $this->input->post('viewComplaintUpdateClaimDescription');
        // $complaintDate = $this->input->post('viewComplaintUpdateClaimDate');
        $this->form_validation->set_rules('viewComplaintUpdateProgress', 'Detail progress keluhan', 'trim|required|min_length[6]');

         // upload file
        $yrs = date("Y", strtotime($this->input->post('viewComplaintUpdateClaimDate')));
        if (!is_dir('./assets/complaint_evd/'.$yrs)) {
            mkdir('./assets/complaint_evd/' . $yrs, 0777, TRUE);
        }

        $updateRows = $this->complaint->countProgressUpdateById($complaintId) + 1;

        // $fileExt = explode(".", $_FILES['viewComplaintUpdateProgressEvidence']['name'])[1];
        // $config['upload_path'] = './assets/complaint_evd/'.$yrs;
        // $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        // $config['max_size'] = 4096;
        // $config['file_name'] = 'complaint_evd_' . $complaintId . '_' . $updateRows . '.' . $fileExt;
        // $config['overwrite'] = true;

        // $this->load->library('upload', $config);
        // if (!$this->upload->do_upload('viewComplaintUpdateProgressEvidence')) {
        //     $flashMessage = 'Berhasil update tanpa evidence';
        //     $fileUploadName = '-';
        // } else {
        //     $flashMessage = 'Progress keluhan berhasil diupdate';
        //     $fileUploadName = 'assets/complaint_evd/' . $yrs . '/' . $config['file_name'];
        // }

        // 1. Cek heula naha aya file nu diupload
        if (!empty($_FILES['viewComplaintUpdateProgressEvidence']['name'])) {
            
            // 2. Paké pathinfo ameh aman sanajan titikna loba
            $path = $_FILES['viewComplaintUpdateProgressEvidence']['name'];
            $fileExt = pathinfo($path, PATHINFO_EXTENSION);

            $updateRows = $this->complaint->countProgressUpdateById($complaintId) + 1;
            
            $config['upload_path'] = './assets/complaint_evd/'.$yrs;
            $config['allowed_types'] = 'pdf|jpg|png|jpeg';
            $config['max_size'] = 4096;
            $config['file_name'] = 'complaint_evd_' . $complaintId . '_' . $updateRows . '.' . $fileExt;
            $config['overwrite'] = true;

            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('viewComplaintUpdateProgressEvidence')) {
                // Ieu mun aya file tapi gagal upload (misal: format salah atawa kegedéan)
                $flashMessage = 'Gagal upload evidence: ' . $this->upload->display_errors('', '');
                $fileUploadName = '-';
            } else {
                // Ieu mun suksés
                $flashMessage = 'Progress keluhan berhasil diupdate';
                $fileUploadName = 'assets/complaint_evd/' . $yrs . '/' . $config['file_name'];
            }

        } else {
            // 3. Ieu mun emang user teu upload nanaon (input kosong)
            $flashMessage = 'Berhasil update tanpa evidence';
            $fileUploadName = '-';
        }

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal|error|Tidak ada update progress atau isian kosong!');
            redirect('complaint/view/' . $complaintId);
        } else {
            $data = [
                'complaint_id' => $complaintId,
                'progress_update' => str_replace("#", "", $this->input->post('viewComplaintUpdateProgress')),
                'evidence_file' => $fileUploadName,
                'read_by' => $this->_readby($complaintId, $complaintDesc),
                'current_status' => $this->input->post('viewComplaintUpdateProgressStatus'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            if ($this->complaint->insertUpdateProgress($data) > 0) {
                if ($this->complaint->updateStatusOnly($data['complaint_id'], $data['current_status'], $data['updated_at'], ) > 0) {
                    $this->session->set_flashdata('message', 'Berhasil|success|' . $flashMessage);
                    redirect('complaint/view/' . $data['complaint_id']);
                } else {
                    $this->session->set_flashdata('message', 'Berhasil|success|' . $flashMessage);
                    redirect('complaint/view/' . $data['complaint_id']);
                }
            }
        }

        // for next upload evidence
        // if (!$this->upload->do_upload('viewComplaintUpdateProgressEvidence')) {
        //     $this->session->set_flashdata('message', 'Gagal Upload|error|' . strip_tags($this->upload->display_errors()));
        //     redirect('complaint/view/' . $complaintId);
        // }
        // else {
        //     // upload text form
        //     $this->form_validation->set_rules('viewComplaintUpdateProgress', 'Detail progress keluhan', 'trim|required|min_length[6]');

        //     if ($this->form_validation->run() == false) {
        //         $this->session->set_flashdata('message', 'Gagal|error|Tidak ada update progress atau isian kosong!');
        //         redirect('complaint/view/' . $complaintId);
        //     } else {
        //         $data = [
        //             'complaint_id' => $complaintId,
        //             'progress_update' => str_replace("#", "", $this->input->post('viewComplaintUpdateProgress')),
        //             'updated_by' => $this->session->userdata('userid'),
        //             'updated_at' => date("Y-m-d H:i:s"),
        //             'read_by' => NULL
        //         ];
        //         if ($this->complaint->insertUpdateProgress($data) > 0) {
        //             $this->session->set_flashdata('message', 'Berhasil|success|Progress keluhan berhasil diupdate!');
        //             redirect('complaint/view/' . $data['complaint_id']);
        //         }
        //     }
        // }
    }

    private function _readby($id, $desc)
    {
        /*
        CCC = all
        Sasscontroller = all
        Astika = all
        Maksum = all
        Part Center = waiting part
        */

        // under_branch list
        // $underbranch = $this->complaint->getbranch($id);
        // $id = $this->uri->segment(3);
        // $desc = $this->uri->segment(4);
        $branchlist = $this->complaint->getBranchList($this->complaint->getBranchRegion($id)['under_branch']);

        // region list
        $regionlist = $this->complaint->getRegionList($this->complaint->getBranchRegion($id)['regional_area']);

        // CCC, SVC Manager, SASS controller, SDSS-SSR contoller 
        $ccclist = $this->complaint->getCccList();
        $svcmanager = $this->complaint->getSvcManagerList();
        $sasscontroller = $this->complaint->getSassControllerList();
        $sdssssrcontroller = $this->complaint->getSdssSsrControllerList();

        // cek for part HQ
        $ispart = [];
        $desc = str_replace('%20', ' ', $desc);
        if (strtolower($desc) == 'waiting%20part' || strtolower($desc) == 'waiting part') {
            $ispart = $this->complaint->getPartCenterList();
        }

        $readby = [];
        $merged = array_merge($branchlist, $regionlist, $ispart, $ccclist, $svcmanager, $sasscontroller, $sdssssrcontroller);
        foreach ($merged as $row) {
            $readby[] = $row['userid'];
        }
        $readby = implode(", ", $readby);
        return $readby;
    }

    public function updateProgressOld()
    {
        // upload text form
        $complaintId = $this->input->post('viewComplaintUpdateId');
        $this->form_validation->set_rules('viewComplaintUpdateProgress', 'Detail progress keluhan', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal|error|Tidak ada update progress atau isian kosong!');
            redirect('complaint/view/' . $complaintId);
        } else {
            $data = [
                'complaint_id' => $complaintId,
                'progress_update' => str_replace("#", "", $this->input->post('viewComplaintUpdateProgress')),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d H:i:s"),
                'read_by' => NULL
            ];
            if ($this->complaint->insertUpdateProgress($data) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Progress keluhan berhasil diupdate!');
                redirect('complaint/view/' . $data['complaint_id']);
            }
        }
    }

    public function deleteProgress($id)
    {
        $complaintId = $this->complaint->getComplaintIdByProgressId($id);

        if ($this->complaint->deleteUpdateProgress($id) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|success|Progress keluhan berhasil dihapus!');
            redirect('complaint/view/' . $complaintId);
        }
    }

    public function getProgress()
    {
        $id = $this->input->post('id');
        echo json_encode($this->complaint->getProgressInfo($id));
    }

    public function editProgress()
    {
        $complaintId = $this->input->post('editComplaintUpdateComplaintId');
        $updateData = [
            'id' => $this->input->post('editComplaintUpdateId'),
            'progress_update' => str_replace("#", "", $this->input->post('editComplaintUpdateProgress')),
            'updated_by' => $this->session->userdata('userid'),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        if ($this->complaint->editUpdateProgress($updateData) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|success|Progress keluhan berhasil diubah!');
            redirect('complaint/view/' . $complaintId);
        }
    }

    public function delete($id)
    {
        $allowedDeleteButton = ['1', '9'];
        $accesslevel = $this->session->userdata('useraccess');
        if (inarray($accesslevel, $allowedDeleteButton)) {
            if ($this->complaint->deleteComplaintData($id) > 0) {
                $this->session->set_flashdata('message', 'Data dihapus|info|Data keluhan dihapus!');
                redirect('complaint/list');
            }
        } else {
            $this->session->set_flashdata('message', 'Gagal|error|Tidak punya akses hapus data!');
            redirect('complaint/list');
        }

    }

    // New complaint progress update
    public function updatelist()
    {
        check_access();
        $this->_autoDismissUpdateList();
        $data['title'] = 'Update Keluhan Terbaru';
        $userid = $this->session->userdata('userid');
        $data['updateList'] = $this->complaint->getProgressUpdateList($userid);
        $data['updateListClosed'] = $this->complaint->countProgressUpdateListClosed($userid);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/update-list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function countNewUpdateList()
    {
        $userid = $this->session->userdata('userid');
        echo count($this->complaint->getProgressUpdateList($userid));
    }

    public function dismissUpdateList()
    {
        $this->uri->segment(3) == '' ? $criteria = '' : $criteria = $this->uri->segment(3);
        $userid = $this->session->userdata('userid');
        $lists = $this->complaint->getReadbyByUserid($userid, $criteria);

        // performing dismiss
        $newReadby = [];
        foreach ($lists as $row) {
            $newReadby[] = [
                'id' => $row['id'],
                'read_by' => $this->_removeStringUserid($row['read_by'], $userid)
            ];
        }
        if ($this->complaint->performGroupUnsetReadby($newReadby) > 0) {
            $this->session->set_flashdata('message', 'Berhasil Diabaikan!|info|Semua info update sudah diabaikan!');
            redirect('complaint/updatelist');
        }
    }

    public function dismissUpdateListMarked()
    {
        $lists = $this->input->post('lists');
        $userid = $this->session->userdata('userid');

        $newReadby = [];
        foreach ($lists as $row) {
            $newReadby[] = [
                'complaint_id' => $this->complaint->getComplaintIdByProgressId($row),
                'read_by' => $this->_removeStringUserid($this->complaint->getReadybyByProgressid($row, $userid)['read_by'], $userid)
            ];
        }
        $this->complaint->performGroupUnsetReadbyComplaintId($newReadby);
    }

    private function _autoDismissUpdateList()
    {
        $limitDays = $this->complaint->getLimitKeepUpdatelist();
        $lists = $this->complaint->getReadbyByUseridByPeriod($this->session->userdata('userid'), date("Y-m-d", strtotime("-" . $limitDays . " days")));
        
        if (count($lists) < 1) {
            return;
        } else {
            $newReadby = [];
            foreach ($lists as $row) {
                $newReadby[] = [
                    'complaint_id' => $this->complaint->getComplaintIdByProgressId($row['id']),
                    'read_by' => $this->_removeStringUserid($row['read_by'], $this->session->userdata('userid'))
                ];
            }
            $this->complaint->performGroupUnsetReadbyComplaintId($newReadby);
        }
        return $limitDays;
    }

    // Complaint Status list
    public function statuslist()
    {
        check_access();
        $data['title'] = 'Daftar Status Keluhan';
        $data['statusList'] = $this->complaint->getAllStatusList();
        $this->_autoDismissUpdateList();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/status-list', $data);
        $this->load->view('templates/footer', $data);
    }


    // count Complaint Forward Ratio
    public function ratio()
    {
        check_access();
        $data['title'] = 'Ratio forward keluhan';
        if (!$this->input->post('complaintCountRatioSelectPeriod')) {
            $data['period'] = date("Y-m-01");
        } else {
            $data['period'] = date("Y-m-01", strtotime($this->input->post('complaintCountRatioSelectPeriod')));
        }
        $data['dailyRatio'] = $this->complaint->getComplaintDailyForwardRatio($data['period']);
        $data['dailyRatioOneMonth'] = $this->complaint->getComplaintDailyForwardRatioMonth($data['period']);
        $data['dailyUpdate'] = $this->complaint->getComplaintDailyUpdate($data['period']);
        $data['listUpdater'] = $this->complaint->getComplaintDailyUpdater($data['period']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/count-ratio', $data);
        $this->load->view('templates/footer', $data);
    }

    public function closerequest()
    {
        check_access();
        $data['title'] = 'Request Close Keluhan';
        $all = [1, 2, 7, 8, 9, 10];
        $regional = [5];

        if (in_array($this->session->userdata('useraccess'), $all)) {
            $data['requestCloseList'] = $this->complaint->getRequestCloseList();
        } else if (in_array($this->session->userdata('useraccess'), $regional)) {
            $region = $this->session->userdata('areascope');
            $data['requestCloseList'] = $this->complaint->getRequestCloseListByRegion($region);
        } else {
            $underbranch = $this->session->userdata('areascope');
            $data['requestCloseList'] = $this->complaint->getRequestCloseListByBranch($underbranch);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/request-close', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proposeClose()
    {
        if ($this->input->post('proposeStatus') == 'true') {
            $proposeStatus = 1;
        } else {
            $proposeStatus = 0;
        }
        $setData = [
            'id' => $this->input->post('complaintId'),
            'proposeStatus' => $proposeStatus,
            'proposedBy' => $this->session->userdata('userid'),
            'proposedAt' => date("Y-m-d H:i:s")
        ];
        $this->complaint->setProposeCloseComplaint($setData);
    }

    public function rejectProposeClose($complaintid)
    {
        $rejectData = [
            'id' => $complaintid,
            'proposeStatus' => 0,
            'proposedBy' => null,
            'proposedAt' => null
        ];
        if ($this->complaint->rejectProposeCloseComplaint($rejectData) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|info|Request close dihapus/rejected!');
            redirect('complaint/closerequest');
        }
    }

    public function responserRequestClose()
    {
        $this->form_validation->set_rules('viewComplaintResponserRequestReason', 'Alasan/Catatan', 'trim|required');
        if ($this->form_validation->run() == false) {
            redirect('complaint/view/' . $this->input->post('viewComplaintResponseRequestId'));
        } else {
            $data = [
                'complaintId' => $this->input->post('viewComplaintResponseRequestId'),
                'response_request' => $this->input->post('viewComplaintResponserRequestReason'),
                'responsed_by' => $this->session->userdata('userid'),
                'responsed_at' => date("Y-m-d H:i:s")
            ];
            if ($this->complaint->responserRequestClose($data) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|info|Respon request close sudah disimpan!');
                redirect('complaint/closerequest');
            }
        }
    }

    // Unsent - insert manually (email complaint error)
    public function unsent()
    {
        check_access();
        $data['title'] = 'Keluhan Belum Dikirim (email 5d/5e error)';
        $data['allUnsentManual'] = $this->complaint->getUnsentManual();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('complaint/unsent');
        $this->load->view('templates/footer');
    }

    public function insertmanual()
    {
        $data['title'] = 'Insert manual data keluhan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('complaint/insert-manual');
        $this->load->view('templates/footer');
    }

    // previous Process Manual - NOT USED
    public function processmanualold()
    {
        $data['title'] = 'Proses Data Manual';

        //$processData = $this->input->post('manualAddTextarea');

        $this->form_validation->set_rules('manualInputClaimDate', 'Tanggal keluhan', 'trim|required');
        $this->form_validation->set_rules('manualInputCustomerName', 'Nama konsumen', 'trim|required');
        $this->form_validation->set_rules('manualInputCustomerPhone', 'Telepon konsumen', 'trim|required');
        $this->form_validation->set_rules('manualInputClaimDate', 'Tanggal keluhan', 'trim|required');
        $this->form_validation->set_rules('manualInputClaimDetail', 'Detail keluhan', 'trim|required');
        // $this->form_validation->set_rules('manualInputNotif', 'Notif', 'trim|required|is_unique[complaint_list.notification]');

        if ($this->form_validation->run() == false) {
            $processData = explode('&nbsp;&nbsp;&nbsp;', $this->input->post('manualAddTextarea'));
            $data['processed'] = [
                'customerName' => strip_tags($processData[0]),
                'agent' => strip_tags($processData[1]),
                'systemCode' => strip_tags($processData[2]),
                'detail' => strip_tags($processData[3]),
                'actionAgent' => strip_tags($processData[4]),
                'model' => trim(strip_tags($processData[5])),
                'notification' => trim(strip_tags($processData[11])),
                'customerPhone' => strip_tags($processData[12]),
                'dateTime' => strip_tags($processData[16]),
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('complaint/process-manual');
            $this->load->view('templates/footer');
        } else {
            $newData = [
                'claim_date' => $this->input->post('manualInputClaimDate'),
                'claim_category' => $this->input->post('manualInputCategory'),
                'claim_status' => 'New',
                'model' => $this->input->post('manualInputModel'),
                'serial_number' => $this->input->post('manualInputSerialnumber'),
                'notification' => $this->input->post('manualInputNotif'),
                'customer_name' => $this->input->post('manualInputCustomerName'),
                'customer_phone' => $this->input->post('manualInputCustomerPhone'),
                'customer_address' => $this->input->post('manualInputCustomerAddress'),
                'claim_detail' => $this->input->post('manualInputClaimDetail'),
                'agent_action' => $this->input->post('manualInputAgentAction'),
                'agent' => $this->input->post('manualInputAgent'),
                'is_sent' => 0,
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d H:i:s")
            ];

            if ($this->complaint->checkExistingComplaint($newData['notification']) > 0) {
                $this->session->set_flashdata('message', 'Gagal|error|Data keluhan sudah ada!');
                redirect('complaint/unsent');
            } else {
                if($this->complaint->insertNewManual($newData)) {
                    $this->session->set_flashdata('message', 'Berhasil|success|Data keluhan manual berhasil diinput!');
                    redirect('complaint/unsent');
                }
            }
        }          
    }

    // new Process Manual update 19 Nov 2024
    public function processmanual()
    {
        $data['title'] = 'Proses Data Manual';

        //$processData = $this->input->post('manualAddTextarea');

        $this->form_validation->set_rules('manualInputClaimDate', 'Tanggal keluhan', 'trim|required');
        $this->form_validation->set_rules('manualInputCustomerName', 'Nama konsumen', 'trim|required');
        $this->form_validation->set_rules('manualInputCustomerPhone', 'Telepon konsumen', 'trim|required');
        $this->form_validation->set_rules('manualInputClaimDate', 'Tanggal keluhan', 'trim|required');
        $this->form_validation->set_rules('manualInputClaimDetail', 'Detail keluhan', 'trim|required');
        // $this->form_validation->set_rules('manualInputNotif', 'Notif', 'trim|required|is_unique[complaint_list.notification]');

        if ($this->form_validation->run() == false) {
            // explode text copied to array
            $processData = explode('&nbsp;&nbsp;&nbsp;', $this->input->post('manualAddTextarea'));
            $data['processed'] = [];
            if (count($processData) < 10) {
                $this->session->set_flashdata('message', 'Gunakan Mozilla Firefox|error|Input ke Unsent hanya akan berjalan di Firefox!');
                redirect('complaint/unsent');
            } else if (count($processData) >= 10 && count($processData) <= 20 ) {
                $data['processed'] = [
                    'customerName' => ltrim(strip_tags($processData[0]), '&nbsp;'),
                    'agent' => ltrim(strip_tags($processData[1]), '&nbsp;'),
                    'systemCode' => ltrim(strip_tags($processData[2]), '&nbsp;'),
                    'detail' => ltrim(strip_tags($processData[3]), '&nbsp;'),
                    'actionAgent' => ltrim(strip_tags($processData[4]), '&nbsp;'),
                    'model' => ltrim(strip_tags($processData[5]), '&nbsp;'),
                    'notification' => ltrim(strip_tags($processData[11]), '&nbsp;'),
                    'customerPhone' => ltrim(strip_tags($processData[12]), '&nbsp;'),
                    'dateTime' => ltrim(strip_tags($processData[16]), '&nbsp;')
                ];
            } else {
                $data['processed'] = [
                    'customerName' => ltrim(strip_tags($processData[0]), '&nbsp;'),
                    'agent' => ltrim(strip_tags($processData[1]), '&nbsp;'),
                    'systemCode' => ltrim(strip_tags($processData[2]), '&nbsp;'),
                    'detail' => ltrim(strip_tags($processData[3]), '&nbsp;'),
                    'actionAgent' => ltrim(strip_tags($processData[4]), '&nbsp;'),
                    'model' => ltrim(strip_tags($processData[5]), '&nbsp;'),
                    'notification' => ltrim(strip_tags($processData[12]), '&nbsp;'),
                    'customerPhone' => ltrim(strip_tags($processData[13]), '&nbsp;'),
                    'dateTime' => ltrim(strip_tags($processData[18]), '&nbsp;')
                ];
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('complaint/process-manual');
            $this->load->view('templates/footer');
        } else {
            $newData = [
                'claim_date' => trim($this->input->post('manualInputClaimDate'), '&nbsp;'),
                'claim_category' => trim($this->input->post('manualInputCategory'), '&nbsp;'),
                'claim_status' => 'New',
                'model' => trim($this->input->post('manualInputModel'), '&nbsp;'),
                'serial_number' => trim($this->input->post('manualInputSerialnumber'), '&nbsp;'),
                'notification' => trim($this->input->post('manualInputNotif'), '&nbsp;'),
                'customer_name' => ltrim($this->input->post('manualInputCustomerName'), '&nbsp;'),
                'customer_phone' => trim($this->input->post('manualInputCustomerPhone'), '&nbsp;'),
                'customer_address' => trim($this->input->post('manualInputCustomerAddress'), '&nbsp;'),
                'claim_detail' => trim($this->input->post('manualInputClaimDetail'), '&nbsp;'),
                'agent_action' => trim($this->input->post('manualInputAgentAction'), '&nbsp;'),
                'agent' => trim($this->input->post('manualInputAgent'), '&nbsp;'),
                'is_sent' => 0,
                'saved_by' => $this->session->userdata('userid'),
                'saved_at' => date("Y-m-d H:i:s")
            ];

            if ($this->complaint->checkExistingComplaint($newData['notification']) > 0) {
                $this->session->set_flashdata('message', 'Gagal|error|Data keluhan sudah ada!');
                redirect('complaint/unsent');
            } else {
                if($this->complaint->insertNewManual($newData)) {
                    $this->session->set_flashdata('message', 'Berhasil|success|Data keluhan manual berhasil diinput!');
                    redirect('complaint/unsent');
                }
            }
        }          
    }

    public function processunsent($id)
    {
        $data['title'] = 'Proses Kirim Keluhan Manual';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('complaint/unsent');
        $this->load->view('templates/footer');
    }

    public function manualedit($id)
    {
        $data['title'] = 'Prosess Manual Kirim Email';
        $data['detailComplaint'] = $this->complaint->getComplaintDetail($id);
        $data['claimDescriptions'] = $this->complaint->getAllComplaintDescription();

        if (!$this->input->post('manualInputId')) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('complaint/manual-edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id = $this->input->post('manualInputId');
            $updateData = [
                'claim_date' => $this->input->post('complaintInputClaimDate'),
                'notif_date' => $this->input->post('complaintInputNotifDate'),
                'claim_source' => $this->input->post('complaintInputClaimSource'),
                'claim_category' => $this->input->post('complaintInputCategory'),
                'claim_description' => $this->input->post('complaintInputClaimDescription'),
                'agent' => $this->input->post('complaintInputAgent'),
                'product_category' => $this->input->post('complaintInputProductCategory'),
                'model' => $this->input->post('complaintInputModel'),
                'serial_number' => $this->input->post('complaintInputSerialnumber'),
                'notification' => $this->input->post('complaintInputNotif'),
                'customer_name' => $this->input->post('complaintInputCustomerName'),
                'customer_phone' => $this->input->post('complaintInputCustomerPhone'),
                'customer_address' => $this->input->post('complaintInputCustomerAddress'),
                'claim_detail' => $this->input->post('complaintInputClaimDetail'),
                'agent_action' => $this->input->post('complaintInputAgentAction'),
                'claim_status' => 'New',
                'pic_report_1' => $this->input->post('complaintInputPicReport1'),
                'pic_report_2' => $this->input->post('complaintInputPicReport2'),
                'under_branch' => $this->input->post('complaintInputPartUnderBranch'),
                'regional_area' => $this->input->post('complaintInputPartRegionalArea'),
                'forwarded_date' => $this->input->post('complaintInputForwardedDate'),
                'is_urgent' => $this->input->post('complaintInputIsUrgent'),
                'is_sent' => 1,
                'part_reservation' => $this->input->post('complaintInputPartReservation'),
                'part1_type' => $this->input->post('complaintInputPartType1'),
                'part1_code' => $this->input->post('complaintInputPartCode1'),
                'part1_isready' => $this->input->post('complaintInputPartIsready1'),
                'part2_type' => $this->input->post('complaintInputPartType2'),
                'part2_code' => $this->input->post('complaintInputPartCode2'),
                'part2_isready' => $this->input->post('complaintInputPartIsready2'),
                'part3_type' => $this->input->post('complaintInputPartType3'),
                'part3_code' => $this->input->post('complaintInputPartCode3'),
                'part3_isready' => $this->input->post('complaintInputPartIsready3'),
                'part4_type' => $this->input->post('complaintInputPartType4'),
                'part4_code' => $this->input->post('complaintInputPartCode4'),
                'part4_isready' => $this->input->post('complaintInputPartIsready4'),
                'part5_type' => $this->input->post('complaintInputPartType5'),
                'part5_code' => $this->input->post('complaintInputPartCode5'),
                'part5_isready' => $this->input->post('complaintInputPartIsready5'),
                'part6_type' => $this->input->post('complaintInputPartType6'),
                'part6_code' => $this->input->post('complaintInputPartCode6'),
                'part6_isready' => $this->input->post('complaintInputPartIsready6'),
                'remark' => $this->input->post('manualInputRemark'),
                'remark_internal' => $this->input->post('manualInputRemarkInternal'),
                'updated_by' => $this->session->userdata('userid'),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            if ($this->complaint->updateComplaintData($updateData, $id) > 0) {
                $this->session->set_flashdata('message', 'Berhasil|success|Data keluhan berhasil diperbaharui!');
                redirect('complaint/list');
            }
        }
    }

    public function addNoteUnsent()
    {
        $data = [
            'id' => $this->input->post('addNoteUnsentComplaintId'),
            'remark_internal' => $this->input->post('addNoteUnsentRemarkInternal')
        ];
        if ($this->complaint->performAddNoteUnsent($data) > 0) {
            $this->session->set_flashdata('message', 'Berhasil|success|Catatan sudah ditambahkan ke Keluhan Unsent!');
            redirect('complaint/unsent');
        }
    }

    public function bycategory()
    {
        // $data['title'] = 'Complaint - ' . ucwords(urldecode($category));
        // $cate = strtolower(urldecode($category));
        $data['title'] = 'Complaint - ' . $this->input->post('linktoDetailCategory');

        $category = $this->input->post('linktoDetailCategory');
        $startPeriod = $this->input->post('linktoDetailStartperiod');
        $endPeriod = $this->input->post('linktoDetailEndperiod');
        $cate = strtolower($category);

        if ($cate == 'waiting part') {
            $data['partlists'] = $this->complaint->getCategoryByPartlist($cate, $startPeriod, $endPeriod);
            $data['branchlists'] = $this->complaint->getCategoryByBranchlistWaitingPart($cate, $startPeriod, $endPeriod);
        } else {
            $data['partlists'] = NULL;
            $data['branchlists'] = $this->complaint->getCategoryByBranchlistOri($cate, $startPeriod, $endPeriod);
        }
        $data['detaillists'] = $this->complaint->getCategoryDetail($cate, $startPeriod, $endPeriod);
        $data['params'] = [
            'category' => $this->input->post('linktoDetailCategory'),
            'startPeriod' => $this->input->post('linktoDetailStartperiod'),
            'endPeriod' => $this->input->post('linktoDetailEndperiod'),
        ];
        // $resultByMonth = $this->complaint->countClaimByCategoryTotalMonth($startPeriod, $endPeriod);
        // $data['tableHeader'] = array_keys($data['branchlists'][0]);
        // $data['convertData'] = [];

        // for($i = 0; $i < 11; $i++) {
        //     $subtotalByCategory = 0;
        //     if (strtoupper($data['branchlists'][$i]['claim_description']) !== 'MINTA PERBAIKAN CEPAT' && strtoupper($data['branchlists'][$i]['claim_description']) !== 'INFORMASI PERBAIKAN') {
        //         for ($j = 0; $j < count($data['branchlists'][$i]); $j++) {
        //             $data['convertData'][$i][$data['tableHeader'][$j]] = $data['branchlists'][$i][$data['tableHeader'][$j]];
        //             $subtotalByCategory += (int)$data['branchlists'][$i][$data['tableHeader'][$j]];
        //         }
        //     }
        //     $data['convertData'][$i]['ttl_bycategory'] = $subtotalByCategory;
        // }
        // $data['totalByMonth'] = [];
        // for ($i = 1; $i <count($data['tableHeader']); $i++) {
        //     $j = $i - 1;
        //     $data['totalByMonth'][$data['tableHeader'][$i]] = $resultByMonth[$j]['qty'];
        // }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/bycategory', $data);
        $this->load->view('templates/footer', $data);
    }

    public function search()
    {
        $data['title'] = 'Cari Data Keluhan';

        $data['searchResults'] = $this->complaint->searchComplaint($this->input->post('complaintSearchClue'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('complaint/complaint-search', $data);
        $this->load->view('templates/footer', $data);
    }
}
