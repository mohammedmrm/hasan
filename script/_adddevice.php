<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$devicename = $_POST['devicename'];
$periv = $_POST['periv'];

$sql = "select * from users where username=?";
$result = getData($con,$sql,[$user]);
if(count($result) == 1){
  $usererr = "Username already used";
}else{
  $usererr = "";
}
if(empty($pass)){
  $passerr = "Password is required";
}else{
  $passerr = "";
}
if(empty($devicename)){
  $devicenameerr = "Device name is required";
}else{
  $devicenameerr = "";
}
if ($periv != 1  && $periv != 2){
  $periverr = "Uknown privilege";
}else {
  $periverr = "";
}
$success = 0;
if($usererr == "" && $passerr == "" && $devicenameerr =="" && $periverr ==""){
  $sql = "insert into users (username,password,email,periv) values(?,sha1(?),?,?)";
  $result = setData($con,$sql,[$user,$pass,$email,$periv]);
  if($result){
    $sql ="select * from users where username = ? ";
    $res = getData($con,$sql,[$user]);

    $sql = "insert into devices (name,user_id) values(?,?)";
    $result = setData($con,$sql,[$devicename,$res[0]['user_id']]);
    if($result){
      $sql ="select * from devices where user_id = ? ";
      $res2 = getData($con,$sql,[$res[0]['user_id']]);
      $query ="insert into control (name,status,d_id,m_id) values(?,?,?,?)";
      $result = setData($con,$query,['h2',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['h3',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['h4',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['t2',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['t3',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['t4',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['b',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['d',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['f',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['l',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['ss',0,$res2[0]['d_id'],1]);
      $result = setData($con,$query,['sc',0,$res2[0]['d_id'],1]);

      $result = setData($con,$query,['h2',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['h3',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['h4',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['t2',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['t3',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['t4',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['b',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['d',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['f',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['l',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['ss',0,$res2[0]['d_id'],2]);
      $result = setData($con,$query,['sc',0,$res2[0]['d_id'],2]);
      $success = 1;
    }
  }
}else {
  $success = 2;
}
echo json_encode(['success'=>$success,'sent'=>$_POST,"user"=>$usererr,"pass"=>$passerr,"devicename"=>$devicenameerr,"periv"=>$periverr]);
?>