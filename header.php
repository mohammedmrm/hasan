<?php
if(!isset($_SESSION)){
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Control system</title>
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
  <script  src="bootstrap-4.3.1-dist/js/jquery-3.2.1.min.js"></script>
  <script  src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <style type="text/css">
    .header {
      background-color: #1E90FF;
      height: 100px;
    }
    body {
      overflow-y: scroll;
      font-family: 'Cairo';
      min-width: 1200px !important;
    }
    .logout {
      padding: 20px;
      padding-right: 40px;
      height: 100%;
      text-align: center;
      border-left:2px solid #669900;
    }

    .logout a{
      color: #EEEEEE;
      font-size: 20px;
    }
    body,th,td {
    }
    .logo {
      color: #FFFFFF;
      height: 100px;
      background-image: url(img/logo.png);
      background-position:right;
      background-repeat: no-repeat;
      background-size: contain;
    }
    .unilogo {
      color: #FFFFFF;
      height: 100px;
      background-image: url(img/unilogo.png);
      background-position: right;
      background-repeat: no-repeat;
      background-size: contain;
    }
    .name {
      color: #FFFFFF;
      font-size: 18px;
    }
    .list {
      height: 25px;
      background-color: #1E90FF;
      margin-bottom:5px;
      border-top: 1px #ccc solid;
      margin-top:2px;
    }
    .list ul {
      list-style: none;

    }
    .list ul li{
      float: left;
      padding-right: 10px;
      padding-top: 2px;
      padding-left: 10px;
      height: 25px;
      display: inline-block;
      border-right: 2px solid #ddd;
    }

    .list ul li a{
      color: #ddd;
    }
  </style>
</head>
<body>

  <div class="col-sm-12 header">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-2 logo" style="text-align: left"></div>
          <div class="col-sm-6" style="text-align: center;color: #FFFFFF"><h3>University of Babylon <br /> College of Engineering</h3></div>
          <div class="col-sm-2 unilogo"></div>
          <div class="col-sm-2 logout">
          <?php if(!isset($_SESSION['login'])){
          echo '<a href="login.php">Sign In</a>';
          }else{
              require_once("script/dbconnection.php");
              echo '<a href="logout.php">Sign Out</a>';
              $sql = "select * from admin where id =?";
              $res = getData($con,$sql,[$_SESSION['userid']]);
              echo "<br /><label class='name'>Wellcome, ".$res[0]['name']."</label>";
          } ?>
          </div>
        </div>
      </div>
  </div>
  <div class="col-sm-12 list">
   <ul>
    <li><a href="index.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
   </ul>
  </div>
</body>
</html>
