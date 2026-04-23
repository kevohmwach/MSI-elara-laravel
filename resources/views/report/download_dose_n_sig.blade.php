<?php
header("Content-Type: text/csv");
header('Content-Disposition: attach; filename=Dose_n_Sig_'.date("Y-m-d-h:i:s").'.csv');
$h = fopen("php://output", "w");
foreach($records as $data) { 
    fputcsv($h, $data);
}
fclose($h);