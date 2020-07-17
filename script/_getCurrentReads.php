<?php
header('Content-type:application/json;charset=windows-1256');
require_once("dbconnection.php");
$device = $_REQUEST["dev"];
$sql = "select * from records where dev_id=? order by datetime Desc limit 1";
$result = getData($con,$sql,[$device]);
echo json_encode(["data"=>$result]);
?>