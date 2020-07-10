<?php
header('Content-type:application/json;charset=windows-1256');
require_once("script/dbconnection.php");
error_reporting(0);
$t1 = $_GET['t1']; //Temperature
$t2 = $_GET['t2']; //Temperature Threashold
$t3 = $_GET['t3']; // High Temperature
$t4 = $_GET['t4'];  // Low Temperature

$h1 = $_GET['h1']; //Humidity
$h2 = $_GET['h2']; //Humidity Threashold
$h3 = $_GET['h3'];  // High Humidity
$h4 = $_GET['h4'];  //Low Humidity

$ss = $_GET['ss'];  //system status
$sc = $_GET['sc'];  // system connection

$b = $_GET['b']; //belt status
$f = $_GET['f'];   // fan status
$d = $_GET['d'];   // door status
$l = $_GET['l'];  // light status

$username = $_GET['u']; //usersname
$password = $_GET['p']; //password

$dev = $_GET['dev']; //device id
$m = $_GET['m'];     //machine 1 or 2
$msg = 'error';
// checking usernsme and password

//if login ok continue
if(true){


   //----------------------------------------------------
   // update diveces status like the fan , belt and etc...
   $sql = "update control set status = ? where name=? and d_id=? and m_id=?";

   if(!empty($h3)){
    $r2 = setData($con,$sql,[$_GET['h3'],'h3',$dev,$m]);
    if($r2){
      $msg .= "h3";
    }
   }
   if(!empty($h4)){
    $r3 = setData($con,$sql,[$h4,'h4',$dev,$m]);
    if($r3){
      $msg .= "h4";
    }
   }
   if(!empty($t2)){
    $r4 = setData($con,$sql,[$t2,'t2',$dev,$m]);
    if($r4){
      $msg .= "t2";
    }
   }
   if(!empty($t3)){
    $r5 = setData($con,$sql,[$t3,'t3',$dev,$m]);
    if($r5){
      $msg .= "t3";
    }
   }
   if(!empty($t4)){
    $r6 = setData($con,$sql,[$t4,'t4',$dev,$m]);
   if($r6){
      $msg .= "t4";
    }
   }

   if(!empty($f){
    $r7 = setData($con,$sql,[$f,'f',$dev,$m]);
   if($r7){
      $msg .= "f";
    }
   }
   if(!empty($d)){
    $r8 = setData($con,$sql,[$d,'d',$dev,$m]);
   if($r8){
      $msg .= "d";
    }
   }
   if(!empty($l)){
    $r9 = setData($con,$sql,[$l,'l',$dev,$m]);
   if($r9){
      $msg .= "l";
    }
   }
   if(!empty($b)){
    $r10 = setData($con,$sql,[$b,'b',$dev,$m]);
   if($r10){
      $msg .= "b";
    }
   }

   if(!empty($ss)){
    $r11 = setData($con,$sql,[$ss,'ss',$dev,$m]);
   if($r11){
      $msg .= "ss";
    }
   }
   if(!empty($sc)){
    $r12 = setData($con,$sql,[$sc,'sc',$dev,$m]);
   if($r12){
      $msg .= "sc";
    }
   }
   echo json_encode(['msg'=>$msg]);
}else{
  echo json_encode(['msg'=>$msg]);
}
print_r($_GET);
?>