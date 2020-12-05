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

  #ecg{
    height: 300px;
  }
  #emg{
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
   #lineemg, #lineecg {
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
.led {
  width: 20px;
  height:20px;
  border-radius: 10px;
  position: relative;
  margin: auto;
  background-color: #4F6366;
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
       <select class="form-control selectpicker" onchange="changeReads($(this).val());getPatientInfo();" data-live-search="true" id="devices">
          <option>-- select Patient --</option>
       </select>
       <input type="checkbox" id="active" value="Active Random Reads"/> Active Random Reads
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
   }
   ?> <br />
     <div class="col-md-12 dev">
     <?php
     echo "<h3 style='color:#fff;'><b>".date("Y-d-m h:i")."</b></h3>";
     ?>
    </div>
  </div>
  </div>
  <div class="col-md-9">
    <div class="row">
        <div class="col-sm-2">
            <label class="h5" id="room">Room No : </label>
        </div>
        <div class="col-sm-3">
            <label class="h5" id="name"><b></b></label>
        </div>
        <div class="col-sm-2">
            <label class="h5" id="age">Age: </label>
        </div>
        <div class="col-sm-2">
            <label class="h5" id="gender">Gender: </label>
        </div>
        <div class="col-sm-3">
            <label class="h5" id="id">Patient ID: </label>
        </div>
        <div class="col-sm-12"><hr /></div>
    </div>
    <div class="row">
        <div class="col-sm-4"><h3>Oxygen</h3>
          <div id="oxygen"></div>
        </div>
        <div class="col-sm-4"><h3>Temprture</h3>
           <div id="temperature"></div>
        </div>
        <div class="col-sm-4"><h3>Heart Beat</h3>
           <div id="beat"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
          <div class="led" id="oxled"> </div>
        </div>
        <div class="col-sm-4">
          <div class="led" id="templed"></div>
        </div>
        <div class="col-sm-4">
          <div class="led" id="beatled"></div>
        </div>
    </div>
<!--    <hr />
    <div class="row">
        <div class="col-sm-6">
          <h3>Blood Prasure: 113/78</h3>
        </div>
        <div class="col-sm-6">
           <h3>Glucose: 130</h3>
        </div>
    </div>-->
    <hr />
    <div class="row">
        <div class="col-sm-6"><h1>ECG</h1>
            <div id="ecg"></div>
        </div>
        <div class="col-sm-6"><h1>EMG</h1>
            <div id="emg"></div>
        </div>
    </div>
  </div>
  </div>
