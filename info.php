<html>
    <head>
        <style type="text/css">
            body{
                font-family: 'Segoe UI',sans-serif;
                background-color:cornsilk;
            }
            h1{
                text-shadow: 0 3px 5px 0 rgba(0,0,0,0.2);
            }
            .inputShadow{
                box-shadow: 0 3px 5px 0 rgba(0,0,0,0.2);
            }
            .btn{
                background-color:cornflowerblue;
                color:white;
            }
            a{
                text-decoration: none;
                color:white;
            }
            table, td{
                border: 1px solid gray;
                border-collapse: collapse;
                padding: 1px;
                text-align: center;
            }
        </style>
    </head>
<body >
    <h1>Personal Details</h1><hr>
    <form action="info.php" method="post" enctype="multipart/form-data">
        First Name: <input type="text" name="first" class="inputShadow">
        Last Name: <input type="text" name="last" class="inputShadow"><br><br>
        
        Email ID: <input type="email" name="mail" class="inputShadow">
        Experience: <select name = "dropdown" class="inputShadow">
            <option value = 1>1 Year</option>
            <option value = 2>2 Years</option>
            <option value = 3>3 Years</option>
            <option value = 4>4 Years</option>
            <option value = 5>5 Years</option>
         </select><br><br>

         Upload Resume:<br><input type="file" name="resumeFile">
         <input type="submit" value="Upload Resume" name="submitResume" class="inputShadow"> <br><br>
         <input type="submit" class="btn">
         <span>&nbsp;</span>
         <button class="btn"><a href="./details.csv">Download employee DB as CSV file</a></button><br><br>
    </form>
    <?php
        // Write to CSV file
        if((file_exists("./details.csv")) and $_POST["first"] and $_POST["last"] and $_POST["mail"]){
            $fName=$_POST["first"];
            $lName=$_POST["last"];
            $email=$_POST["mail"];
            $experience=$_POST["dropdown"];
            $data = array(
                $fName,$lName,$email,$experience
            );
            $fp = fopen('./details.csv', 'a');
            fputcsv($fp, $data);
            fclose($fp);
        }
        // Check for File Upload
        if(key_exists('resumeFile',$_FILES)) {
            
            $file_name=$_FILES['resumeFile']['name'];
            $file_tmp=$_FILES['resumeFile']['tmp_name'];
            $dir=getcwd().'/'.$file_name;
            if(move_uploaded_file($file_tmp,$dir)){
                echo "File Uploaded successfully<br><br>";
            } else {
                echo "File Upload Unsuccessful, Retry!<br><br>";
            }
        }
        // Display personal details as table
        echo "<h2>Employee Personal Details</h2><hr><table>\n\n";
        $file = fopen("./details.csv", "r");
        while (($data = fgetcsv($file)) !== false) {
            echo "<tr>";
            foreach ($data as $val) {
                echo "<td>&nbsp" . $val . "</td>";
            }
            echo "</tr> \n";
        }
        fclose($file);
  
        echo "\n</table>";
    ?>
</body>
</html>