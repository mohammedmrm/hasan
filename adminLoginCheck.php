<?php
if(!isset($_SESSION)){
  session_start();
}
if(!empty($_SESSION['login']) && !empty($_SESSION['userid'])){
  require_once('script/dbconnection.php');
  $sql= "select * from users where user_id=?";
  $result = getData($con,$sql,[$_SESSION['userid']]);
  if($result['0']['periv'] != 1){
    header('location:login.php');
  die();
  }
}
?>