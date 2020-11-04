<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$device = $_REQUEST["dev"];
$sql = "select * from (select * from  emg where dev_id=? order by date DESC limit 150) sub  order by id ASC";
$result = getData($con,$sql,[$device]);

$data = [];
$sub_array = [];
$rows = [];
$table['cols'] = [
  [
  'label' => 'Date Time',
  'type' => 'string'
 ],[
  'label' => 'EMG',
  'type' => 'number'
 ],[
  'label' => 'Average',
  'type' => 'number'
 ]

];
$sql = "select * from (select avg(emg) as avg from emg where dev_id=? order by id DESC limit 150) sub";
$avgres = getData($con,$sql,[$device]);
$avg = $avgres[0]['avg'];
foreach($result as $k=>$val){
     $sub_array[] =  array(
      "v" => date("H:s",strtotime($val['date'])),
     );
     $sub_array[] =  array(
      "v" => $val['emg'],
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