</div>
<?php include("footer.php"); ?>
 <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
 <script type="text/javascript" src="bootstrap-4.3.1-dist/js/charts.js"></script>
 <script type="text/javascript">

      google.charts.load('current', {'packages':['gauge']});
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(temperature);
      google.charts.setOnLoadCallback(oxygen);
      google.charts.setOnLoadCallback(beat);

      var gaugeOptions = {
           height: 250,yellowColor:'#FF3333',redColor:"#FF3333",
          redFrom: 37, redTo: 50,
          yellowFrom:0, yellowTo: 34,
          greenFrom:34,greenTo:37,
          minorTicks: 10 , max :50,min:20
        };
      function temperature() {
      gaugeData = new google.visualization.DataTable();
      gaugeData.addColumn('number', 'Temperture');
      gaugeData.addRows(1);
      gaugeData.setCell(0, 0,0);

      gauge = new google.visualization.Gauge(document.getElementById('temperature'));
      gauge.draw(gaugeData, gaugeOptions);

      }
      var gaugeOptions2 = {
          height: 250,redColor:"#FF3333",
          redFrom: 0, redTo: 88,
          yellowFrom:88, yellowTo: 96,
          greenFrom:96,greenTo:100,
          minorTicks: 5 , max :100
        };
      function oxygen() {
      gaugeData2 = new google.visualization.DataTable();
      gaugeData2.addColumn('number', 'Oxygen');
      gaugeData2.addRows(1);
      gaugeData2.setCell(0, 0,0);

      gauge2 = new google.visualization.Gauge(document.getElementById('oxygen'));
      gauge2.draw(gaugeData2, gaugeOptions2);

      }
      var gaugeOptions3 = {
          height: 250,yellowColor:'#FF3333',redColor:"#FF3333",
          redFrom: 110, redTo: 200,
          yellowFrom:0, yellowTo: 50,
          greenFrom:50,greenTo:110,
          minorTicks: 20 , max :200
        };
      function beat() {
      gaugeData3 = new google.visualization.DataTable();
      gaugeData3.addColumn('number', 'Heart Beat');
      gaugeData3.addRows(1);
      gaugeData3.setCell(0, 0,0);

      gauge3 = new google.visualization.Gauge(document.getElementById('beat'));
      gauge3.draw(gaugeData3, gaugeOptions3);

      }
      function changeReads(d) {
        getPatientInfo();
        $.ajax({
          url:"script/_getCurrentReads.php",
          data:{dev:d},
          success:function(res){
           //console.log(res);
           $.each(res.data,function(){
            gaugeData.setValue(0, 0, this.temp);
            gauge.draw(gaugeData, gaugeOptions);
            if(this.temp >= 37 || this.temp < 32){
              $("#templed").css('background-color','#FF0033');
              $("#templed").css('box-shadow','0px 0px 20px #FF0000');
            }else{
              $("#templed").css('background-color','#00CC00');
              $("#templed").css('box-shadow','0px 0px 20px #00CC00');
            }
            gaugeData2.setValue(0, 0, this.oxygen);
            gauge2.draw(gaugeData2, gaugeOptions2);
            if(this.oxygen < 94){
              $("#oxled").css('background-color','#FF0033');
              $("#oxled").css('box-shadow','0px 0px 20px #FF0000');
            }else{
              $("#oxled").css('background-color','#00CC00');
              $("#oxled").css('box-shadow','0px 0px 20px #00CC00');
            }

            gaugeData3.setValue(0, 0, this.beat);
            gauge3.draw(gaugeData3, gaugeOptions3);
            if(this.beat > 110 || this.beat < 60 ){
              $("#beatled").css('background-color','#FF0033');
              $("#beatled").css('box-shadow','0px 0px 20px #FF0000');
            }else{
              $("#beatled").css('background-color','#00CC00');
              $("#beatled").css('box-shadow','0px 0px 20px #00CC00');
            }
           });
          },
          error:function(e){
          console.log(e);
          }
        });
     }
     google.charts.setOnLoadCallback(lineecg);

      function lineecg(d) {
        var jsonData = $.ajax({
            url: "script/_getecg.php",
            dataType: "json",
            data:{dev:d},
            async: false,
            success:function(res){},
            error:function(res){}
            }).responseText;

        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
         var ECGoptions = {
         title:'Latest ECG Reads',
         lineWidth:1,
         legend:{position:'bottom'},
         chartArea:{width:'80%'},
          explorer: { axis: 'horizontal',maxZoomIn: 1, maxZoomOut: 8,
          actions: ['dragToZoom', 'rightClickToReset'],zoomDelta:1.5  },
          hAxis: {
            title:"Time",
            gridlines: {count: 12},title:"Time"
          },
          vAxis: {
            gridlines: {count: 12},title:"ECG"
          }
         };        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('ecg'));
        chart.draw(data,ECGoptions);
      }
      google.charts.setOnLoadCallback(lineemg);
      function lineemg(d) {
        var jsonData = $.ajax({
            url: "script/_getemg.php",
            dataType: "json",
            data:{dev:d},
            async: false,
            success:function(res){ },
            error:function(res){ }
            }).responseText;
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
         var EMGoptions = {
         title:'Latest EMG Reads',
         lineWidth:1,
         legend:{position:'bottom'},
         chartArea:{width:'80%'},
          hAxis: {
            title:"Time",
          },
          vAxis: {
            minValue: 0,
            gridlines: {count: 10},title:"EMG"
          }
         };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('emg'));
        chart.draw(data,EMGoptions);
      }
      function getDevices(){
        $.ajax({
          url:"script/_getDevicesPatient.php",
          type:"POST",
          success:function(res){
            
           $.each(res.data,function(){
             $("#devices").append(
             '<option value="'+this.id+'">'+this.patient_name+'</option>'
             );
           });
           if($("#userperiv").val() == 2){
             $("#devices").val($("#d_id").val());
             $("#devices").addClass('disabled');
             $("#devices").attr('disabled','disabled');
             setstatuses($("#devices").val());
             changeReads($("#devices").val());
             lineecg($("#devices").val());
             lineemg($("#devices").val());
           }
          },
          error:function(e){
           console.log(e);
          }
        });
      }
      getDevices();
      $("#devices").change(function(){
        changeReads($("#devices").val());
        lineemg($("#devices").val());
        lineemg($("#devices").val());
       });
      setInterval(function() {
        //randomreads();
        changeReads($("#devices").val());
        lineecg($("#devices").val());
        lineemg($("#devices").val());
        if($('input#active').is(':checked')){
         randomreads();
        }

      }, 1000);
      function randomreads(){ ///------testing function adds random reads
        $.ajax({
          url:"script/randomreads.php",
          success:function(res){

          },
          error:function(e){
           console.log(e);
          }
        });
      }
      function getPatientInfo(){
        $.ajax({
          url:"script/_getPatientInfo.php",
          data:{id:$("#devices").val()},
          success:function(res){
            //console.log(res);
            $.each(res.data,function(){
               if(this.gender == 1){
                   gender = "Male";
               }else{
                  gender = "Female";
               }
               $("#room").text('Room: '+this.id);
               $("#name").text('Name: '+this.name);
               $("#age").text('Age: '+this.age);
               $("#id").text('ID: '+this.id_card);
               $("#gender").text('Gender: '+gender);
            });
          },
          error:function(e){
           console.log(e);
          }
        })
      }
   </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.5/dat.gui.min.js"></script>
      <script>
      // Check that service workers are supported
      if ('serviceWorker' in navigator) {
         window.addEventListener('load', () => {
          navigator.serviceWorker.register('sw.js')
        });
      }
      </script>
</body>

</html>
