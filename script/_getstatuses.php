<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$device = $_REQUEST["d_id"];
$machine = $_REQUEST["m_id"];
$sql = "select * from control where d_id=? and m_id=?";
$result = getData($con,$sql,[$device,$machine]);
echo json_encode(['data'=>$result]);
?>