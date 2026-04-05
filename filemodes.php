<?php

$file = "modes.txt";

// w - write
$f = fopen($file, "w");
fwrite($f, "Write mode\n");
fclose($f);

// a - append
$f = fopen($file, "a");
fwrite($f, "Append mode\n");
fclose($f);

// r - read
$f = fopen($file, "r");
echo fread($f, filesize($file));
fclose($f);

?>