<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/296574ef3d.js" crossorigin="anonymous"></script>
    <title>Application Form</title>
</head>
<body>
    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require_once('check.php');
    $isValid=new Validation($_POST,$_FILES);
    ?>
    <h1>Application Form</h1>
    <fieldset>
        <legend>Enter your Information</legend>
        <form id="form1" action="index.php" method="POST" enctype="multipart/form-data">
        <div class="form-container">
        <div id="text-uploads">
            <label>First Name: <input type="text" name="firstName" class="<?php echo(!$isValid->validateFName())? 'invalidIP':'' ?>"required id=="f"/>
            <?php echo(!$isValid->validateFName())?  "<p class='invalid'>! Invalid First Name</p>" : "" ?></label>
            <label for="l">Last Name: <input type="text" name="lastName" class="<?php echo(!$isValid->validateLName())? 'invalidIP':'' ?>" required id="l"/></label>
            <?php echo(!$isValid->validateLName())?  "<p class='invalid'>! Invalid Last Name</p>" : "" ?></label>
            <label for="e">Email: <input type="email" name="email" required placeholder="xyz@gmail.com" id="e"/></label>
            <?php echo(!$isValid->validateEmail())?  "<p class='invalid'>! Invalid Email ID</p>" : "" ?></label>
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
                <?php 
                    $errors=$isValid->validateFile();
                    foreach($errors as $error){
                        echo "<p class='errors'>$error</p>";
                    }
                ?>
            </div>
        </div>
        <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset>
    <?php 
        
    
        $id=1;
        if(key_exists('filesTobeUploaded',$_FILES)){
            require('upload.php');
            if($isValid->validateFName() && $isValid->validateLName() && $isValid->validateEmail()){
                upload();
                download();
            }
    
        }  
        if(file_exists(getcwd().'/'.'data.csv')){
            $file = fopen(getcwd().'/'.'data.csv',"r");
            $arr=[];
            while(!feof($file)){
                array_push($arr,fgetcsv($file,0,','));
            }
        } 
    ?>
    <a href='download.php'><button id="download">Download</button></a>
    <table>
        <tr>
            <?php if (isset($arr)){ ?>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Experience</td>
            <td>Email</td>
            <td>Edit</td>
        </tr>
        <?php 
        
        foreach($arr as $row){ ?>
            <tr>
            <?php 
            if (is_array($row) || is_object($row))
            {
                foreach($row as $col){ ?>
                <td>
                    <?php echo $col; 

                    ?>
                </td>
            <?php }
                echo "<td><a href='update.php?id=$id'><i class='fas fa-edit'></i></a></td>";
                $id++;
            } ?>
            </tr>
        <?php } } 
        ?>
    </table>
