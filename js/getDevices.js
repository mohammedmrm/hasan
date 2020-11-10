function getDevices(elem) {
  $.ajax({
    url: "script/_getDevices.php",
    type: "POST",
    success: function (res) {
      elem.html("");
      elem.append('<option value="">... Select ...</option>');
      $.each(res.data, function () {
        elem.append(
          '<option value="' + this.id + '">' + this.name + "</option>"
        );
      });
      console.log(res);
    },
    error: function (e) {
      elem.append(
        "<option value='' class='bg-danger'>خطأ اتصل بمصمم النظام</option>"
      );
      console.log(e);
    },
  });
}
