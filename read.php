<?php
$f_pointer=fopen("da.csv","r"); // file pointer

while(! feof($f_pointer)){
$ar=fgetcsv($f_pointer);
echo "<pre>"; print_r($ar); // print the array 
echo "<br>";
}
?>
