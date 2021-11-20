<?php
// connect to the database
$conn = mysqli_connect('localhost', 'cp41534_dbusr', 'jvjg9UBkvV9KTH9', 'cp41534_original');
// mysqli_set_charset('utf8',$conn);
$sql = "SELECT * FROM ups";


// $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo $name_uploaded = $files['name'];
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../u53rUpl0ad55/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $personName = $_POST['orderperson'];
    $bookName = $_POST['bookname'];
    // Date Time : 
    date_default_timezone_set("Asia/Tehran");
    $dateUP = date("Y/m/d") . " | " .date("h:i:sa");
    // 
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "<p class='alert alert-danger' id='notup'>فایل شما آپلود نشد ... </p>";
        echo "<p id='alert-warning' class='alert alert-warning'>فایل انتخابی شما باید یکی از موارد مقابل باشد : .ZIP | .PDF | .DOCX</p>";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "حجم فایل بسیار بالاست.";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $drift = "SELECT * FROM ups WHERE `name`='".$filename."' ";
            $result = mysqli_query($conn, $drift);
            if ($result->num_rows > 0) {
                echo '<p id="failed" class="alert alert-danger" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
              </svg>فایل انتخاب شده کتاب قبلا بارگذاری شده است. مجددا نیاز به بارگذاری فایل نیست.</p>';
              } else {
                $conn->set_charset("utf8");
                $sql = "INSERT INTO `ups` (`personName`,`bookName`,`name`, `dir`, `dateUP`) VALUES ('".$personName."','".$bookName."','".$filename."', '".$destination."', '".$dateUP."')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<br />';
                        echo '<p id="alert-success" class="alert alert-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                      </svg>فایل کتابـــ آپلود شد. سایر مراحل مربوط به چاپ را انجام دهید.</p>';
                    }
              }
            
        } else {
            echo "<p id='alert-danger' class='alert alert-danger'>فایل کتاب شما آپلود نشده و دوباره تلاش کنید.</p>";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
