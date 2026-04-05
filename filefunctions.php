<?php

$file = "test.txt";

// Write to file
file_put_contents($file, "Hello PHP File Handling!\n");

// Read file
echo "<h3>File Content:</h3>";
echo file_get_contents($file);

// File info
echo "<h3>File Info:</h3>";
echo "Exists: " . (file_exists($file) ? "Yes" : "No") . "<br>";
echo "Size: " . filesize($file) . " bytes<br>";
echo "Type: " . filetype($file) . "<br>";
echo "Last Modified: " . date("Y-m-d H:i:s", filemtime($file)) . "<br>";

// Copy file
copy($file, "copy.txt");

// Rename file
rename("copy.txt", "newfile.txt");

// Directory handling
echo "<h3>Directory Files:</h3>";
$files = scandir(".");
foreach($files as $f){
    echo $f . "<br>";
}

// Create & remove folder
mkdir("demo");
rmdir("demo");

?>