<?php include("loginCheck.php");?>
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
      <form class="col-12" id="adddevice">
      <fieldset>

      <!-- Form Name -->
      <legend>Add New Device</legend>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="devicename">Device Name</label>
        <div class="col-md-4">
        <input id="devicename" name="devicename" type="text" placeholder="" class="form-control input-md">
        </div>
         <label class="control-label text-danger" id="devicenameerr" ></label>
      </div>
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="add">Add</label>
        <div class="col-md-4">
          <button id="add" type="button" name="add" onclick="adddevice()" class="btn btn-primary">Add </button>
        </div>
      </div>

      </fieldset>
      </form>

    </div>
  </div>
 </div>
</div>
<?php include("footer.php"); ?>
<script>
function adddevice(){
  $.ajax({
     url:"script/_adddevice.php",
     type:"post",
     data: $("#adddevice" ).serialize(),
     beforeSend:function(){
       $("#usererr").text("");
       $("#passerr").text("");
       $("#devicenameerr").text("");
       $("#periverr").text("");
     },
     success:function(res){
     console.log(res);
     if(res.success != 1){
       $("#usererr").text(res.user);
       $("#passerr").text(res.pass);
       $("#devicenameerr").text(res.devicename);
       $("#periverr").text(res.periv);
     }else{
       $("#usererr").text("");
       $("#passerr").text("");
       $("#devicenameerr").text("");
       $("#periverr").text("");
       alert("New device added");
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
