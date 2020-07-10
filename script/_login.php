<?php
header('Content-type:application/json;charset=windows-1256');
error_reporting(0);
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if(empty($username) || empty($password)){
  $msg = "???? ?????? ??????";
}else{
  require_once("dbconnection.php");
  $sql = "select * from admin where phone = ? or email =?";
  $result = getData($con,$sql,[$username,$username]);
  if(count($result) != 1 || !password_verify($password,$result[0]['password']) ){
    $msg = "??? ???? ???????? ?? ???? ??????";
  }else{
    $msg = 1;
    $_SESSION['login']=1;
    $_SESSION['username']=$result[0]['phone'];
    $_SESSION['userid']=$result[0]['id'];
    $_SESSION['role']=$result[0]['role'];
    $_SESSION['user_details']=$result[0];
  }
}
echo json_encode(['msg'=>$msg,"data"=>$_POST,!password_verify($password,$result[0]['password'])]);
?>