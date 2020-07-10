<?php
header('Content-type:application/json;charset=windows-1256');
require_once("script/dbconnection.php");
error_reporting(0);
$temp = $_REQUEST['temp']; //Temperature
$ox   = $_REQUEST['ox']; //oxygen
$beat = $_REQUEST['beat']; //heart Beat
$emg  = $_REQUEST['emg']; //EMG
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
  $sql = "select * from users where username = ? and password =sha1(?)";
  $result = getData($con,$sql,[$username,$password]);
  if(count($result) != 1){
    $msg = "Incorrect Password or Uesrname";
  }else{
    $msg = 1;
  }
}
//if login ok continue
if($msg == 1){
   $sql = "insert into records (patient_id,dev_id,oxygen,temp,beat,emg,ecg) values(?,?,?,?,?,?,?)";
   $result = setData($con,$sql,[$patient,$dev,$ox,$temp,$emg,$ecg]);
   if($result == 1){
    $msg = "Temperature and Humidity recorded";
   }
   //------------------------------------------------
   //moving old recorded data to a file
   date_default_timezone_set('Asia/Baghdad');
   $cerrntdatetime = date('Y-m-d H:i:s');
   $sql = "select * from records where TIMESTAMPDIFF(HOUR,datetime,?) >= 24";
   $result = getData($con,$sql,[$cerrntdatetime]);
   //print_r($result);
   $file ="oldrecord/".date('Y-m-d').'.txt';
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
        $sql = "delete from measurement where TIMESTAMPDIFF(HOUR,datetime,?) >= 24";
        $result = setData($con,$sql,[$cerrntdatetime]);
      }
   }
   //----------------------------------------------------
   echo json_encode(['msg'=>$msg]);
}else{
  echo json_encode(['msg'=>$msg]);
}

?>