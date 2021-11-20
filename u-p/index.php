<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Files Upload and Download</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.map"></script> -->
    <script src="progressbar.js"></script>
    
  </head>
  <body>
  
    <div class="container-fluid">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <h3>آپلود فایل کتابـــــ</h3>
            <input type="file" name="myfile" id="file1" onchange="uploadFile()" >
            <sub class="text-mute"><span class="text-danger">*</span> لطفا، فایل مورد نظر خود را به صورت .ZIP بارگذاری کنید.</sub> <br />
            <br />
            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
            <h4 id="status"></h4>
            <p id="loaded_n_total"></p>

          </div>
          <div class="form-group">
            <label for="bookname">نام کتابـــــ</label>
            <input type="text" name="bookname" id="bookname">
          </div>
          <div class="form-group">
            <label for="orderperson">نام سفارشـــ دهنده چاپ کتابـــــ</label>
            <input type="text" name="orderperson" id="orderperson">
          </div>
          <div class="form-group"><button type="submit" name="save" class="btn btn-secondary btn-block">آپلود کن !</button></div>
        </form>
      </div>
    </div>
  </body>
</html>