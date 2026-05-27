<?php

$allowedSuperadmin = [9];
$allowedAccess = [1, 2, 9];
$allowedAccessAll = [1, 2, 7, 8, 9, 10, 11];
$allowedAccessRegional = [1, 2, 5, 7, 9];
$allowedAccessSvchead = [3, 4, 5];
$allowedAccessWithBranch = [1, 3, 4, 5, 6, 9, 10, 11];

$useraccess = $this->session->userdata('useraccess');

function stringLimiter12($string)
{
    if (strlen($string) < 13) {
        return $string;
    } else {
        return substr($string, 0, 12) . ' ...';
    }
}

function stringLimiter20($string)
{
    if (strlen($string) < 21) {
        return $string;
    } else {
        return substr($string, 0, 20) . ' ...';
    }
}

function statusToBadge($status)
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

function statusToVal($status)
{
    $closed = ['Case Closed', 'Case Close', 'Case closed', 'Case close', 'case closed', 'case close'];
    if (in_array($status, $closed)) {
        return 3;
    } else if (strtolower($status) == 'new') {
        return 1;
    } else {
        return 2;
    }
}

function statusToStyle($ref, $status)
{
    $closed = ['Case Closed', 'Case Close', 'Case closed', 'Case close', 'case closed', 'case close'];
    if (strtolower($ref) == strtolower($status)) {
        if (in_array($status, $closed)) {
            return 'text-success text-bold';
        } else {
            return 'text-bold text-danger';
        }
    } else {
        return 'text-muted';
    }
}

function toStringDatetime($date)
{
    if (strtotime($date) < 0 || $date == '-' || $date == '') {
        return '-';
    } else {
        return date("d M Y H:i", strtotime($date));
    }
}

function isurgentToStyle($isurgent, $status, $desc)
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

function progressToArray($data)
{
    $arr = explode('#', $data);
    if (count($arr) < 2) {
        if (strlen($arr[0]) < 1) {
            return '-';
        } else {
            $abs = explode('|', $arr[0]);
            $progressList = '<span class="badge badge-secondary mr-1">' . $abs[0] . '</span><span class="text-dark"><small>' . date("d.m.Y H:i", strtotime($abs[1])) . '</small></span><br><p>' . substr($abs[2], 0, 40) . ' ...</p>';
            return $progressList;
        }
    } else {
        $progressList = '';
        for ($i = 0; $i < count($arr); $i++) {
            $abs = explode('|', $arr[$i]);
            $prog = '<span class="badge badge-secondary mr-1">' . $abs[0] . '</span><span class="text-dark"><small>' . date("d.m.Y H:i", strtotime($abs[1])) . '</small></span><br><p>' . substr($abs[2], 0, 40) . ' ...</p>';
            $progressList  = $progressList . $prog;
        }
        return $progressList;
    }
}

function progressToArrayFullText($access, $data, $progressId)
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
            $progressList = '<small><span class="badge badge-info mr-1 px-1 py-1">' . $abs[1] . '</span><span class="badge badge-warning mr-1 px-1 py-1">' . $abs[4] . '</span><span class="text-info">' . date("d-M-Y H:i", strtotime($abs[2])) . ' | ' . $deleteButton . ' | ' . $editButton . ' </small></span><br><p>' . $abs[3] . showImage($abs[5]) . '</p>';
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
            $prog = '<small><span class="badge badge-info mr-1 px-1 py-1">' . $abs[1] . '</span><span class="badge badge-warning mr-1 px-1 py-1">' . $abs[4] . '</span><span class="text-info">' . date("d-M-Y H:i", strtotime($abs[2])) . ' | ' . $deleteButton . ' | ' .  $editButton . '</small></span><br><p>' . $abs[3] . showImage($abs[5]) . '</p>';
            $progressList  = $progressList . $prog;
        }
        return $progressList;
    }
}

function showImage($link)
{
    if ($link == NULL || $link == '-') {
        return;
    } else {
        return '<br><img class="img-thumbnail w-50 mt-2" src="http://192.168.188.254/cccinfo/' . $link . '" style="max-width: 400px;"><br><a class="text-muted" href="http://192.168.188.254/cccinfo/' . $link . '" target="_blank"><i class="fas fa-file-image"></i> Buka di tab baru</a>';
    }
}

