<?php
if(isset($_FILES['file'])){
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $upload_dir = "uploads/";

    if(!is_dir($upload_dir)){
        mkdir($upload_dir);
    }

    $target_file = $upload_dir . basename($file_name);

    if(move_uploaded_file($tmp_name, $target_file)){
        echo "File uploaded successfully!<br><br>";
        echo "<a href='download.php?file=$file_name'>Download File</a>";
    } else {
        echo "Upload failed!";
    }
}
?>