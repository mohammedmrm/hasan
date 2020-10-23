<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
$d_id = $_REQUEST['id'];
$sql = "select * from patient where dev_id=?";
$result = getData($con,$sql,[$d_id]);
echo json_encode(['data'=>$result]);
?>