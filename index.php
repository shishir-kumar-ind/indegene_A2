<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        First Name: <input type="text" name="fname" ><br>
        Last Name: <input type="text" name="lname" ><br>
        Experience: 
        <select id="Experience" name="experience">  
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
        </select><br>
        Email: <input type="email" name="email"><br>
        <input type="file" name="file" ><br>
        <button type="submit">submit</button><br>
        <a href="./index.txt" download="resume" >download file?</a><br>
    </form>
    <?php 
        if(key_exists('file', $_FILES)){
            echo $_FILES["file"]['name']."<br>";
            $tmp_name = $_FILES["file"]['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $dir = getcwd().'/'.$file_name;

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $expi = $_POST['experience'];
            $email = $_POST['email'];

            $content = $fname."\n".$lname."\n".$expi."\n".$email;
            
            if(move_uploaded_file($tmp_name, $dir)){
                echo "File uploaded successfully!";
            } else {
                echo "Sorry, file not uploaded";
            }
            
            $myfile = fopen('index.txt', "w+");
            fwrite($myfile, $content);
            fclose($myfile);
        }
    ?>
</body>
</html>