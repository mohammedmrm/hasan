<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
$device = $_REQUEST["dev"];
$sql = "select * from records where dev_id=? order by datetime Desc limit 1";
$result = getData($con,$sql,[$device]);
$sql = "select * from oxygen where dev_id=? order by datetime Desc limit 1";
$result1 = getData($con,$sql,[$device]);
$sql = "select * from temp where dev_id=? order by datetime Desc limit 1";
$result2 = getData($con,$sql,[$device]);
$sql = "select * from beat where dev_id=? order by datetime Desc limit 1";
$result3 = getData($con,$sql,[$device]);
$result[0]['oxygen'] = $result1[0]['oxygen'];
$result[0]['temp'] = $result1[0]['temp'];
$result[0]['beat'] = $result1[0]['beat'];
echo json_encode(["data"=>$result]);
?>