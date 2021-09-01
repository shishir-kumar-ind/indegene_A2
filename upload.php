<?php

function upload() {
    $fileName = $_FILES['filesTobeUploaded']['name'];
    //To upload in our directory
    $filePath = getcwd().'/'.$fileName;
    if (move_uploaded_file($_FILES['filesTobeUploaded']['tmp_name'], $filePath)) {
        echo "<p>Thank You, Your data can be now downloaded</p>";
    } else {
        echo "Unable to upload your file!";
    }
} 

//Pass the data to make a csv file
require_once('makeCSV.php');
function download(){
    makeCSV($_POST);
}


?>

