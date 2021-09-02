<?php

function upload() {
    $fileName = $_FILES['filesTobeUploaded']['name'];
    //To upload in our directory
    $filePath = getcwd().'/'.$fileName;
    if (move_uploaded_file($_FILES['filesTobeUploaded']['tmp_name'], $filePath)) {
        echo "<p id='thanks'>Thank You, Your data can be now downloaded</p>";
    } else {
        echo "Unable to upload your file!";
    }
} 

function download(){
    //error_reporting(E_ERROR | E_PARSE);
    $f=fopen(getcwd().'/'.'data.csv','w');
    require('db.php');
    $result=mysqli_query($conn,"SELECT firstName,lastName,email,experience FROM application_form");
    $data=mysqli_fetch_all($result);
    foreach($data as $arr){
        fputcsv($f,$arr);
    }

    fclose($f);
}


?>

