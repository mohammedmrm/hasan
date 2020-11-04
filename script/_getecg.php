<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$device = $_REQUEST["dev"];
$sql = "select * from ecg where dev_id=? order by date limit 2000";
$result = getData($con,$sql,[$device]);

$data = [];
$sub_array = [];
$rows = [];
$table['cols'] = [
  [
  'label' => 'Date Time',
  'type' => 'string'
 ],[
  'label' => 'ECG',
  'type' => 'number'
 ],[
  'label' => 'Average',
  'type' => 'number'
 ]

];
$sql = "select avg(ecg) as avg from ecg where dev_id=? order by date limit 250";
$avgres = getData($con,$sql,[$device]);
$avg = $avgres[0]['avg'];
foreach($result as $k=>$val){
     $sub_array[] =  array(
      "v" => date("H:s",strtotime($val['date'])),
     );
     $sub_array[] =  array(
      "v" => $val['ecg'],
      );
     $sub_array[] =  array(
      "v" => $avg,
      );
    $rows[] =  array(
     "c" => $sub_array
    );
    $sub_array=[];
}
$table['rows'] = $rows;
echo json_encode($table);
?>
