<?php
if(!isset($_SESSION)){
  session_start();
}
$_SESSION['college'] = "";
$_SESSION['login']="";
$_SESSION['username']="";
$_SESSION['userid']="";
session_destroy();
header('location:login.php');
?>