<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$device = $_REQUEST["d_id"];
$machine = $_REQUEST["m_id"];
$sql = "select * from measurement where d_id=? and m_id=? order by datetime";
$result = getData($con,$sql,[$device,$machine]);

$data = [];
$sub_array = [];
$rows = [];
$table['cols'] = [
  [
  'label' => 'Date Time',
  'type' => 'string'
 ],[
  'label' => 'Temperature',
  'type' => 'number'
 ],[
  'label' => 'Average',
  'type' => 'number'
 ]

];
$sql = "select avg(t1) as avg from measurement where d_id=? and m_id=?";
$avgres = getData($con,$sql,[$device,$machine]);
$avg = $avgres[0]['avg'];
foreach($result as $k=>$val){
     $sub_array[] =  array(
      "v" => date("H:m",strtotime($val['datetime'])),
     );
     $sub_array[] =  array(
      "v" => $val['t1'],
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
