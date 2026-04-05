<?php
$dir = "uploads/";

if(!is_dir($dir)){
    mkdir($dir);
}

// Delete file
if(isset($_GET['delete'])){
    $file = $dir . $_GET['delete'];
    if(file_exists($file)){
        unlink($file);
    }
}

// Upload file
if(isset($_FILES['file'])){
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, $dir.$name);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>
</head>
<body>

<h2>Upload File</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="submit" value="Upload">
</form>

<h2>Files List</h2>

<table border="1">
<tr>
    <th>Name</th>
    <th>Size</th>
    <th>Modified</th>
    <th>Actions</th>
</tr>

<?php
$files = scandir($dir);

foreach($files as $file){
    if($file != "." && $file != ".."){
        $path = $dir.$file;
        echo "<tr>";
        echo "<td>$file</td>";
        echo "<td>".filesize($path)." bytes</td>";
        echo "<td>".date("Y-m-d H:i:s", filemtime($path))."</td>";
        echo "<td>
                <a href='download.php?file=$file'>Download</a> |
                <a href='?delete=$file'>Delete</a>
              </td>";
        echo "</tr>";
    }
}
?>

</table>

</body>
</html>