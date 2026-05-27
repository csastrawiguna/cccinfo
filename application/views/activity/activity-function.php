<?php

$allowedAccess = [1, 9];
$allowedAccessWithBranch = [1, 3, 4, 5, 6, 9];

if (!$this->input->post('activityDailyDateStart')) {
    $summaryStartPeriod = date("Y-m-01", strtotime("-85 days"));
    $summaryEndPeriod = date("Y-m-d");
} else {
    $summaryStartPeriod = date("Y-m-01", strtotime($this->input->post('activityDailyDateStart')));
    $summaryEndPeriod = date("Y-m-d", strtotime($this->input->post('activityDailyDateEnd')));
}

if (!$this->input->post('detailDailySelectMonth')) {
    $detailSelectMonth = date("Y-m-01");
} else {
    $detailSelectMonth = date("Y-m-01", strtotime($this->input->post('detailDailySelectMonth')));
}