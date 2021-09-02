<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Update Application Form</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        require('db.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $result=mysqli_query($conn,"SELECT firstName,lastName,email,experience FROM application_form WHERE id=$id");
            $data=mysqli_fetch_all($result);    
            $firstName=$data[0][0];
            $lastName=$data[0][1];
            $email=$data[0][2];
            $experience=$data[0][3];
        }
        if(isset($_POST['ufirstName']) && 
        isset($_POST['ulastName']) &&
        isset($_POST['uemail']) &&
        isset($_POST['uexperience'])){
            $ufirstName=$_POST['ufirstName'];
            $ulastName=$_POST['ulastName'];
            $uemail=$_POST['uemail'];
            $uexperience=$_POST['uexperience'];
            $result=mysqli_query($conn,"UPDATE application_form SET firstName='$ufirstName',lastName='$ulastName',email='$uemail',experience='$uexperience' WHERE id=$id");
            if($result){
                require('upload.php');
                download();
                header("Location: index.php");
            }
        }
        ?>
    <h1>Update Application Form</h1>
    <fieldset>
        <legend>Enter your Information</legend>
        <form method="POST">
        <div class="form-container">
        <div id="text-uploads">
            <label>First Name: <input type="text" name="ufirstName" value="<?php  echo $firstName ?>"required id=="f"/></label>
            <label for="l">Last Name: <input type="text" name="ulastName" value="<?php echo $lastName ?>" required id="l"/></label>
            <label for="e">Email: <input type="email" name="uemail" value="<?php echo $email ?>" required placeholder="xyz@gmail.com" id="e"/></label>
            <label for="ex">Experience: 
            <select name="uexperience" id="ex" value="<?php echo $experience ?>" required>
                <?php
                $years=30;
                for($i=0;$i<=$years;$i++){
                    echo "<option value='$i'>$i</option>";
                } 
                ?>
            </select>
            
            </label>
            </div>
            <div id="doc-upload">
                <input type="file" name="filesTobeUploaded" disabled/>
            </div>
        </div>
        <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset>
