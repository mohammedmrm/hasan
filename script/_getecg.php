<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$device = $_REQUEST["dev"];
$sql = "select * from records where dev_id=? order by datetime";
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
$sql = "select avg(ecg) as avg from records where dev_id=?";
$avgres = getData($con,$sql,[$device]);
$avg = $avgres[0]['avg'];
foreach($result as $k=>$val){
     $sub_array[] =  array(
      "v" => date("H:s",strtotime($val['datetime'])),
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
