<?php
if(!isset($_SESSION)){
  session_start();
}
if(!empty($_SESSION['login']) && !empty($_SESSION['userid'])){
  require_once('script/dbconnection.php');
  $sql= "select * from admin where id=?";
  $result = getData($con,$sql,[$_SESSION['userid']]);
  if(count($result) != 1){
    header('location:login.php');
  die();
  }
}else{
  header('location:login.php');
  die();
}
?>