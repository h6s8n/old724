function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile() {
    var file = _("file1").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "filesLogic.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url
    ajax.send(formdata);
  }
  
  function progressHandler(event) {
    _("loaded_n_total").innerHTML = "آپلود شده " + event.loaded + " از " + event.total + " بایت";
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% در حال آپلود فایل کتاب... لطفا صبر کنید";
  }
  
  function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    // _("progressBar").value = 0; //wil clear progress bar after successful upload
  }
  
  function errorHandler(event) {
    _("status").innerHTML = "آپلود انجام نشده است";
  }
  
  function abortHandler(event) {
    _("status").innerHTML = "از آپلود فایل کتاب جلوگیری به عمل آمده است.";
  }