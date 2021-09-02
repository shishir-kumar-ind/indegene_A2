<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Application Form</title>
</head>
<body>
    <h1>Application Form</h1>
    <fieldset>
        <legend>Enter your Information</legend>
        <form id="form1" action="index.php" method="POST" enctype="multipart/form-data">
        <div class="form-container">
        <div id="text-uploads">
            <label>First Name: <input type="text" name="firstName" required id=="f"/></label>
            <label for="l">Last Name: <input type="text" name="lastName" required id="l"/></label>
            <label for="e">Email: <input type="email" name="email" required placeholder="xyz@gmail.com" id="e"/></label>
            <label for="ex">Experience: 
            <select name="experience" id="ex" required>
                <?php
                $years=30;
                for($i=0;$i<=$years;$i++){
                    echo "<option value='$i'>$i</option>";
                } 
                ?>
                input:sel
            </select>
            
            </label>
            </div>
            <div id="doc-upload">
                <input type="file" name="filesTobeUploaded" required/>
            </div>
        </div>
        <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset>
    <?php
        if(key_exists('filesTobeUploaded',$_FILES)){
            require('upload.php');
            upload();
            download();
    
        }  
        if(file_exists(getcwd().'/'.'data.csv')){
            $file = fopen(getcwd().'/'.'data.csv',"r");
            $arr=[];
            while(!feof($file)){
                array_push($arr,fgetcsv($file,0,','));
            }
        } 
    ?>
    <a href='download.php'><button>Download Your File</button></a>
    <table>
        <?php 
        if (isset($arr))
        foreach($arr as $row){ ?>
            <tr>
            <?php 
            if (is_array($row) || is_object($row))
            {
                foreach($row as $col){ ?>
                <td>
                    <?php echo $col; ?>
                </td>
            <?php } } ?>
            </tr>
        <?php } 
        ?>
    </table>
