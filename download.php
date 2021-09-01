<?php
if(file_exists(getcwd().'/'.'data.csv')){
    $file_path=getcwd().'/'.'data.csv';
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=\"".basename($file_path)."\"");
    readfile($file_path);
}else{
    echo "<h1 style='text-align:center;font-family:Poppins;'>Sorry!, Your file was not uploaded</h1>";
}

?>