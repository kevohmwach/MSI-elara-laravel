<?php
header("Content-Type: text/csv");
header('Content-Disposition: attach; filename='.$fileName.'_'.date("Y-m-d-h:i:s").'.csv');
$h = fopen("php://output", "w");
foreach($records as $data) { 
    fputcsv($h, $data);
}
fclose($h);