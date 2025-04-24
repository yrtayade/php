<?php
    include("connection.php");


    $f_name = trim($_POST["fname"]);
    $s_email = trim($_POST["semail"]);
    $s_contact = trim($_POST["contact"]);
    $s_password = trim($_POST["spassword"]);
    $gender = trim($_POST["gender"]);
    $branch = trim($_POST["branch"]);

    $myQuery = "UPDATE student SET fullname='".$f_name."', contact='".$s_contact."' WHERE semail='".$s_email."'";

    if($conn->query($myQuery))
    {
        echo "Updated";
    }
    else
    {
        echo "Not updated";
    }

?>