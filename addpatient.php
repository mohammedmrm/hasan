<?php include("loginCheck.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Control</title>
  <style>
  body {
    overflow-x: hidden;
  }

  .dev {
    background-color: #1E90FF;
    padding: 10px;

  }
  .dev label {
    color: #EEEEEE;
    font-size: 20px;
  }

  .hr {
    border: 2px solid red;
  }

  #temperature{
    height: 300px;
  }
  #humidity{
    height: 300px;
  }

  .gauge {
    //border-left: 2px #BBBBBB solid;
    //border-right: 2px #BBBBBB solid;
  }
  .onoff {
    margin-bottom: 10px;
  }

  .alarmlabel{
    font-size: 20px;
  }

  .alarmlightg{
    display: inline-block;
    height: 25px;
    width: 25px;
    border-radius: 300px;
    background-color: #339900;
    box-shadow: 0px 0px 10px #33FF00;
  }
@keyframes alarm {
  0%   {box-shadow: 0px 0px 1px #FF3300;background-color: #aa0000;}
  25%  {box-shadow: 0px 0px 5px #FF3300;background-color: #ff0000;}
  50%  {box-shadow: 0px 0px 10px #FF3300;background-color: #aa0000;}
  100% {box-shadow: 0px 0px 15px #FF3300;background-color: #ff0000;}
}
@keyframes spin {
  0%   {transform: rotate(0deg)}
  8.3%  {transform: rotate(30deg)}
  16.6%  {transform: rotate(60deg)}
  24.9% {transform: rotate(90deg)}
  33.2% {transform: rotate(120deg)}
  41.5% {transform: rotate(150deg)}
  49.8% {transform: rotate(180deg)}
  58.1% {transform: rotate(210deg)}
  66.4% {transform: rotate(240deg)}
  74.7% {transform: rotate(270deg)}
  83% {transform: rotate(300deg)}
  91.3% {transform: rotate(330deg)}
  98% {transform: rotate(360deg)}
  100% {transform: rotate(0deg)}
}
    .leftlist {
      border-right:3px #666666  solid;
      left: 0px;
      padding: 15px;
    }

   .alarmlightr{
    display: inline-block;
    height: 25px;
    width: 25px;
    border-radius: 300px;
    background-color: #CC0000;
    animation-name: alarm;
    animation-iteration-count: infinite;
    animation-duration: 0.8s;
  }
  .spin {
    animation-name: spin;
    animation-iteration-count: infinite;
    animation-duration: 0.5s;
    color: #33CC00;
  }

  #thh, #tht{
    display: block;
    height: 40px;
    text-align: center;
    font-size: 25px;
    background-color: #000000;
    color: #FFFFFF;
    padding: 5px;
  }
  #systemconnection {
    display: block;
    height: 40px;
    text-align: center;
    font-size: 25px;
    padding: 5px;
  }

  .thresholds {
    cursor: pointer;
  }
   #linehumi, #linetemp {
     min-height: 350px;
   }

  .sys{
    text-align: center;
    padding-top: 100px;
  }
  .sys button {
    width: 150px;
    border-radius: 10px;
    height: 40px;
  }
   #systemstatus {
     display: block;
     width: 100%;
     height: 50px;
     padding: 8px;
     color: #FFFFFF;
     position: relative;
     font-size: 18px;
     background-color: #FF9900;
     cursor: pointer;
     border-left: 8px solid #888888;
   }
   #fan , #light , #alarm {
     display: block;
     width: 100%;
     height: 50px;
     padding: 10px;
     color: #FFFFFF;
     position: relative;
     font-size: 18px;
     background-color: #FF9900;
     cursor: pointer;
     text-align: center;
   }
  .onoff label {
    font-size: 18px;
     width: 100%;
     height: 50px;
     padding: 8px;
  }
  .lighton {
    color: #F0DF0F;
    text-shadow: 0px 0px 20px #FFFF00;

  }
  .alarmon {
    color: #FF0000;
    text-shadow: 0px 0px 10px #CC0000;

  }
  .adminlist {
    position: relative;
    list-style: none;
    display: block;
    width:100%;
    padding: 0px;
    border-bottom: 2px red solid
  }
  .adminlist li {
    display: block;
    height: 50px;
    width:100%;

  }

  .adminlist li a {
    color: #fff;
    display: block;
    height: 100%;
    font-size: 20px;
    padding: 10px;
    text-decoration: none;
  }
  .adminlist li a:hover {
    color: #123;
  }

