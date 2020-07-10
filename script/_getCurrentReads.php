<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
$device = $_REQUEST["d_id"];
$machine = $_REQUEST["m_id"];
$sql = "select * from measurement where d_id=? and m_id=? order by datetime Desc limit 1";
$result = getData($con,$sql,[$device,$machine]);
echo json_encode(["data"=>$result]);
?>