<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");

$sql = "select * from device where id not in (select dev_id from patient)";
$result = getData($con,$sql);
echo json_encode(['data'=>$result]);
?>