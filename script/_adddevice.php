<?php
header('Content-type:application/json');
session_start();
error_reporting(0);
require_once("dbconnection.php");
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$devicename = $_POST['devicename'];
$periv = $_POST['periv'];


$usererr = "";
$passerr = "";
if(empty($devicename)){
  $devicenameerr = "Device name is required";
}else{
  $devicenameerr = "";
}

$success = 0;
if($usererr == "" && $passerr == "" && $devicenameerr =="" && $periverr ==""){

    $sql = "insert into device (name) values(?)";
    $result = setData($con,$sql,[$devicename]);
    if($result){
      $success = 1;
    }
}else {
  $success = 2;
}
echo json_encode(['success'=>$success,'sent'=>$_POST,"user"=>$usererr,"pass"=>$passerr,"devicename"=>$devicenameerr,"periv"=>$periverr]);
?>