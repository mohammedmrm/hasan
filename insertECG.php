<?php
header('Content-type:application/json;charset=windows-1256');
require_once("script/dbconnection.php");
error_reporting(0);
$ecg  = $_REQUEST['ecg']; //ECG


$username = $_REQUEST['u']; //usersname
$password = $_REQUEST['p']; //password

$dev = $_REQUEST['dev']; //device id
$patient= $_REQUEST['patient']; //device id

$msg = 'error';
// checking usernsme and password
if(empty($username) || empty($password)){
  $msg = "All Fields are required";
}else{

  $sql = "select * from admin where email = ? ";
  $result = getData($con,$sql,[$username]);
  if(count($result) != 1 || !password_verify($password,$result[0]['password']) ){
    $msg = "Incorect Username Or Password";
  }else{
    $msg = 1;
    $_SESSION['login']=1;
    $_SESSION['username']=$result[0]['phone'];
    $_SESSION['userid']=$result[0]['id'];
    $_SESSION['role']=$result[0]['role'];
    $_SESSION['user_details']=$result[0];
  }
}
//if login ok continue
if($msg == 1){
  foreach ($ecg as $ec){
   $sql = "insert into ecg (patient_id,dev_id,ecg) values(?,?,?)";
   $result = setData($con,$sql,[$patient,$dev,$ec]);
   if($result == 1){
    $msg = "data recorded";
   }
  }

   //------------------------------------------------
   //moving old recorded data to a file
   date_default_timezone_set('Asia/Baghdad');
   $cerrntdatetime = date('Y-m-d H:i:s');
   $sql = "select * from ecg where TIMESTAMPDIFF(HOUR,date,?) >= 24";
   $result = getData($con,$sql,[$cerrntdatetime]);
   //print_r($result);
   $file ="oldrecord/".date('Y-m-d').'-ECG.txt';
   $fh = fopen($file, 'a');
   if($fh && count($result) > 0 ){
      $content = file_get_contents($file);
      $array1 = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/','', $content), true);
      if(!empty($array1)){
      $merg = array_merge($array1,$result);
      }else{
        $merg = $result;
      }
      $newdata = json_encode($merg);
      if(fwrite($fh,$newdata)){
        $sql = "delete from ecg where TIMESTAMPDIFF(HOUR,date,?) >= 24";
        $result = setData($con,$sql,[$cerrntdatetime]);
      }
   }
   //----------------------------------------------------
  echo json_encode(['msg'=>$msg]);
}else{
  echo json_encode(['msg'=>$msg]);
}

?>