canvas {
  width: 100%;
  height: 150px;
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 0;
  background:transparent;
}
 #ecg {
   background-color: #222222;
 }

  </style>
  </head>

<body>
<?php include("header.php"); ?>
<div class="col-md-12">
  <div class="row">
  <div class="col-md-3">
  <div class="leftlist">
   <div class="col-md-12 dev">
     <div class="form-group">
       <label class="col-sm-4"> Patient </label>
       <select class=" form-control selectpicker" data-live-search="true" id="devices">
          <option>-- select Patient --</option>
       </select>
     </div>
   </div>
   <div class="col-md-12">
   <hr class="hr"/>
   </div>
   <?php
   if($_SESSION['login'] == 1){
   ?>
   <div class="col-md-12 dev">
     <ul class="adminlist">
        <li><a href="addpatient.php">Add new Patient</a></li>
        <li><a href="adddoctor.php">Add new Doctor</a></li>
        <li><a href="adddevice.php">Add Device</a></li>
     </ul>
   </div>
   <?php
      echo "<input type='hidden' id='' value='1'/>";
   }?>
  </div>
  </div>
  <div class="col-md-9">
  <div class="container">
    			  <div class="row">
    				<div class="col-md-12">
        				<div class="panel-heading">
        	               <div class="panel-title text-center">
        	               		<h1 class="title">Add patient</h1>
        	               		<hr />
        	               	</div>
        	            </div>
    	            </div>
	            </div>
                <div class="row">
					<form class="form-horizontal col-12" method="post" id="installfrom">
                        <div class="row">
                        <div class="col-6">
                        <div class="form-group">
							<label for="name" class="control-label">Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Full Name"/>
								</div>
							</div>
                            <label for="name" class="control-label text-danger" id="name_err"></label>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Phone Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone" id="phone"  placeholder="phone"/>
								</div>
							</div>
						    <label for="name" class="control-label text-danger" id="phone_err"></label>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Age</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon">Age</span>
									<input type="text" class="form-control" name="age" id="age"  placeholder="Age"/>
								</div>
							</div>
						    <label for="name" class="control-label text-danger" id="phone_err"></label>
						</div>
				</div>
				<div class="col-6">
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">ID</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon">ID</span>
									<input type="text" class="form-control" name="id" id="id"  placeholder=""/>
								</div>
							</div>
						    <label for="name" class="control-label text-danger" id="phone_err"></label>
						</div>
						<div class="form-group">
							<label for="birthdate" class="cols-sm-2 control-label">Birthdate</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="birthdate" id="birthdate"  placeholder="كلمة المرور"/>
								</div>
							</div>
						    <label for="name" class="control-label text-danger" id="password_err"></label>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Select Device</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-text input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <select class="form-control" name="device_id" id="device">
                                     <option>--- select --- </option>
                                    </select>
                                </div>
							</div>
						    <label for="name" class="control-label text-danger" id="confirm_err"></label>
						</div>
						</div>
						</div>
						<div class="form-group ">
							<button onclick="addpatient()" type="button" class="btn btn-primary btn-lg btn-block login-button">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
  </div>
  </div>
<?php include("footer.php"); ?>
 <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.5/dat.gui.min.js"></script>
<script src="js/getDevices.js"></script>
<script type="text/javascript">

getDevices($("#device"));
function addpatient(){
    var myform = document.getElementById('installfrom');
    var fd = new FormData(myform);
  $.ajax({
    url:"script/_addpatient.php",
    type:"POST",
    data:fd,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
   	cache: false,
    beforeSend:function(){

    },
    success:function(res){
      console.log(res);
       if(res.success == 1){
         $("#addStaffForm input").val("");
         Toast.success('تم الاضافة');
         getStaff($("#staffTable"));
         window.location.href = "login.php";
         $("#staffTable input").val("");
       }else{
           $("#name_err").text(res.error["name_err"]);
           $("#phone_err").text(res.error["phone_err"]);
           Toast.warning("هناك بعض المدخلات غير صالحة",'خطأ');
       }

    },
    error:function(e){
     console.log(e);
     Toast.error('خطأ');
    }
  });
}


    </script>
</body>

</html>
