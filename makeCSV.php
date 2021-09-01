<?php
function makeCSV($var){

error_reporting(E_ERROR | E_PARSE);
$file = fopen(getcwd().'/'.'data.csv',"r");
$size=count(fgetcsv($file));
if($size===0){
    $f = fopen(getcwd().'/'.'data.csv', 'w');
    fputcsv($f,['First Name','Last Name','Email','Experience']);
    fclose($f);
    //Clear the buffer
} 
echo $f[0];

$f=fopen(getcwd().'/'.'data.csv','a');
$data=array($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['experience']);


fputcsv($f, $data);
// Close the file
fclose($f);
// ... download will start
}

?>