function isreadyToIcon($partItem, $status)
{
    $show = [];
    if($partItem == '') {
        $show['display'] = 'display: none';
        $show['status'] = '';
    } else {
        if ($status == 1) {
            $show['display'] = 'display: flex';
            $show['status'] = '<small><span class="badge badge-success font-weight-normal"><i class="fas fa-check-circle"></i> HQ ready</span><small>';
        } else {
            $show['display'] = 'display: flex';
            $show['status'] = '<small><span class="badge badge-danger font-weight-normal"><i class="fas fa-times"></i> HQ kosong</span></small>';
        }
    }
    return $show;
}

function partReadytoCheckbox($status)
{
    if ($status == 1) {echo 'checked';} else { echo '';}
}

function isurgentToCheckbox($is)
{
    if ($is == 1) {
        return 'checked';
    } else {
        return '';
    }
}

function isurgentToText($is)
{
    if ($is == 1) {
        return '<span class="text-danger"> - </span><span class="btn btn-sm badge-danger text-center text-bold" style="min-width: 120px;">U R G E N T</span>';
    } else {
        return '';
    }
}

function claimDetailStatusToBadge($status, $description, $sttsgroup)
{
    if ($status == 50) {
        return '<span class="ml-2 btn btn-sm badge-success text-center" style="min-width: 120px;">C L O S E D</span>';
    } else if ($status == 10) {
        return '<span class="ml-2 btn btn-sm badge-warning text-center" style="min-width: 120px;">N E W</span>';
    } else {
        return '<span class="ml-2 btn btn-sm badge-warning text-center text-bold" style="min-width: 120px;">IN PROGRESS - (' . $status . ') ' . $description . '</span>';
    }    
}

function claimDetailStatusToBadgeOld($status)
{
    $closed = ['Case Closed', 'Case Close', 'Case closed', 'Case close', 'case closed', 'case close'];
    if (in_array($status, $closed)) {
        return '<span class="btn btn-sm badge-success text-center" style="min-width: 120px;">C L O S E D</span>';
    } else if (strtolower($status) == 'new') {
        return '<span class="btn btn-sm badge-warning text-center" style="min-width: 120px;">N E W</span>';
    } else {
        return '<span class="btn btn-sm badge-warning text-center text-danger" style="min-width: 120px;">IN PROGRESS</span>';
    }    
}

function stringTat($closeat, $tat)
{
    if ($closeat == NULL) {
        return $tat;
    } else {
        return $closeat;
    }
}

function cekNullPicReport($pic1, $pic2) {
    if ($pic2 == NULL || $pic2 == NULL) {
        echo $pic1;
    } else {
        echo $pic1 . ' - ' . $pic2;
    }
}

function ratioFormater($value, $divider) {
    if ($divider == 0) {
        return '0';
    } else {
        return number_format(($value / $divider) * 100, 1);
    }
}


if (!$this->input->post('complaintSummaryStartPeriod')) {
    $complaintSummaryStartPeriod = date("Y-m-01", strtotime("-5 months"));
    $complaintSummaryEndPeriod = date("Y-m-d");
} else {
    $complaintSummaryStartPeriod = date("Y-m-d", strtotime($this->input->post('complaintSummaryStartPeriod')));
    $complaintSummaryEndPeriod = date("Y-m-d", strtotime($this->input->post('complaintSummaryEndPeriod')));
}

