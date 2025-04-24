<?php
    include("connection.php");

    if(  isset( $_POST["submit"]  ) )
    {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
        $f_name = trim($_POST["fname"]);
        $s_email = trim($_POST["semail"]);
        $s_contact = trim($_POST["contact"]);
        $s_password = trim($_POST["spassword"]);
        $gender = trim($_POST["gender"]);
        $branch = trim($_POST["branch"]);

        $enc_password = password_hash($s_password , PASSWORD_DEFAULT   );

        $myQuery = $conn->prepare("INSERT INTO student(fullname, semail, contact, password, gender,branch,photo) VALUES(?,?,?,?,?,?,?)");

        $myQuery->bind_param("sssssss",$f_name,$s_email,$s_contact,$enc_password,$gender,$branch,$target_file);

        if( $myQuery->execute() == TRUE)
        {
            echo "OK";
            // echo "
            //     <script type='text/javascript'>
            //         alert('Data Inserted');
            //         window.location.href='demoSelect.php';
            //     </script>
            // ";
        }
        else
        {
            echo "Not OK";
            // echo "
            // <script type='text/javascript'>
            //     alert('Something went wrong');
            //     window.location.href='registration.html';
            // </script>
            // ";
        }
    }
    else
    {
        echo "
        <script type='text/javascript'>
            alert('Please fill the form');
            window.location.href='registration.html';
        </script>
        ";
    }
?>