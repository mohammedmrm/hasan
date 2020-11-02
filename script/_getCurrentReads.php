<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
error_reporting(0);
$device = $_REQUEST["dev"];
$sql = "select * from records where dev_id=? order by datetime Desc limit 1";
$result = getData($con,$sql,[$device]);
$sql = "select * from oxygen where dev_id=? order by date Desc limit 1";
$result1 = getData($con,$sql,[$device]);
$sql = "select * from temp where dev_id=? order by date Desc limit 1";
$result2 = getData($con,$sql,[$device]);
$sql = "select * from beat where dev_id=? order by date Desc limit 1";
$result3 = getData($con,$sql,[$device]);
$result[0]['oxygen'] = $result1[0]['oxygen'];
$result[0]['temp'] = $result2[0]['temp'];
$result[0]['beat'] = $result3[0]['beat'];
echo json_encode(["data"=>$result]);
?>