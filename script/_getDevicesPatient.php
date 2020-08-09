<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");

$sql = "select device.*,patient.name as patient_name from device inner join patient on patient.dev_id = device.id";
$result = getData($con,$sql);
echo json_encode(['data'=>$result]);
?>