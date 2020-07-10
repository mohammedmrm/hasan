<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$new = $_REQUEST['threshold'];
$device = $_REQUEST["d_id"];
$machine = $_REQUEST["m_id"];
$msg = "";
if($new >= 0 ){
  $sql = "update control set status = ? where name='t2' and d_id=? and m_id=?";
  $result = setData($con,$sql,[$new,$device,$machine]);
  if($result == 1){
    $msg = "updated";
  }else {
    $msg = "no updated";
  }
}else {
  $msg = "Invaild Threshold";
}
echo json_encode(['msg'=>$msg])
?>