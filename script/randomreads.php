<?php
header('Content-type:application/json');
session_start();
require_once("dbconnection.php");

$t1 = rand(0,120); //Temperature
$h1 = rand(0,100); //Humidity
   $sql = "insert into measurement (d_id,m_id,t1,h1) values(?,?,?,?)";
   $result = setData($con,$sql,[1,1,$t1,$h1]);
   if($result == 1){
    $msg = "Temperature and Humidity recorded";
   }
echo $msg;
?>