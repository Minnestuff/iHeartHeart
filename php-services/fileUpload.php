<?php
    $temp_name = $_FILES["file"]["tmp_name"]; // get the temporary filename/path on the server
    $name = $_FILES["file"]["name"]; // get the filename of the actual file
  
    // print the array (for reference)
    print_r($_FILES);
          
    // Create uploads folder if it doesn't exist.
    if (!file_exists("uploads")) {
        mkdir("uploads", 0755);
        chmod("uploads", 0755); // Set read and write permissions of folder, needed on some servers
    }
          
    // Move file from temp to uploads folder
    move_uploaded_file($temp_name, "/var/www/html/projects/uploads/$name");
    chmod("uploads/$name", 0644); // Set read and write permissions if file
?>  
