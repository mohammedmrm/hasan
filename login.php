<?php
session_start();
require("script/dbconnection.php");
$sql = "select id from admin";
$res = getData($con,$sql);
if(count($res) <= 0){
   header("location: install.php");
   die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>
<?php include("header.php"); ?>
<div class="container">
 <div class="row">
  <div class="col-md-12 body">
    <div class="row">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>
                    <div style="padding-top:30px" class="panel-body" >
                        <div  id="login-alert" class="text-danger col-sm-12"></div>
                           <form id="loginform" class="form-horizontal" role="form">

                                 <div style="margin-bottom: 25px" class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Uesrname">
                                  </div>
                                  <div style="margin-bottom: 25px" class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                      <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                                  </div>
                                  <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" onclick="login()" class="btn btn-success">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
	</div>
	</div>
  </div>
 </div>
</div>
<?php include("footer.php"); ?>
<script>
function login(){
  $.ajax({
     url:"script/_login.php",
     type:"post",
     data: $("#loginform" ).serialize(),
     beforeSend:function(){
     },
     success:function(res){
       console.log(res);
       $("#login-alert").text(res.msg);
       if(res.msg == 1){
         window.location.href = "index.php";
       }
     },
     error:function(e){
      console.log(e);
     }
  });
}
</script>
</body>

</html>