if ($this->input->post('complaintListFilterStartPeriod')) {
    $filterStartPeriod = $this->input->post('complaintListFilterStartPeriod');
    $filterEndPeriod = $this->input->post('complaintListFilterEndPeriod');
    $filterRegional = $this->input->post('complaintListFilterRegional');
    $filterPicReport1 = $this->input->post('complaintListFilterPicReport1');
    $underBranch = $this->input->post('complaintListFilterUnderBranch');
    $filterStatus = $this->input->post('complaintListFilterStatus');
    $underBranchSummary = $this->input->post('complaintSummarySelectBranch');
    $filterRegionalSummary = $this->input->post('complaintSummarySelectRegion');
} else {
    $useraccess = $this->session->userdata('useraccess');
    if (in_array($useraccess, $allowedAccessAll)) {
        $filterRegional = '';
        $filterPicReport1 = '';
        $underBranch = '';
        $underBranchSummary = '-';
        $filterRegionalSummary = '-';
    } else if (in_array($useraccess, $allowedAccessRegional)) {
        $filterRegional = $this->session->userdata('areascope');
        $underBranch = '';
        $filterPicReport1 = '';
        $underBranchSummary = '-';
        $filterRegionalSummary = $this->session->userdata('areascope');
    } else {
        $filterRegional = '';
        $underBranch = $this->session->userdata('areascope');
        $filterPicReport1 = '';
        $underBranchSummary = $this->session->userdata('areascope');
        $filterRegionalSummary = $this->session->userdata('areascope');
    }

    $filterStartPeriod = date("Y-m-01");
    $filterEndPeriod = date("Y-m-d");
    $filterStatus = '';
}

function filterRegional($data)
{
    if ($data == '') {
        return '- all data -';
    } else {
        return $data;
    }
}

$dayList = [
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
];

function proposeCloseToCheckbox($status) {
    $data = [];
    if ($status == 1) {
        $data['status'] = 'checked';
        $data['text'] = 'Sudah diajukan <em>close</em>';
    } else {
        $data['status'] = '';
        $data['text'] = 'Ajukan <em>close</em>';
    }
    return $data;
}

function proposeCloseToBadge($status) {
    if ($status == 1) {
        return '<br><span class="badge badge-info badge-pill px-1 py-1 font-weight-normal" style="font-size: 10px;">Req. close</span>';
    } else {
        return;
    }
}


function responseRequestToText($response) {
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

function responseRequest($message) {
    $text = '<br><span class="badge badge-warning py-1 px-2" style="cursor: pointer" title="' . strip_tags($message) . '">Respon</span>';
    if ($message == NULL || $message == '') {
        return;
    } else {
        return $text;
    }
}

function integerToSentStatus($state)
{
    if ($state == 0) {
        return '<span class="btn badge badge-danger">Unsent</span>';
    } else {
        return '';
    }
}

function isresponsedBranch($st)
{
    if ($st == 0) {
        return '';
    } else {
        // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Br</small></span>';
        return '<span class="badge badge-success badge-pill">Br</span>';
    }
}

function isresponsedSass($st)
{
    if ($st == 0) {
        return '';
    } else {
        // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Sa</small></span>';
        return '<span class="badge badge-success badge-pill">Sa</span>';
    }
}


function isresponsedSasshq($st)
{
    if ($st == 0) {
        return '';
    } else {
        // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Pa</small></span>';
        return '<span class="badge badge-success badge-pill">SQ</span>';
    }
}

function isresponsedPart($st)
{
    if ($st == 0) {
        return '';
    } else {
        // return '<span class="text-success"><i class="fas fa-check-circle"></i><small>Pa</small></span>';
        return '<span class="badge badge-success badge-pill">Pc</span>';
    }
}

function isresponsedToCheckbox($st)
{
    if ($st == 0) {
        return '';
    } else {
        return 'checked';
    }
}

function disableChekbox($user, $group)
{
    if (in_array($user, $group)) {
        echo '';
    } else {
        echo 'disabled';
    }
}

function noteUnsent($note)
{
    $text = '<br><span class="text-info h4 btnToastNoteUnsent" style="cursor: pointer" data-message="'. $note .'"><i class="fas fa-info-circle" title="' . $note . '"></i></span>';
    if (strlen($note) < 2 || $note == '' || $note == NULL) {
        return;
    } else {
        return $text;
    }
}

function proposeCloseStyle($roleAccess, $allowedAccessSvchead) {
    if (in_array($roleAccess, $allowedAccessSvchead)) {
        return 'show;';
    } else {
        return 'none;';
    }

}

function orderlistchecking($val, $ref) {
    if ($val == $ref) {
        return 'checked';
    } else {
        return '';
    }
}

function allowedDropDown($useraccess, $allowedAccess) {
    if (in_array($useraccess, $allowedAccess)) {
        return '';
    } else {
        return 'readonly';
    }
}

