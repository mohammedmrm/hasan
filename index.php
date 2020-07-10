<?php include("loginCheck.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Patient Montring System</title>
  <link rel="manifest" href="pwa/manifest.webmanifest">
  <style>
  body {
    overflow-x: hidden;
  }

  .dev {
    background-color: #006666;
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
  height: 200px;
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
       <select class="form-control selectpicker" data-live-search="true" id="devices">
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
        <li><a href="add.php">Assign Patient and devices</a></li>
     </ul>
   </div>
   <?php
      echo "<input type='hidden' id='' value='1'/>";
   }?>
  </div>
  </div>
  <div class="col-md-9">
    <div class="row">
        <div class="col-sm-2">
            <label class="h3">Room No : 123</label>
        </div>
        <div class="col-sm-3">
            <label class="h3"><b>Ahmed Ali Kadhim</b></label>
        </div>
        <div class="col-sm-3">
            <label class="h3">Age: 34</label>
        </div>
        <div class="col-sm-4">
            <label class="h3">Patient ID: AAK12987655789G</label>
        </div>
        <div class="col-sm-12"><hr /></div>
    </div>
    <div class="row">
        <div class="col-sm-6"><h1>ECG</h1>
            <canvas id="ecg"></canvas>
        </div>
        <div class="col-sm-6"> <h1>Patient Report </h1>
           <div class="colsm-6">
             <h3><label>Blood Prasure</label>
             <label>113/78</label></h3>
           </div>
           <div class="colsm-6">
             <h3><label>glucose</label>
             <label>130</label></h3>
           </div>
           <div class="colsm-6">
             <h3><label>Body Temprature</label>
             <label>36</label></h3>
           </div>
           <div class="colsm-6">
             <h3><label>Heart beat</label>
              <label>66</label> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></h3>
           </div>

        </div>
    </div>
  </div>
  </div>
</div>
<?php include("footer.php"); ?>
 <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.5/dat.gui.min.js"></script>
      <script>
      // Check that service workers are supported
      if ('serviceWorker' in navigator) {
         window.addEventListener('load', () => {
          navigator.serviceWorker.register('sw.js')
        });
      }
      </script>
  <script type="text/javascript">

            var canvas = document.getElementById("ecg");
            var ctx = canvas.getContext("2d");
            ctx.fillStyle = "#FFFFFF";
            ctx.fill();

            var n = 1;
            var data = [
                148, 149, 149, 150, 150, 150, 143, 82, 82, 82, 123, 82, 82, 82,
                148, 149, 149, 150, 150, 150, 143, 82, 82, 82, 82, 82, 82, 82,
                148, 43, 149, 150, 150, 150, 143, 311, 82, 123, 82, 82, 82, 82,
                144, 149, 149, 150, 150, 34, 12, 21, 82, 82, 82, 82, 82, 82,
                142, 149, 149, 534, 150, 150, 143, 82, 82, 82, 82, 82, 82, 82,
                148, 149, 149, 150, 150, 123, 143, 82, 82, 82, 82, 82, 82, 82,
                13, 149, 212, 231, 150, 150, 143, 82, 82, 234, 432, 82, 82, 82,
                675, 149, 149, 150, 150, 150, 143, 82, 82, 82, 82, 82, 82, 82,
                65, 149, 149, 150, 150, 150, 143, 82, 82, 82, 82, 82, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 150, 150, 150, 143, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 112, 150, 133, 100, 82, 82, 111, 32, 65, 82, 82,
                45, 149, 149, 111, 155, 150, 100, 82, 182, 111, 32, 65, 82, 82,
                45, 149, 149, 111, 155, 150, 100, 82, 182, 111, 32, 65, 82, 82,
                 ];


            drawWave();

            function drawWave() {
                setTimeout(function() {
                    requestAnimationFrame(drawWave);
                    ctx.lineWidth = "1";
                    ctx.strokeStyle = '#FFFFFF';

                    // Drawing code goes here
                n += 1;
                if (n >= data.length) {
                    n = 1;
                }
                ctx.beginPath();
                ctx.moveTo(n - 1, data[n - 1]);
                ctx.lineTo(n, data[n]);
                ctx.stroke();

                ctx.clearRect(n+1, 0, 10, canvas.height);

                }, 100 );
            }
    </script>
</body>

</html>
