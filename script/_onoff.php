<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
$fstatus = $_REQUEST["f"];
$lstatus = $_REQUEST["l"];
$ssstatus = $_REQUEST["ss"];
$scstatus = $_REQUEST["sc"];
$device = $_REQUEST["d_id"];
$machine = $_REQUEST["m_id"];
$sql1 = "update control set status=? where d_id=? and m_id=? and name='f'";
$result = setData($con,$sql1,[$fstatus,$device,$machine]);

$sql2 = "update control set status=? where d_id=? and m_id=? and name='l'";
$result2 = setData($con,$sql2,[$lstatus,$device,$machine]);

$sql3 = "update control set status=? where d_id=? and m_id=? and name='ss'";
$result3 = setData($con,$sql3,[$ssstatus,$device,$machine]);

$sql4 = "update control set status=? where d_id=? and m_id=? and name='sc'";
$result4 = setData($con,$sql4,[$scstatus,$device,$machine]);

echo json_encode(["fan"=>$result,"light"=>$result2,"ss"=>$result3,'sc'=>$scstatus,$_POST]);
?>