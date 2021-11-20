<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chap_book/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="chap_book/css/bootstrap.min.css"> -->
    <script src="chap_book/js/bootstrap.js"></script>
    <script src="chap_book/js/bootstrap.min.js"></script>
    <title>فایل های چاپی کتاب ها</title>
</head>
<body style="overflow: scroll;">
    

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">اطلاعات فایل های مربوط به کتاب های چاپی</h1>
    <p class="lead">در اینجا شما فایل های مربوط به هر سفارش را به همراه نام سفارش دهنده و نام کتاب مشاهده می کنید.</p>
    <div class="form-group">
        <a class="btn btn-info btn-large" href="https://724chap.com/iADMIN/">
            بازگشت به محیط ادمین
        </a>
    </div>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام سفارش دهنده کتابـــ</th>
      <th scope="col">نام کتابـــ</th>
      <th scope="col">آدرس فایل کتابـــ برای دانلود</th>
    </tr>
  </thead>
    <tbody>
        <?php
        $servername = "localhost";
        $username = "cp41534_dbusr";
        $password = "jvjg9UBkvV9KTH9";
        $dbname = "cp41534_original";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM ups";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $counter = 0;
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $counter ++;
                // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                $bookName = $row['bookName'];
                $personName = $row['personName'];
                $bookURL = $row['dir'];
                echo '    <tr>
                <th scope="row">'.$counter.'</th>
                <td>'.$personName.'</td>
                <td>'.$bookName.'</td>
                <td><a href="'.$bookURL.'" >دانلود فایل کتاب</a></td>
              </tr>';
            }
        } else {
            echo "<p class='alert alert-danger text-center' style='font-family: Vazir-FD !important;'>هیچ فایلی تا به حال آپلود نشده است.</p>";
        }

        $conn->close();
        ?>

  </tbody>
</table>


</body>
</html>