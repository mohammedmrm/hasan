<?php
header('Content-type:application/json');
session_start();
$d= $_REQUEST['d'];
//$m= $_REQUEST['m'];
require_once("script/dbconnection.php");
$array = [];
$sql = "select * from control where d_id=? and  m_id=1";
$result = getData($con,$sql,[$d]);
foreach ($result as $k=>$v){
   $array['m1'][$v['name']]=$v['status'];
}
$sql = "select * from control where d_id=? and  m_id=2";
$result = getData($con,$sql,[$d]);
foreach ($result as $k=>$v){
   $array['m2'][$v['name']]=$v['status'];
}
echo json_encode($array);
?>