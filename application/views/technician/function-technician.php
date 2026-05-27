<?php 

function phoneToBreakline($data, $remark)
{
    if ($data == '') {
        echo "";
    } else {
        echo '<br>' . $data . ' ' . '<small>' . $remark . '</small>';
    }
}

function toStringDate($date){
    if(strtotime($date) < 0 || $date == NULL || $date == 'NULL'){
      return '-';
    } else {
      return date("d-M-Y h:i",strtotime($date));
    }
}

if ($this->input->post('technicianSelectTechnicianByBranch') == false) {
    $selectedBranch =  " - semua SVC center - ";
    $selectedType =  "- all - ";
} else {
    $selectedBranch = $this->input->post('technicianSelectTechnicianByBranch');
    $selectedType = $this->input->post('technicianSelectServiceType');
}

function valToState($val) {
    if(strtolower($val) == 'active') {
        return 'checked';
    } else {
        return '';
    }   
}

function remark2icon($remark) {
    if (strtolower($remark) == 'call & whatsapp') {
        return '<span class="badge badge-primary" style="font-weight: normal;"><i class="fas fa-phone"></i> <i class="fab fa-whatsapp"></i></span>';
    } else if (strtolower($remark) == 'call only') {
        return '<span class="badge badge-dark" style="font-weight: normal;"><i class="fas fa-phone"></i></span>';
    } else if (strtolower($remark) == 'whatsapp only') {
        return '<span class="badge badge-success" style="font-weight: normal;"><i class="fab fa-whatsapp"></i></span>';
    } else if (strtolower($remark) == 'inactive') {
        return '<i class="text-danger fas fa-times-circle"></i>';
    } else {
        return '';
    }
}

$allowedAccess = [1, 9];

?>